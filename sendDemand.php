
<?php
session_start();
 // GET THE CONNECT WITH THE DATABASE
 require_once "db.php";
 require_once "./Classes/Demand.php";

 // CHECK IF THERE IS A REQUEST METHOD
 if ($_SERVER['REQUEST_METHOD'] === "POST") {
  echo " there is a request";

   if (!empty($_POST) && isset($_SESSION['matricule'])) { // CHECK IF THERE IS A DATA 
    echo " there is a data";

     $data = $_POST;  // $data it is array
     $matricule  = $_SESSION['matricule'];
     foreach ($data as $key => $value) {
        echo $value ." \n";
     }
     $demand  =  new Demand(); // CRAETE NEW DEMAND INTANSE
     $demand->sendData($conn, $matricule, $data); //  SEND THE DEMAND 
   }
 }
else{
  echo " there is no request";
}

?>