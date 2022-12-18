<?php 
    require_once('protected/functions.inc.php');
    include_once('navbar.php');
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
            <?php
            if(isset($_SESSION['loggedin']) && $_SESSION['admin']== 1):?>

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

                                <form name="newPost" action="protected/submitPost.inc.php" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                        <label for="title" class="col-form-label">Titula:</label>
                                        <input type="text" class="form-control" name="title">
                                        </div>
                                        <div class="mb-3">
                                        <label for="description" class="col-form-label">Opis:</label>
                                        <textarea class="form-control" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                                        <button type="submit" class="btn btn-primary">Objavi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?=showPosts();?>
                <!-- <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Starije objave →</a></div> -->
            </div>
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