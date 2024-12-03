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
  <style>
    /* Arrière-plan gris clair avec flou */
    body {
      background-color: rgba(211, 211, 211, 0.5); /* Gris clair avec transparence */
      height: 100vh; /* Assure que l'arrière-plan couvre toute la hauteur de la page */
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }

    /* Effet de flou */
    .background-blur {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-image: url('./images/background.jpg'); /* Remplace par ton image de fond */
      background-size: cover;
      filter: blur(8px); /* Applique un flou */
      z-index: -1; /* Assure que l'arrière-plan flouté reste derrière le contenu */
    }

    /* Centrage du formulaire et ajout d'ombre */
    .form-container {
      max-width: 600px;
      border: 2px solid #ddd;
      border-radius: 10px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      background-color: #ffffff; /* Fond blanc pour le formulaire */
      z-index: 1;
    }

    /* Logo ajusté pour être plus grand */
    .logo {
      width: 80%; /* Ajuste la taille du logo */
    }

    /* Style pour le bouton */
    .btn-register {
      background-color: #3b71ca;
      border: none;
      color: white;
      font-weight: bold;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      transition: all 0.3s ease; /* Ajoute une transition fluide */
    }

    /* Effet de survol pour le bouton */
    .btn-register:hover {
      background-color: #2a5ba3; /* Change la couleur de fond au survol */
      transform: scale(1.05); /* Légère augmentation de la taille du bouton */
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2); /* Ombre plus prononcée */
    }
  </style>
</head>

<script>
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
  <main class="mb-5">
    <!-- Effet de flou sur l'arrière-plan -->
    <div class="background-blur"></div>

    <div class="d-flex justify-content-center align-items-center min-vh-100">
      <form action="" method="post" class="form-container">
        <div class="mb-4 text-center">
          <img src="./images/logeFSboumerdes.png" alt="Logo" class="logo" />
        </div>
        <div class="form-floating mb-3">
          <input
            type="number"
            class="form-control form-control-sm"
            id="floatingInput"
            name="matricule"
            required />
          <label for="floatingInput">Matricule</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="password"
            class="form-control form-control-sm"
            id="floatingPassword"
            placeholder="Password"
            name="password"
            required />
          <label for="floatingPassword">Password</label>
        </div>
        <div class="d-grid gap-2">
          <button class="btn-register" type="submit">REGISTER</button>
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
      $user = new User($matricule, $password);
      
      // LOG IN THE USER 
      $isLogIn = $user->logIn($conn);    // this return true or false
      if ($isLogIn) {
        $userType  = $user->getUserType();
        $userType == "admin" ?  header("Location: ./admin.php") : header("Location: ./etudiant.php");
      } else {  ?>
        <script>
          showAlertMessage("Log In Unsuccessful", "danger")
        </script> 
      <?php 
      }
    } 
    ?>
  </main>
</body>

</html>
