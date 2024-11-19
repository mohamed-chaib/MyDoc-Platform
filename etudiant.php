<?php
session_start();
if (!isset($_SESSION["token"])) {
  // GO TO THE LOGIN PAGE ID IS NOT HAVE ACCESS
  header("Location: ./index.php");
} else{
// GET THE USER MAIN LOGIC
// FUNCTION THAT CONTAIN  :  
   // SEND THE DEMAND 
   // GET ALL THE DEMANDS
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
          <a class="nav-link active fs-5" aria-current="page" href="#">Home</a>
          <a class="nav-link fs-5" href="state.php">State</a>
        </div>
      </div>
    </div>
  </nav>
  <!--HERO SECTION-->
  <section class="py-2 bg-body-tertiary font-monospace">
    <div class="p-4 text-center">
      <h1 class="mb-3 fw-bolder">
        My<span style="color: #3b71ca">Doc</span> Platform
      </h1>
      <h3 class="mb-5 text-wrap">
        <div class="mb-4"> Generate your school documents online via the MyDoc platform.</div>

        <div> you can easily order your document in just a few clicks.</div>


      </h3>
      <h4 class="fw-sm">
        Order your <span style="color: #3b71ca">Documents Now!</span>
      </h4>
    </div>
  </section>
  <!--MAIN CONTENT -->
  <main class="mb-5">
    <div class="container my-4">
      <h1>order your document</h1>
    </div>
    <div class="container p-5 bg-light-subtle shadow-sm border rounded">
      <form class="row g-4 needs-validation" novalidate method="post" action="">
        <!--FIRST NAME-->
        <div class="col-md-4">
          <label for="validationCustom01" class="form-label">First name</label>
          <input
            type="text"
            class="form-control"
            id="validationCustom01"
            name="first_name"
            required />
          <div class="valid-feedback">Looks good!</div>
        </div>
        <!--LAST NAME-->
        <div class="col-md-4">
          <label for="validationCustom02" class="form-label">Last name</label>
          <input
            type="text"
            class="form-control"
            id="validationCustom02"
            name="last_name"
            required />
          <div class="valid-feedback">Looks good!</div>
        </div>
        <!--PLACE OF BIRTH-->
        <div class="col-md-6">
          <label for="validationCustom03" class="form-label">Place Of Birth</label>
          <input
            type="text"
            class="form-control"
            id="validationCustom03"
            name="place_of_birth"
            required />
          <div class="invalid-feedback">Please provide a valid city.</div>
        </div>
        <!--DATE OF BIRTH-->
        <div class="col-md-6">
          <label for="validationCustom03" class="form-label">Date Of Birth</label>
          <input
            type="date"
            class="form-control"
            id="validationCustom03"
            name="date_of_birth"
            required />
          <div class="invalid-feedback">Please provide a Date</div>
        </div>

        <!--YEAR-->
        <div class="col-md-3">
          <label for="validationCustom04" class="form-label">Year</label>
          <select name="year" class="form-select" id="validationCustom04" required>
            <option selected disabled value="">Choose</option>
            <option >L1</option>
            <option >L2</option>
            <option >L3</option>
            <option >M1</option>
            <option >M2</option>
          </select>
          <div class="invalid-feedback">Please select a valid state.</div>
        </div>
        <!--SELSECT TYPE OF DOCUMENT-->
        <div class="col-md-3">
          <label for="validationCustom04" class="form-label">Document</label>
          <select name="type_of_document" class="form-select" id="validationCustom04" required>
            <option  selected disabled value="">Choose</option>
            <option >Certificate of Education</option>
            <option >Relevee De Note</option>
            <option >Atestation De Bonne Conduite</option>
          </select>
          <div class="invalid-feedback">Please select a Document.</div>
        </div>
           <!-- -->
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Submit order</button>
        </div>
      </form>
    </div>
  </main>
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