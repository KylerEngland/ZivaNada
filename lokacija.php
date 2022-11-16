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
    <!-- CSS for Leaflet map API -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
        integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
        integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
    <style>
        #map{
            height: 400px;
        }
    </style>
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
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Objave</a></li>
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
                        <h1>Lokacija</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="d-flex justify-content-begin mb-4">
                        <h2 class="post-title">Pronađi nas</h2>
                    </div>
                    <div id="map" class="d-flex justify-content-begin mb-4">
                        <script>
                            var map = L.map('map').setView([43.511581, 16.481248], 17);
                            const attribution = '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap</a> contributors';
                            const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
                            const tiles = L.tileLayer(tileUrl,{attribution});
                            tiles.addTo(map);

                            var myIcon = L.icon({
                                iconUrl: 'assets/img/marker.png',
                                iconSize: [38, 38],
                                iconAnchor: [18.5, 38],
                                popupAnchor: [-3, -76],
                                shadowUrl: '',
                                shadowSize: [68, 95],
                                shadowAnchor: [22, 94]
                            });
                            
                            const mainMarker = L.marker([43.51105, 16.4801], {icon: myIcon});
                            mainMarker.addTo(map);

                            L.marker([43.511671, 16.482496]).addTo(map);
                            L.marker([43.512203, 16.480561]).addTo(map);
                            L.marker([43.511114, 16.480528]).addTo(map);
                        </script>
                    </div>
                    <div class="d-flex justify-content-begin mb-4">
                        <h3 class="post-subtitle">Parking</h3>
                    </div>
                    <div class="d-flex justify-content-begin mb-4">
                        <p class="post-meta">
                            Parking je moguc bilo koja od dva parkiralista blizu crkve, ili u parking garazi do McDonalds-a. 
                            Ulaz u crkvu se nalazi iznad McDonalds-a, pa se crkva najlakse pronade dolazeci sa Visoke ulice.
                            Sa Visoke ulize se samo proseta oko gornji dio zgrade, pa se onda crkva nalazi odmah desno.
                            Da bi se crkva nasla sa prednje strane zgrade, onda se mora pomocu setalista do mosta koja ide uz desne strane zgrade.
                        </p>
                    </div>
                </div>
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