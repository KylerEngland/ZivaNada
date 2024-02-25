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
    <?php include_once('includes/navbar.php'); ?>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/Backgrounds/marjan.jpg')">
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

                            const firstParking = L.marker([43.511671, 16.482496]);
                            firstParking.addTo(map);
                            firstParking.bindPopup("<p>Kada parkirate svoj auto uputite se prema zapadu (McDonaldu). Primijetit čete uzbrdicu iza prostora koji služi za sjedenje na otvorenom. Krenite prema uzbrdici i počnite se uspinjati. S vaše desne strane čete uočit metalne stepenice, koje vas vode do parkinga A. Kada dođete do vrha stepenica nastavite ravno nekoliko metara. Na vašoj lijevoj strani pronaći čete glavni ulaz crkve (jug) koji je označen natpisom Živa Nada.</p><br><a href='https://maps.app.goo.gl/snQsGnhTYEZb2tje6' target='_blank'>Google karta</a>");

                            const secondParking = L.marker([43.512203, 16.480561]);
                            secondParking.bindPopup("<p>Kada parkirate svoj auto, uputite se prema zapadu (skrenite lijevo s parkinga). Zatim hodajte ravno do prvog skretanja u lijevo koje vas vodi na T raskrižje. Sa ovog raskrižja hodajte ravno cca 80 m prema jugu (plavo - bijeloj zgradi). Potom skrenite u lijevo i nastavite ravno kroz prolaz. Kada prođete prolaz ponovo skrenite u lijevo, hodajte nekoliko metara ravno. Na vašoj lijevoj strani pronaći čete glavni ulaz crkve (jug) koji je označen natpisom Živa Nada.</p><br><a href='https://maps.app.goo.gl/AUcGCYMePghfFem46' target='_blank'>Google karta</a>");

                            const thirdParking = L.marker([43.511114, 16.480528]).addTo(map);
                            thirdParking.bindPopup("<p>Ako želite, mozete parkiratu u parking garaži do McDonalds-a. Od tu je vrlo lako prošetati na lijevoj strani zgrade, pa je crkva onda odmah desno.</p><br><a href='https://maps.app.goo.gl/kXJfxFvFa3BSRwcJ8' target='_blank'>Google karta</a>");


                        </script>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer file -->
    <?php include_once('includes/footer.php')?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>