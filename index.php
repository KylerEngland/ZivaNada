<?php 
    require_once('protected/config.inc.php');
    require_once('protected/functions.inc.php');
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
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <img src="assets/img/Dove Color Logo.png" alt="" width="auto" height="50px">
            <a class="navbar-brand" href="index.php">Živa Nada</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="">O Nama</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="">Objave</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="kalendar.php">Kalendar</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="lokacija.php">Lokacija</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="">Login</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="">Registracija</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/vidilica2.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Živa Nada</h1>
                        <span class="subheading">Kristova Crkva</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="d-flex justify-content-begin mb-4">
                <!-- Button trigger modal for new post -->
                <button type="button" class="btn btn-primary text-uppercase" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Nova objava
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" class="post-subtitle" id="exampleModalLabel">Nova objava</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                      <label for="titula" class="col-form-label">Titula:</label>
                                      <input type="text" class="form-control" id="titula">
                                    </div>
                                    <div class="mb-3">
                                      <label for="opis" class="col-form-label">Opis:</label>
                                      <textarea class="form-control" id="opis"></textarea>
                                    </div>
                                  </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7">
            <?php 
                try{
                    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql = "SELECT * FROM posts";
                    $statement = $pdo->prepare($sql);
                    $statement->execute();
                    echo outputPost($statement);
                }
                catch(PDOException $e){
                    die( $e->getMessage() );
                }
                finally {
                    $pdo = null;
                }
            ?>
                <!-- Post preview-->
                <!-- <div class="announcement-preview">
                    <a href="announcement.php">
                        <h2 class="post-title">Ovo je primjer obavijesti</h2>
                        <h3 class="post-subtitle">Tu ide mali opis o dogadaju</h3>
                    </a>
                    <p class="post-meta">
                        Objavio
                        <a href="#!">Kyler England</a>
                        na 24/9/2022
                    </p>
                </div> -->
                <!-- Divider-->
                <!-- <hr class="my-4" /> -->
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Starije objave →</a></div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/ZivaNadaSplit">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <!-- <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li> -->
                    </ul>
                    <div class="small text-center text-muted fst-italic">Telefon: +385 95 350 0504</div>
                    <div class="small text-center text-muted fst-italic">Mail: zivanada@gmail.com</div>
                    <div class="small text-center text-muted fst-italic">Adresa: Tavelićeva 46, Split, Croatia</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>