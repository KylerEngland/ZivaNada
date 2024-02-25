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

    <?php
    if (isset($_GET['result'])) {
        if ($_GET['result'] == 0) {
            echo ('	<script type="text/javascript">
                        window.onload = function () { alert("Pogrešan email ili lozinka."); } 
                    </script>');
        } else if ($_GET['result'] == 2) {
            echo ('	<script type="text/javascript">
                        window.onload = function () { alert("Ispunite polja za email i za lozinku!"); } 
                    </script>');
        } else if ($_GET['result'] == 3) {
            echo ('	<script type="text/javascript">
                        window.onload = function () { alert("Ispunite polja za email i za lozinku."); } 
                    </script>');
        }
    }
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 1) {
            // Could not get the data that should have been sent.
            echo '<script type="text/javascript">window.onload = function () { alert("Molimo ispunite sva polja za registraciju!"); } </script>';
        } else if ($_GET['error'] == 2) {
            // One or more values are empty.
            echo '<script type="text/javascript">window.onload = function () { alert("Molimo ispunite sva polja za registraciju."); } </script>';
        } else if ($_GET['error'] == 3) {
            // Invalid email address.
            echo '<script type="text/javascript">awindow.onload = function () { alert("Pogrešan email."); }</script>';

        }
    }
    ?>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/Backgrounds/IMG_0278.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Prijava i Registracija</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="container px-4 px-lg-5">
            <!-- Pills navs -->
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="tab-login" data-bs-toggle="pill" href="#pills-login" role="tab"
                        aria-controls="pills-login" aria-selected="true">Prijava</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-register" data-bs-toggle="pill" href="#pills-register" role="tab"
                        aria-controls="pills-register" aria-selected="false">Registracija</a>
                </li>
            </ul>
            <!-- Pills navs -->

            <!-- Pills content -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form action="protected/authenticate.inc.php" method="post">
                        <p class="text-center">Postojeći profil:</p>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="loginName" class="form-control" name="loginEmail" />
                            <label class="form-label" for="loginName">Email</label>
                            <!-- ili korisničko ime -->
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="loginPassword" class="form-control" name="loginPass" />
                            <label class="form-label" for="loginPassword">Lozinka</label>
                        </div>

                        <!-- Submit button -->
                        <div class="d-flex justify-content-between mb-4">
                            <div class="p-2">
                                <button type="submit" class="btn btn-primary btn-block mb-4">Prijavi se</button>
                            </div>
                            <div class="p-2">
                                <a data-bs-toggle="modal" data-bs-target="#forgotPassword" href="">Zaboravili
                                    lozinku?</a>
                            </div>
                        </div>

                    </form>

                    <div class="modal fade" id="forgotPassword" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" class="post-subtitle" id="exampleModalLabel">Zaboravili
                                        lozinku?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form name="emailReset" action="protected/emailLink.inc.php" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="title" class="col-form-label">Email:</label>
                                            <input type="text" class="form-control" name="resetEmail">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Zatvori</button>
                                        <button type="submit" class="btn btn-primary">Posalji email za reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                    <form action="protected/register.inc.php" method="post" autocomplete="off">

                        <p class="text-center">Novi profil:</p>

                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="registerName" class="form-control" name="registerName" />
                            <label class="form-label" for="registerName">Ime</label>
                        </div>

                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="registerLastName" class="form-control" name="registerLastName" />
                            <label class="form-label" for="registerLastName">Prezime</label>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="registerEmail" class="form-control" name="registerEmail" />
                            <label class="form-label" for="registerEmail">Email</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="firstPass" class="form-control" name="firstPass" />
                            <label class="form-label" for="firstPass">Nova lozinka</label>
                        </div>

                        <div id="error-text" class="text-danger"></div>
                        <!-- Confirm password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="secondPass" class="form-control" name="secondPass" />
                            <label class="form-label" for="secondPass">Ponovi lozinku</label>
                        </div>

                        <!-- Submit button -->
                        <button id="button" type="submit" class="btn btn-primary btn-block mb-3">Registriraj se</button>
                    </form>
                </div>
            </div>
            <!-- Pills content -->

        </div>
    </div>
    <!-- Footer file -->
    <?php include_once('includes/footer.php') ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="js/validate.js"></script>
</body>

</html>