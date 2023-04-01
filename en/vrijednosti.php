<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Živa Nada</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/favicon/site.webmanifest">
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
    <!-- CSS for Leaflet map API -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
        integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
</head>

<body>
    <?php include_once('includes/navbar.php'); ?>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('../assets/img/RivaDrone.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Core Values</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="d-flex justify-content-begin mb-4">

                    <div class="bg-white py-5">
                        <!-- Container full of divs that are organized into rows and columns containing church value information -->
                        <!-- The organization of the divs is flipped on every other one to make the organization of the page look more aesthetically pleasing -->
                        <div class="container py-5">
                            <div class="row align-items-center mb-5">
                                <div class="col-lg-6 order-2 order-lg-1">
                                    <h2 class="fw-bold">Devotion</h2>
                                    <p class="fst-italic text-muted mb-4">
                                        God is worthy of our worship, so it is important for us to worship God
                                        personally and collectively in the Church. We hold that worshipping God is a
                                        lifestyle that incorporates God into every part of our lives. It is gratitude
                                        for all that God is and all the good he has done in our lives, which we express
                                        through prayers, testimonies, music, but also through daily obedience to the
                                        Word of God.
                                    </p>
                                    <p class="mb-4">(Psalm 105, 1-3)</p>
                                </div>
                                <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img
                                        src="../assets/img/Values/Devotion.png" alt="" class="img-fluid mb-4 mb-lg-0">
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-5 px-5 mx-auto">
                                    <img src="../assets/img/Values/bible.png" alt="" class="img-fluid mb-4 mb-lg-0">
                                </div>
                                <div class="col-lg-6">
                                    <h2 class="fw-bold">Biblical teaching</h2>
                                    <p class="fst-italic text-muted mb-4">
                                        The Bible is an inspired, infallible word of God addressed to man. As such, she
                                        is our greatest authority guiding us in our daily lives. We practice Bible
                                        teaching because we believe in the change that occurs within us when we rely on
                                        God's Word.
                                    </p>
                                    <p class="mb-4">(2. Timothy 3,16-17)</p>
                                </div>
                            </div>
                        </div>
                        <div class="container py-5">
                            <div class="row align-items-center mb-5">
                                <div class="col-lg-6 order-2 order-lg-1">
                                    <h2 class="fw-light">Evangelizing</h2>
                                    <p class="fst-italic text-muted mb-4">
                                        God loved the world so much that He gave His only Son so that no one who
                                        believes in Him should die but have eternal life. It is important for us to
                                        proclaim this Good News to our families, friends, the wider community, and to
                                        the whole world.
                                    </p>
                                    <p class="fw-bold mb-4">(John 3,16)</p>
                                </div>
                                <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img
                                        src="../assets/img/Values/evangelize.png" alt="" class="img-fluid mb-4 mb-lg-0">
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-5 px-5 mx-auto">
                                    <img src="../assets/img/Values/acceptance3.png" alt=""
                                        class="img-fluid mb-4 mb-lg-0">
                                </div>
                                <div class="col-lg-6">
                                    <h2 class="fw-light">Acceptance</h2>
                                    <p class="fst-italic text-muted mb-4">
                                        God accepted us unconditionally through the sacrifice of Jesus Christ. Because
                                        we are accepted by God's grace and not by our actions, we welcome others,
                                        empathize with them, and welcome them, regardless of age, gender, ethnic origin,
                                        education, and socio-economic status.
                                    </p>
                                    <p class="fw-bold mb-4">(Romans 15,7)</p>
                                </div>
                            </div>
                        </div>
                        <div class="container py-5">
                            <div class="row align-items-center mb-5">
                                <div class="col-lg-6 order-2 order-lg-1">
                                    <h2 class="fw-light">Family</h2>
                                    <p class="fst-italic text-muted mb-4">
                                        The family is at the heart of God's plan for man. As such, it is a place where
                                        we can experience love, connection, understanding, but also a place of spiritual
                                        and emotional maturation of the individual. Therefore, we foster an atmosphere
                                        that strengthens marriages, families and working with children. o-economic
                                        status.
                                    </p>
                                    <p class="fw-bold mb-4">(Ephesians 5,22-33, 6,1-4)</p>
                                </div>
                                <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img
                                        src="../assets/img/Values/family.png" alt="" class="img-fluid mb-4 mb-lg-0">
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-5 px-5 mx-auto">
                                    <img src="../assets/img/Values/serving.png" alt="" class="img-fluid mb-4 mb-lg-0">
                                </div>
                                <div class="col-lg-6">
                                    <h2 class="fw-light">Involvement</h2>
                                    <p class="fst-italic text-muted mb-4">
                                        All believers are called to participate in the life of the Church. We encourage
                                        the involvement of each individual in the various ministries within the Church,
                                        all according to the gifts and talents he has received from God. The involvement
                                        of the faithful is important because it contributes to the growth of the body of
                                        Christ, that is, the Church, and enables him to experience Christian communion.
                                        Therefore, every believer is an important and integral part of the life and
                                        service of the Church.
                                    </p>
                                    <p class="fw-bold mb-4">(1. Peter 4,10)</p>
                                </div>
                            </div>
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
    <script src="../js/scripts.js"></script>
</body>

</html>