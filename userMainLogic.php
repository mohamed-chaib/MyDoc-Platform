<?php
  // GET THE CONNECT WITH THE DATABASE
 require_once "db.php";
 require_once "./Classes/Demand.php";

 // GET THE MATRICULE FROM SESSION STORAGE
 $matricule  = $_SESSION['matricule'];
// CRAETE NEW DEMAND INTANSE
$demand  =  new Demand(); 

// GET THE DEMAND OF THE USER 
$demands =   $demand->getData($conn,$matricule);


 // CHECK IF THERE IS A REQUEST METHOD
 if ($_SERVER['REQUEST_METHOD'] === "POST") {

   if (!empty($_POST) && isset($_SESSION['matricule'])) { // CHECK IF THERE IS A DATA 
     $data = $_POST;  // $data it is array
     // CRAETE NEW DEMAND INTANSE
     $demand  =  new Demand(); 
     // SEND THE DATA 
     $demand->sendData($conn, $matricule, $data); //  SEND THE DEMAND 
   }
}
?>