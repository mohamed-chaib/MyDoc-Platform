<?php
session_start();
if (!isset($_SESSION["token"])) {
    header("Location: ./index.php");
} else {
    require_once "./test_alldemad.php";
}
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
            </h3>
        </div>
    </section>
    <!--MAIN CONTENT -->
    <main class="mb-5">
        <div class="container my-4">
            <h1>Orders</h1>
        </div>
        <div class="mx-3 p-1 table-responsive bg-light border border-3 rounded">
            <table class="table table-light fs-5 ">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Year</th>
                        <th scope="col">Matricule</th>
                        <th scope="col-2">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Document Type </th>
                        <th scope="col">Demand Date</th>
                        <th scope="col">State</th>

                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php

                    foreach ($demands as $key => $value) {  ?>
                        <tr>
                            <td scope="row"><?php echo  $key++ ?></td>
                            <td scope="col"><?php echo $value['etudiant_year'] ?></td>
                            <td scope="col"><?php echo $value['etudiant_matricule'] ?></td>
                            <td scope="col-2"><?php  echo $value['etudiant_first_name'] ?></td>
                            <td scope="col"><?php echo $value['etudiant_last_name'] ?></td>
                            <td scope="col"><?php echo $value['type_of_document'] ?></td>
                            <td scope="col"><?php echo $value['created_at'] ?></td>
                            <td scope="col" class=" <?php stateColor($value['order_state']) ?>" >  <?php echo   $value['order_state'] ?></td>
                            </tr>
                    <?php } ?>
                   
                    
                </tbody>
            </table>
        </div>
        </div>
    </main>
    <script>


    </script>
</body>

</html>