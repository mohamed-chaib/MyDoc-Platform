<!--START THE SESSION-->
<?php
 session_start()
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--import bootstrap-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
    <title>Document</title>
  </head>

  <body>
    <?php
    // connect with database 
    require_once __DIR__. "/db.php";
    // check if there is a request
     if($_SERVER['REQUEST_METHOD']=='POST'){
      $matricule= $_POST['matricule'];
      $password= $_POST['password'];
     try {
      // sql statment
      $sql = "select * from Etudiants where matricule= :matricule ";
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
    ?>
    <div >
      <form action="" method="post" class="container  col-8">
        <div class=" mb-5 container">
          <img src="./images/logeFSboumerdes.png" alt="" class="w-100" />
        </div>
        <div class="form-floating mb-3 border-primary">
          <input
            type="number"
            class="form-control"
            id="floatingInput"
            name="matricule"
          />
          <label for="floatingInput">Matricule</label>
        </div>
        <div class="form-floating">
          <input
            type="password"
            class="form-control mb-3"
            id="floatingPassword"
            placeholder="Password"
            name="password"
          />
          <label for="floatingPassword ">Password</label>
        </div>
        <div class="d-grid gap-2">
          <button  class="btn text-white  shadow-sm fw-semibold" style="background-color: #3b71ca" type="submit">REGISTER</button>
        </div>
      </form>
    </div>
  </body>
</html>
