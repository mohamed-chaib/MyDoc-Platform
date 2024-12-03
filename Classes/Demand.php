<?php
class Demand {
   
    //   SEND THE DATA OF DEMAND TO THE DATABASE 
    public function sendData($conn,$matricule,$data) {
      try {
        // sql statment
       if (isset($_SESSION['token'])) {
           
       
        $token  = $_SESSION['token'];
        $sql = "insert into demand (etudiant_matricule,etudiant_first_name,etudiant_last_name,etudiant_year,type_of_document)
                       select  :etudiant_matricule,:etudiant_first_name,:etudiant_last_name,:etudiant_year,:type_of_document
                       from users 
                       where  users.matricule = :etudiant_matricule  and users.token = :token ;";
        // prepare the sql statment 
        $stmt = $conn->prepare($sql);
        // get the value of the variables 
        $stmt->bindParam(":etudiant_matricule",$matricule);
        $stmt->bindParam(":etudiant_first_name",$data['first_name'] );
        $stmt->bindParam(":etudiant_last_name",$data["last_name"] );
        $stmt->bindParam(":etudiant_year",$data['year'] );
        $stmt->bindParam(":type_of_document",$data['type_of_document']);
        $stmt->bindParam(":token",$token);
        // execute the sql statment 
        $stmt->execute();    // this function will return true or false 
       }
      } catch (PDOException $exeption) {
        echo die("  there is a problem  : " . $exeption->getMessage());
      }
    }
    // FUNCTION FOR GET ALL THE USER DEMANDS
    public function getData($conn,$matricule) {
      try {
        // sql statment

        $token  = $_SESSION['token'];
        $sql = " call  get_etudiant_demands(:matricule,:token);";
        // prepare the sql statment    
        $stmt = $conn->prepare($sql);
        // get the value of the variables 
        $stmt->bindParam(":matricule",$matricule);
        $stmt->bindParam(":token",$token);
        // execute the sql statment 
        $stmt->execute();    // this function will return true or false 

        // GET THE DEMANDS OF THE STUDENT
         $demands = $stmt->fetchAll(PDO::FETCH_ASSOC);                  
         // return the data of demands
         return $demands;
      } catch (PDOException $exeption) {
        echo die("  there is a problem  : " . $exeption->getMessage());
      }
    }
    // get all data 
    public function getAllData($conn) {
      try {
        // sql statment

        $token  = $_SESSION['token'];
        $sql = " select * from demand ";
        // prepare the sql statment    
        $stmt = $conn->prepare($sql);
       
        // execute the sql statment 
        $stmt->execute();    // this function will return true or false 

        // GET THE DEMANDS OF THE STUDENT
         $demands = $stmt->fetchAll(PDO::FETCH_ASSOC);                  
         // return the data of demands
         return $demands;
      } catch (PDOException $exeption) {
        echo die("  there is a problem  : " . $exeption->getMessage());
      }
    }
    public function sortBy($conn,$by="year") {
      $sql="";
      if ($by== "demand") {
        $sql = " select type_of_document , etudiant_matricule,etudiant_first_name,etudiant_last_name,etudiant_year,created_at,order_state  from demand order by type_of_document   ";
      }
      else{
        $sql = " select etudiant_year, etudiant_matricule,etudiant_first_name,etudiant_last_name,type_of_document,created_at,order_state  from demand order by etudiant_year   ";

      }
      
      try {
        // sql statment

        $token  = $_SESSION['token'];
        // prepare the sql statment    
        $stmt = $conn->prepare($sql);
       
        // execute the sql statment 
        $stmt->execute();    // this function will return true or false 

        // GET THE DEMANDS OF THE STUDENT
         $demands = $stmt->fetchAll(PDO::FETCH_ASSOC);                  
         // return the data of demands
         return $demands;
      } catch (PDOException $exeption) {
        echo die("  there is a problem  : " . $exeption->getMessage());
      }
    }
}
?>