<?php
require_once "./Classes/Personne.php";
class Etudiant extends User
{
    public function __construct($matricule, $password)
    {
        parent::__construct($matricule, $password);
    }
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
            // get the data of the etudiant from the database like tableau associative
            $etudiant  = $stmt->fetch(PDO::FETCH_ASSOC);
            // check if the the password is correct

            if ($etudiant && password_verify($this->password, $etudiant['password'])) {
                // store the matricule in session storage
                $_SESSION['matricule'] = $this->matricule;
                // generate the token
                $token  = bin2hex(random_bytes(32));

                //store the token in the database 
                $sql  = " update users set token = :toekn where matricule = :matricule ;";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":token", $token);
                $stmt->bindParam(":matricule", $this->matricule);

                //store the token in session storage 
                $_SESSION['token'] = $token;

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
}
