<?php
session_start();
if (!isset($_SESSION["token"])) {
//    header("Location: ./index.php");
}


$orderBy = $_POST['sortOption'] ?? 'etudiant_matricule';

// Validate and sanitize the input (to prevent SQL injection, for example)
$allowedSortOptions = ['etudiant_matricule', 'etudiant_year'];
if (!in_array($orderBy, $allowedSortOptions)) {
    $orderBy = 'etudiant_matricule';
} 


 include('./Classes/retinform.php');  // Inclure le fichier contenant la classe Admin
  // Créer une instance de la classe Admin
  $admin = new Admin();
                        

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyDoc</title>

    <!--IMPORT BOOTSTRAP-->
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />

    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--md-bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdb-bootstrap@5.0.1/css/mdb.min.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/mdb-bootstrap@5.0.1/js/mdb.min.js"></script>
</head>

<body class="font-monospace">
    <!-- NAVIGATION BAR-->
    <nav class="navbar navbar-expand-lg bg-body sticky-top shadow-sm">
        <div class="container-xxl">
            <a class="navbar-brand" href="#">
                <img src="./images/logeFSboumerdes.png" alt="Bootstrap" height="100" />
            </a>

        </div>
    </nav>
    <!--HERO SECTION-->
    <section class="py-2 bg-body-tertiary font-monospace">
        <div class="p-4 text-center">
            <h1 class="mb-3 fw-bolder">
                My<span style="color: #3b71ca">Doc</span> Platform
            </h1>
            <h3 class="mb-5 text-wrap">
                <div class="mb-4"> Generate your school documents demande via the MyDoc platform.</div>

                <div> </div>


            </h3>
        </div>
    </section>
    <!--MAIN CONTENT -->
    <main class="mb-5">
        <div class="container my-4">
            <h1>order liste :</h1>

        </div>
        </div>
        <div class="container p-5 bg-light-subtle shadow-sm border rounded">

            <form action="admin.php" method="POST" id="sortForm">
                <label for="sortInput" class="form-label">Sort by:</label>
                <select id="sortInput" name="sortOption" class="form-select">
                    <option value="">---order by---</option>
                    <option value="etudiant_matricule">Matricule</option>
                    <option value="etudiant_year">Year</option>
                </select>
            </form>

            <div class="table-responsive">

                <h4>in progress filed</h4>
                <!-- Sort by Year Button -->
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <td>matricule</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Place of Birth</td>
                        <td>Date of Birth</td>
                        <td>Year of Study</td>
                        <td>Type of Document</td>
                        <td>Comment</td>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $admin->setAddtableProgress($orderBy) ?>


                        </tr>
                </table>
            </div>


            <div class="table-responsive">
                <h4>already answered area</h4>



                <table class="table table-striped table-bordered">
                    <tr>
                        <td>matricule</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Place of Birth</td>
                        <td>Date of Birth</td>
                        <td>Year of Study</td>
                        <td>Type of Document</td>
                        <td>Comment</td>
                    </tr>

                    <tbody>
                        <tr>
                            <?php
                        // Appeler la méthode setAddtable() pour afficher le tableau
                        $admin->setAddtable($orderBy);
                        ?>

                        </tr>
                </table>
            </div>
        </div>
    </main>
    <script>
        // Automatically submit the form when the dropdown changes
        document.getElementById('sortInput').addEventListener('change', function () {
            document.getElementById('sortForm').submit();
        });
    </script>
</body>

</html>