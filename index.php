<?php
session_start();
require_once('protected/functions.inc.php');
// Here I am instantiating a new DB so that I can get the total number of posts in the database.
$database = new DB;
$existingPosts = $database->getPostsNumber();
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
            if (isset($_SESSION['loggedin']) && $_SESSION['admin'] == 1): ?>

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
                                            <label for="date" class="col-form-label">Datum:</label>
                                            <input type="date" class="form-control" name="date">
                                        </div>
                                        <div class="mb-3">
                                            <label for="time" class="col-form-label">Vrijeme:</label>
                                            <input type="time" class="form-control" name="time">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="col-form-label">Opis:</label>
                                            <textarea class="form-control" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Zatvori</button>
                                        <button type="submit" class="btn btn-primary">Objavi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?= showPosts(); ?>
                <!-- First we make sure that there are more than 5 existing posts as that is the default shown when you load the page. -->
                <?php if ($existingPosts > 5): ?>
                    <!-- Then we check to see if the postNum variable has been set. -->
                    <?php if (isset($_POST['postNum'])): ?>

                        <!-- If it has, then we check if the amount of posts that exist is greater than the amount of posts being shown. -->
                        <?php if ($existingPosts > $_POST['postNum']): ?>
                            <div class="d-flex justify-content-center mb-4">
                                <form method="post" action="index.php#open-here">
                                    <input type="hidden" name="postNum"
                                        value=" <?= $postNum = isset($_POST['postNum']) ? $_POST['postNum'] : 5; ?>" />
                                    <input name="load" type="submit" class="btn btn-primary text-uppercase" value="Starije objave">
                                </form>
                            </div>
                        <?php endif; ?>

                        <!-- If the postNum variable has not been set, then we need to be able to push the button anyways -->
                    <?php else: ?>
                        <div class="d-flex justify-content-center mb-4">
                            <form method="post" action="index.php#open-here">
                                <input type="hidden" name="postNum"
                                    value=" <?= $postNum = isset($_POST['postNum']) ? $_POST['postNum'] : 5; ?>" />
                                <input name="load" type="submit" class="btn btn-primary text-uppercase" value="Starije objave">
                            </form>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
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