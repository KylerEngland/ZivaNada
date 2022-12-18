<?php 
    include_once('navbar.php');
    if(isset($_GET['result'])){
        if($_GET['result']==0){
            echo('	<script type="text/javascript">
                        window.onload = function () { alert("Pogrešan email ili lozinka."); } 
                    </script>'); 
        }else if($_GET['result']==2){
            echo('	<script type="text/javascript">
                        window.onload = function () { alert("Ispunite polja za email i za lozinku."); } 
                    </script>');
        }
    }
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
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/birdseye.jpg')">
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
                        <p class="text-center">Postojeci profil:</p>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="loginName" class="form-control" name="loginEmail"/>
                            <label class="form-label" for="loginName">Email</label>
                            <!-- ili korisničko ime -->
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="loginPassword" class="form-control" name="loginPass"/>
                            <label class="form-label" for="loginPassword">Lozinka</label>
                        </div>

                        <!-- 2 column grid layout -->
                        <!-- <div class="row mb-4">
                            <div class="col-md-6 d-flex justify-content-center">
                                
                                <div class="form-check mb-3 mb-md-0">
                                    <input class="form-check-input" type="checkbox" value="" id="loginCheck"/>
                                    <label class="form-check-label" for="loginCheck">Automatska prijava</label>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex justify-content-center">
                                
                                <a href="#!">Zaboravio lozinku?</a>
                            </div>
                        </div> -->

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">Prijavi se</button>

                    </form>
                </div>
                <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                    <form action="protected/register.inc.php" method="post" autocomplete="off">

                        <p class="text-center">Novi profil:</p>

                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="registerName" class="form-control" name="registerName"/>
                            <label class="form-label" for="registerName">Ime</label>
                        </div>

                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="registerLastName" class="form-control" name="registerLastName"/>
                            <label class="form-label" for="registerLastName">Prezime</label>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="registerEmail" class="form-control" name="registerEmail"/>
                            <label class="form-label" for="registerEmail">Email</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="registerPassword" class="form-control" name="registerPassword"/>
                            <label class="form-label" for="registerPassword">Nova lozinka</label>
                        </div>

                        <!-- Repeat Password input -->
                        <!-- <div class="form-outline mb-4">
                            <input type="password" id="registerRepeatPassword" class="form-control" name="registerRepeatPassword"/>
                            <label class="form-label" for="registerRepeatPassword">Ponovi lozinku</label>
                        </div> -->

                        <!-- Checkbox -->
                        <!-- <div class="form-check d-flex justify-content-center mb-4">
                            <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
                            aria-describedby="registerCheckHelpText" />
                            <label class="form-check-label" for="registerCheck">
                            I have read and agree to the terms
                            </label>
                        </div> -->

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-3">Registriraj se</button>
                    </form>
                </div>
            </div>
            <!-- Pills content -->
    
        </div>
    </div>
    <!-- Footer file -->
    <?php include_once('footer.php')?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>