<?php
session_start();
if (!isset($_SESSION["token"])) {
    // header("Location: ./index.php");
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
                        <th scope="col">Place Of Birth</th>
                        <th scope="col">Date Of Birth</th>
                        <th scope="col">Document Type </th>
                        <th scope="col">Demand Date</th>
                        <th scope="col">State</th>

                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr >
                        <td scope="row">1</td>
                        <td scope="col">L3</td>
                        <td scope="col">202239334814</td>
                        <td scope="col-2">MOHAMMED</td>
                        <td scope="col">CHAIB</td>
                        <td scope="col">TOUGGOURT</td>
                        <td scope="col">2022-03-04</td>
                        <td scope="col">Relevee De Note</td>
                        <td scope="col">2022-40-11</td>
                        <td scope="col" class="text-success">Ready For Take</td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td scope="col">M1</td>
                        <td scope="col">20223857414</td>
                        <td scope="col-2">anes</td>
                        <td scope="col">rahmoun</td>
                        <td scope="col">alger</td>
                        <td scope="col">2022-11-04</td>
                        <td scope="col">Atestatin De Bonne Conduite</td>
                        <td scope="col">2022-40-11</td>
                        <td scope="col" class="text-warning">In Progress</td>
                    </tr>
                    <tr>
                        <td scope="row">1</td>
                        <td scope="col">L2</td>
                        <td scope="col">202239334814</td>
                        <td scope="col-2">walid</td>
                        <td scope="col">anes</td>
                        <td scope="col">oran</td>
                        <td scope="col">2024-03-08</td>
                        <td scope="col">Certaifcate of Education</td>
                        <td scope="col">2022-40-11</td>
                        <td scope="col" class="text-primary">Requestd</td>
                    </tr>
                    <tr>
                        <td scope="row">1</td>
                        <td scope="col">L3</td>
                        <td scope="col">202239334814</td>
                        <td scope="col-2">MOHAMMED</td>
                        <td scope="col">CHAIB</td>
                        <td scope="col">TOUGGOURT</td>
                        <td scope="col">2022-03-04</td>
                        <td scope="col">Relevee De Note</td>
                        <td scope="col">2022-40-11</td>
                        <td scope="col" class="text-success">Ready For Take</td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td scope="col">M1</td>
                        <td scope="col">20223857414</td>
                        <td scope="col-2">anes</td>
                        <td scope="col">rahmoun</td>
                        <td scope="col">alger</td>
                        <td scope="col">2022-11-04</td>
                        <td scope="col">Atestatin De Bonne Conduite</td>
                        <td scope="col">2022-40-11</td>
                        <td scope="col" class="text-warning">In Progress</td>
                    </tr>
                    <tr>
                        <td scope="row">1</td>
                        <td scope="col">L2</td>
                        <td scope="col">202239334814</td>
                        <td scope="col-2">walid</td>
                        <td scope="col">anes</td>
                        <td scope="col">oran</td>
                        <td scope="col">2024-03-08</td>
                        <td scope="col">Certaifcate of Education</td>
                        <td scope="col">2022-40-11</td>
                        <td scope="col" class="text-primary">Requestd</td>
                    </tr>
                    <tr>
                        <td scope="row">1</td>
                        <td scope="col">L3</td>
                        <td scope="col">202239334814</td>
                        <td scope="col-2">MOHAMMED</td>
                        <td scope="col">CHAIB</td>
                        <td scope="col">TOUGGOURT</td>
                        <td scope="col">2022-03-04</td>
                        <td scope="col">Relevee De Note</td>
                        <td scope="col">2022-40-11</td>
                        <td scope="col" class="text-success">Ready For Take</td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td scope="col">M1</td>
                        <td scope="col">20223857414</td>
                        <td scope="col-2">anes</td>
                        <td scope="col">rahmoun</td>
                        <td scope="col">alger</td>
                        <td scope="col">2022-11-04</td>
                        <td scope="col">Atestatin De Bonne Conduite</td>
                        <td scope="col">2022-40-11</td>
                        <td scope="col" class="text-warning">In Progress</td>
                    </tr>
                    <tr>
                        <td scope="row">1</td>
                        <td scope="col">L2</td>
                        <td scope="col">202239334814</td>
                        <td scope="col-2">walid</td>
                        <td scope="col">anes</td>
                        <td scope="col">oran</td>
                        <td scope="col">2024-03-08</td>
                        <td scope="col">Certaifcate of Education</td>
                        <td scope="col">2022-40-11</td>
                        <td scope="col" class="text-primary">Requestd</td>
                    </tr>
                    <tr>
                        <td scope="row">1</td>
                        <td scope="col">L3</td>
                        <td scope="col">202239334814</td>
                        <td scope="col-2">MOHAMMED</td>
                        <td scope="col">CHAIB</td>
                        <td scope="col">TOUGGOURT</td>
                        <td scope="col">2022-03-04</td>
                        <td scope="col">Relevee De Note</td>
                        <td scope="col">2022-40-11</td>
                        <td scope="col" class="text-success">Ready For Take</td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td scope="col">M1</td>
                        <td scope="col">20223857414</td>
                        <td scope="col-2">anes</td>
                        <td scope="col">rahmoun</td>
                        <td scope="col">alger</td>
                        <td scope="col">2022-11-04</td>
                        <td scope="col">Atestatin De Bonne Conduite</td>
                        <td scope="col">2022-40-11</td>
                        <td scope="col" class="text-warning">In Progress</td>
                    </tr>
                    <tr>
                        <td scope="row">1</td>
                        <td scope="col">L2</td>
                        <td scope="col">202239334814</td>
                        <td scope="col-2">walid</td>
                        <td scope="col">anes</td>
                        <td scope="col">oran</td>
                        <td scope="col">2024-03-08</td>
                        <td scope="col">Certaifcate of Education</td>
                        <td scope="col">2022-40-11</td>
                        <td scope="col" class="text-primary">Requestd</td>
                    </tr>
                    <tr>
                        <td scope="row">1</td>
                        <td scope="col">L3</td>
                        <td scope="col">202239334814</td>
                        <td scope="col-2">MOHAMMED</td>
                        <td scope="col">CHAIB</td>
                        <td scope="col">TOUGGOURT</td>
                        <td scope="col">2022-03-04</td>
                        <td scope="col">Relevee De Note</td>
                        <td scope="col">2022-40-11</td>
                        <td scope="col" class="text-success">Ready For Take</td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td scope="col">M1</td>
                        <td scope="col">20223857414</td>
                        <td scope="col-2">anes</td>
                        <td scope="col">rahmoun</td>
                        <td scope="col">alger</td>
                        <td scope="col">2022-11-04</td>
                        <td scope="col">Atestatin De Bonne Conduite</td>
                        <td scope="col">2022-40-11</td>
                        <td scope="col" class="text-warning">In Progress</td>
                    </tr>
                    <tr>
                        <td scope="row">1</td>
                        <td scope="col">L2</td>
                        <td scope="col">202239334814</td>
                        <td scope="col-2">walid</td>
                        <td scope="col">anes</td>
                        <td scope="col">oran</td>
                        <td scope="col">2024-03-08</td>
                        <td scope="col">Certaifcate of Education</td>
                        <td scope="col">2022-40-11</td>
                        <td scope="col" class="text-primary">Requestd</td>
                    </tr>
                    <tr>
                        <td scope="row">1</td>
                        <td scope="col">L3</td>
                        <td scope="col">202239334814</td>
                        <td scope="col-2">MOHAMMED</td>
                        <td scope="col">CHAIB</td>
                        <td scope="col">TOUGGOURT</td>
                        <td scope="col">2022-03-04</td>
                        <td scope="col">Relevee De Note</td>
                        <td scope="col">2022-40-11</td>
                        <td scope="col" class="text-success">Ready For Take</td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td scope="col">M1</td>
                        <td scope="col">20223857414</td>
                        <td scope="col-2">anes</td>
                        <td scope="col">rahmoun</td>
                        <td scope="col">alger</td>
                        <td scope="col">2022-11-04</td>
                        <td scope="col">Atestatin De Bonne Conduite</td>
                        <td scope="col">2022-40-11</td>
                        <td scope="col" class="text-warning">In Progress</td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </main>
    <script>


    </script>
</body>

</html>