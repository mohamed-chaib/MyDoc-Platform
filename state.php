<?php
session_start();
if (!isset($_SESSION["token"])) {
  header("Location: ./index.php");
} else {
  require_once "./userMainLogic.php";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MyDoc</title>

  <!--IMPORT BOOTSTRAP-->
  <link
    rel="stylesheet"
    href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />

  <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <!--md-bootstrap-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/mdb-bootstrap@5.0.1/css/mdb.min.css" />
  <script
    type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/mdb-bootstrap@5.0.1/js/mdb.min.js"></script>
</head>

<body class="font-monospace">
 
  <!-- NAVIGATION BAR-->
  <nav class="navbar navbar-expand-lg bg-body sticky-top shadow-sm">
    <div class="container-xxl">
      <a class="navbar-brand" href="#">
        <img
          src="./images/logeFSboumerdes.png"
          alt="Bootstrap"
          height="100" />
      </a>
      <button
        class="navbar-toggler text-light bg-white"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link fs-5" aria-current="page" href="./etudiant.php">Home</a>
          <a class="nav-link active fs-5" href="#">State</a>
        </div>
      </div>
    </div>
  </nav>
  <!--RECENT ORDERS-->
  <main class="container my-4">
    <div class="mb-4">
      <h1>Your Order</h1>
    </div>
    <div class="container table-responsive bg-light border border-3 rounded">
      <table class="table table-light table-borderless fs-5">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Demande Name</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>

          <?php

          if (empty($demands)) {
            echo "<th> No Demands</th>  ";
          } else {
            foreach ($demands as $key => $value) {  ?>
              <tr>
                <td scope="row"><?php echo ++$key     ?></td>
                <td scope="col"><?php echo   $value['type_of_document'] ?></td>
                <td scope="col" class=" <?php stateColor($value['order_state']) ?>"> <?php echo   $value['order_state'] ?></td>
              </tr>
          <?php }
          }
          ?>

        </tbody>
      </table>
    </div>
  </main>
  <?php
  // function to give the color of the text depend the state
  function  stateColor($state)
  {
    switch ($state) {
      case 'rejected':
        echo "text-danger";
        break;

      case 'in progress':
        echo "text-warning";
        break;
      case 'ready for take':
        echo "text-success";
        break;
      default:
        return "";
        break;
    }
  }
  ?>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
      "use strict";

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll(".needs-validation");

      // Loop over them and prevent submission
      Array.from(forms).forEach((form) => {
        form.addEventListener(
          "submit",
          (event) => {
            if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
            }

            form.classList.add("was-validated");
          },
          false
        );
      });
    })();
  </script>
</body>

</html>