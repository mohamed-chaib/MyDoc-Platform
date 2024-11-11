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
}

?>