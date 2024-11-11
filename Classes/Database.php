<?php
class Database{
    private $host;
    private $dbanme;
    private $username;
    private $password;
    public function __construct($host,$dbanme,$username,$password){
        $this->host = $host;
        $this->dbanme = $dbanme;
        $this->username = $username;
        $this->password = $password;
    }
    public function connect(){
        try {
            $conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbanme,$this->username, $this->password);
            // set how the $conn dealing with the errors
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $exeption ) {
           return  die("failed database connection : ". $exeption->getMessage());
        }
    }
    public function logIn($conn,$matricule,$password){
        try {
        // sql statment
        $sql = "select * from Etudiant where matricule= :matricule ";
        // prepare the sql statment 
        $stmt =$conn->prepare($sql);
        // get the value of the variables 
        $stmt->bindParam(":matricule",$matricule);
        // execute the sql statment 
        $stmt->execute();    // this function will return true or false 
        // get the data of the etudiant from the database like tableau associative
        $etudiant  = $stmt->fetch(PDO::FETCH_ASSOC);
        // check if the the password is correct 
        if($etudiant && password_verify($password,$etudiant['password'])){
          echo " log in succedfuly";
        }
        else {
          echo " log in unsuccedfuly";
        }
  
  
       } catch (PDOException $exeption) {
  
        die("  there is a problem  : ". $exeption->getMessage() );
       }
      }


}

?>