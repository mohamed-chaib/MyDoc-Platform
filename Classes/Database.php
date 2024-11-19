<?php
class Database{
    private $host;
    private $dbanme;
    private $username;
    private $password;

    // CONSTRUCT FOR INITIALIZE THE DATABASE INFORMATION
    public function __construct($host,$dbanme,$username,$password){
        $this->host = $host;
        $this->dbanme = $dbanme;
        $this->username = $username;
        $this->password = $password;
    }
    // FUNCTION FOR CONNECT WITH THE DATABASE
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
}


?>