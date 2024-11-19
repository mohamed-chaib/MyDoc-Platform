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
  <!--MODAL : DETAILS TABLE-->
  <!-- Button trigger modal -->
  <?php
  // FUCNTONN FOR SHOW THE DETAILS OF THE MODAL 
  function showDemandDetails($demande)
  { ?>

    <div
      class="modal fade"
      id="orderDetailsModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Details</h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="p-1 table-responsive bg-light border border-3 rounded">
              <table class="table table-light table-borderless fs-5">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Matricule</th>
                    <th scope="col">First Name</th>
                    <th scope="col-2">Last Name</th>
                    <th scope="col">Date Of Birth</th>
                    <th scope="col">Place Of Birth</th>
                    <th scope="col">Year</th>
                    <th scope="col">Document Type </th>
                    <th scope="col">State</th>

                  </tr>
                </thead>
                <tbody class="table-group-divider">
                  <tr>
                    <?php

                    foreach ($demande as $key => $value) {  ?>



                      <td scope="row"><?php echo $value   ?></td>


                    <?php
                    }
                    ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  <?php
  }
  ?>
  <!-- Modal
  <div
    class="modal fade"
    id="orderDetailsModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Details</h1>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="p-1 table-responsive bg-light border border-3 rounded">
            <table class="table table-light table-borderless fs-5">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Matricule</th>
                  <th scope="col">First Name</th>
                  <th scope="col-2">Last Name</th>
                  <th scope="col">Date Of Birth</th>
                  <th scope="col">Place Of Birth</th>
                  <th scope="col">Year</th>
                  <th scope="col">Document Type </th>
                  <th scope="col">State</th>

                </tr>
              </thead>
              <tbody class="table-group-divider">
                <tr>
                <?php

                foreach ($demands[0] as $key => $value) {  ?>


                  
                    <td scope="row"><?php echo $value   ?></td>
                    
                  
                <?php } ?>
              </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
           -->
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

          foreach ($demands as $key => $value) {  ?>
            <tr>
              <td scope="row"><?php echo ++$key     ?></td>
              <td scope="col"><?php echo   $value['type_of_document'] ?></td>
              <td scope="col" class=" <?php stateColor($value['order_state']) ?>" >  <?php echo   $value['order_state'] ?></td>
            </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>
  </main>
  <?php
  // function to give the color of the text depend the state
  function  stateColor($state)
  {
    switch ($state) {
      case 'Requested':
        echo "text-primary";
        break;

      case 'In Progress':
        echo "text-warning";
        break;
      case 'Ready For Take':
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


    function name(params) {

    }
  </script>
</body>

</html>