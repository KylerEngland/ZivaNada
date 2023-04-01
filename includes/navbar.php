<!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <img src="assets/img/DoveColorLogo.png" alt="" style="width: auto; height: 50px">
            <a class="navbar-brand" href="index.php">Živa Nada</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Događaji</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="vrijednosti.php">Temeljne Vrijednosti</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="lokacija.php">Lokacija</a></li>
                </ul>
                <div class="dropdown">
                <a class="btn btn-primary dropdown-toggle btn-sm" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="assets/img/Flags/hr.svg" alt="" style="height:1.5em; width:auto;">
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="en/<?php echo basename($_SERVER['PHP_SELF']);?>"><img src="assets/img/Flags/us.svg" alt="" style="height:1.5em; width:auto;">&ensp;English</a></li>
                </ul>
            </div>
            </div>
        </div>
    </nav>