<?php
session_start();
?><!--START THE SESSION-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!--import bootstrap-->
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
  <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <title>Document</title>
</head>
<script>
  // SHOW A ALERT IF THE  LOG IN USNSUCCESSFULL
  function showAlertMessage(message, type) {
    const alertPlaceholder = document.getElementById("success-alert");
    const wrapper = document.createElement("div");
    wrapper.innerHTML = [
      `<div class="alert alert-${type} alert-dismissible" role="alert">`,
      '   <button id="close-alert" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
      `   <div>${message}</div>`,
      "</div>",
    ].join("");
    alertPlaceholder.append(wrapper);
    setTimeout(() => {
      document.getElementById("close-alert").click();
    }, 3000);
  }
</script>

<body>

  <div id="success-alert" style="position: fixed;z-index: 1100; width: 40%; right: 0;bottom: 0;"></div>
  <div>
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
          required />
        <label for="floatingInput">Matricule</label>
      </div>
      <div class="form-floating">
        <input
          type="password"
          class="form-control mb-3"
          id="floatingPassword"
          placeholder="password"
          name="password"
          required />
        <label for="floatingPassword ">assword</label>
      </div>
      <div class="d-grid gap-2">
        <button class="btn text-white  shadow-sm fw-semibold" style="background-color: #3b71ca" type="submit">REGISTER</button>
      </div>
    </form>
  </div>
  <?php
  // CONNECT WITH THE DATABASE 
  require_once __DIR__ . "/db.php";
  require_once "./Classes/User.php";

  // CHECK IF THERE IS A REQUEST 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricule = $_POST['matricule'];
    $password = $_POST['password'];

    // CREATE USER INSTANCE 
    $user =   new User($matricule, $password);
    
    // LOG IN THE USER 
    $isLogIn = $user->logIn($conn);    // this return true or false
    if ($isLogIn) {
      $userType  = $user->getUserType();
      $userType=="admin"?  header("Location: ./admin.php") : header("Location: ./etudiant.php");
    } else {  ?>
      <script>
        showAlertMessage("Log In Unsuccessfuly", "danger")
      </script> 
  <?php 
      
    }
  } 
  ?>

</body>

</html>