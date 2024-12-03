<?php

class User
{
  private $matricule;
  private $password;
  private $firstName;
  private $lastName;
  private $email;
  private $userType;
  // INITIALIZE THE INFORNMATION OF THE USER
  public function __construct($matricule, $password)
  {
    $this->matricule = $this->testData($matricule);
    $this->email = $this->email;
    $this->matricule = $this->testData($matricule);

    $this->password = $password;
  }
  // GET THE USER TYPE
  public function getUserType()
  {
    return $this->userType;
  }

  // GET THE MATRICULE OF USER 
  public function getMatricule()
  {
    return $this->matricule;
  }

  // FUNCTION FOR LOG IN THE USER 
  // RETURN TRUE IF IS LOG IN , ELSE RETURN FALSE  
  public function logIn($conn)
  {
    try {

      // sql statment
      $sql = "select * from users where matricule =  :matricule ";

      // prepare the sql statment 
      $stmt = $conn->prepare($sql);

      // get the value of the variables 
      $stmt->bindParam(":matricule", $this->matricule);

      // execute the sql statment 
      $stmt->execute();    // this function will return true or false 

      // get the data of the user from the database like tableau associative
      $user  = $stmt->fetch(PDO::FETCH_ASSOC);
      // check if the the password is correct

      if ($user && password_verify($this->password, $user['password'])) {

        // get the type of  user (etudiant or admin)
        $this->firstName = $user['first_name'];
        $this->lastName = $user['last_name'];
        $this->email = $user['email'];
        $this->userType = $user['type'];

        // STORE THE INFORMATION IN THE COOKIES
        if($this->userType=="etudiant"){
          setcookie("firstName",$this->firstName);
        setcookie("lastName",$this->lastName);
        setcookie("email",$this->email);
        }
        
        // generate the token
        $token  = bin2hex(random_bytes(32));

        //store the token in the database 
        $sql  = " update users set token = :token where matricule = :matricule ;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":matricule", $this->matricule);
        $stmt->execute();
        //store the token in session storage 
        $_SESSION['token'] = $token;
        // store the matricule in session storage
        $_SESSION['matricule'] = $this->matricule;
        // returen true if the log in success 
        return true;
      } else {
        // returen false if the log in success 
        return false;
      }
    } catch (PDOException $exeption) {
      die("  there is a problem  : " . $exeption->getMessage());
    }
  }
  //  A FUNCTION FOR REGISTER A NEW USER 
  // IT IS JUST FOR TEST 
  // NOT USE IT IN THE PROJECT
  public function register($conn)
  {
    try {
      // sql statment
      $hashedPassword = password_hash($this->password, PASSWORD_ARGON2I);
      $this->matricule = $this->testData($this->matricule);
      $sql = "insert into users (matricule,password,type) values (:matricule,:password,:type);";
      // prepare the sql statment 
      $stmt = $conn->prepare($sql);
      // get the value of the variables 
      $var = "admin";
      $stmt->bindParam(":matricule", $this->matricule);
      $stmt->bindParam(":password", $hashedPassword);
      $stmt->bindParam(":type", $var);
      // execute the sql statment 
      $stmt->execute();    // this function will return true or false 

    } catch (PDOException $exeption) {
      die("  there is a problem  : " . $exeption->getMessage());
    }
  }
  function testData($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}
