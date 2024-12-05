<?php
class Demand
{

  //   SEND THE DATA OF DEMAND TO THE DATABASE 
  public function sendData($conn, $matricule, $data)
  {
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
        $stmt->bindParam(":etudiant_matricule", $matricule);
        $stmt->bindParam(":etudiant_first_name", $data['first_name']);
        $stmt->bindParam(":etudiant_last_name", $data["last_name"]);
        $stmt->bindParam(":etudiant_year", $data['year']);
        $stmt->bindParam(":type_of_document", $data['type_of_document']);
        $stmt->bindParam(":token", $token);
        // execute the sql statment 
        $stmt->execute();    // this function will return true or false 
      }
    } catch (PDOException $exeption) {
      echo die("  there is a problem  : " . $exeption->getMessage());
    }
  }
  // FUNCTION FOR GET ALL THE USER DEMANDS
  public function getData($conn, $matricule)
  {
    try {
      // sql statment

      $token  = $_SESSION['token'];
      $sql = " select demand.* from demand join users
on demand.etudiant_matricule = :matricule 
where :token = users.token;";

      // prepare the sql statment    
      $stmt = $conn->prepare($sql);
      // get the value of the variables 
      $stmt->bindParam(":matricule", $matricule);
      $stmt->bindParam(":token", $token);
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
