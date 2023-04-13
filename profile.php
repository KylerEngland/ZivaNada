<?php
session_start();
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Živa Nada</title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <?php include_once('includes/navbar.php'); ?>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/birdseye.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Profil</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="container px-4 px-lg-5">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="card">
                    <div class="card-header">
                        Detalji profila
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Ime i Prezime:</h5>
                        <p class="card-text">
                            <?= $_SESSION['ime'] . ' ' . $_SESSION['prezime'] ?>
                        </p>

                        <h5 class="card-title">Email:</h5>
                        <p class="card-text">
                            <?= $_SESSION['email'] ?>
                        </p>

                        <a class="btn btn-primary text-uppercase" href="protected/logout.inc.php">Odjava</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Footer file -->
    <?php include_once('includes/footer.php') ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>