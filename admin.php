<?php
session_start();
if (!isset($_SESSION["token"])) {
   header("Location: ./index.php");
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

                <div> </div>


            </h3>
        </div>
    </section>
    <!--MAIN CONTENT -->
    <main class="mb-5">
        <div class="container my-4">
            <h1>order liste :</h1>
        </div>
        <div class="container p-5 bg-light-subtle shadow-sm border rounded">
            <div class="table-responsive">
                <h4>in progress filed</h4>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <td>name</td>
                        <td>type of document</td>
                        <td>Request date</td>
                        <td>Year of study</td>
                        <td>Request status</td>   <!--(njiboha me basse de donnees) -->
                        <td>traitment</td>
                        <td>comment</td>

                    </thead>
                    <tbody>
                        <tr>
                            <td>mouhamed chaieb</td>
                            <td>certaficat scolaire</td>
                            <td>2024-11-08</td>
                            <td>l3</td>
                            <td>in progress</td>
                            <td> 
                                <button type="submit" class="btn btn-success me-2" style="font-size: 1.25rem; padding: 10px 20px;">
                                  <i class="fa-solid fa-check"></i>
                                </button>
                                <button type="submit" class="btn btn-danger" style="font-size: 1.25rem; padding: 10px 20px;">
                                <i class="fa-solid fa-xmark"></i>
                            </button
                            </td>
                            <td><input type="text" required>></td>
                            

                        </tr>
                </table>
            </div>


            <div class="table-responsive">
                <h4>already answered area</h4>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <td>name</td>
                        <td>type of document</td>
                        <td>Request date</td>
                        <td>Year of study</td>
                        <td>Request status</td>   <!--(njiboha me basse de donnees) -->
                        <td>comment</td>

                    </thead>
                    <tbody>
                        <tr>
                            <td>mouhamed chaieb</td>
                            <td>certaficat scolaire</td>
                            <td>2024-11-08</td>
                            <td>l3</td>
                            <td>pret</td>
                            <td>oK</td>
                            <td><button >modifier</button></td>
                            

                        </tr>
                </table>
            </div>
        </div>
    </main>
    <script>
     
   
    </script>
</body>

</html>