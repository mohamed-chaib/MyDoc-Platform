<?php
class Personne
{
  protected $matricule;
  protected $password;
  public function __construct($matricule, $password)
  {
    $this->matricule = $matricule;
    $this->password = $password;
  }
  public function getMatricule()
  {
    return $this->matricule;
  }
  public function logIn($conn){
    try {

      // sql statment
      $sql = "select * from ". get_class($this). " where matricule =  :matricule ";
      // prepare the sql statment 
      $stmt = $conn->prepare($sql);
      // get the value of the variables 
      $stmt->bindParam(":matricule", $this->matricule);
      // execute the sql statment 
      $stmt->execute();    // this function will return true or false 
      // get the data of the etudiant from the database like tableau associative
      $etudiant  = $stmt->fetch(PDO::FETCH_ASSOC);
      // check if the the password is correct

      if ($etudiant && password_verify($this->password,$etudiant['password'])) {
        $_SESSION['matricule']=$this->matricule;
        $_SESSION['token'] = bin2hex(random_bytes(32));
           return true;

      } else {
        echo false;
      }
    } catch (PDOException $exeption) {
      die("  there is a problem  : " . $exeption->getMessage());
    }
  }
  public function register($conn){
    try {
      // sql statment
      $hashedPassword = password_hash($this->password,PASSWORD_ARGON2I);
      $this->matricule = $this->testData($this->matricule);
      $sql = "insert into ". get_class($this)." (matricule,password) values (:matricule,:password);";
      // prepare the sql statment 
      $stmt = $conn->prepare($sql);
      // get the value of the variables 
      $stmt->bindParam(":matricule", $this->matricule);
      $stmt->bindParam(":password", $hashedPassword);

      // execute the sql statment 
      $stmt->execute();    // this function will return true or false 

      // get the data of the etudiant from the database like tableau associative
    } catch (PDOException $exeption) {
      die("  there is a problem  : " . $exeption->getMessage());
    }
  }
  function testData($data){
      $data =trim($data);
      $data = stripslashes($data);
      $data= htmlspecialchars($data);
      return $data;
  }
}
