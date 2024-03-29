<?php
require_once('../protected/redirect.inc.php');
?>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <img src="../assets/img/DoveColorLogo.png" alt="" style="width: auto; height: 50px">
        <a class="navbar-brand" href="index.php">Živa Nada</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="osoblje.php">Staff</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="vrijednosti.php">Core Values</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="lokacija.php">Location</a></li>
            </ul>
            <div class="dropdown">
                <a class="btn btn-outline-secondary dropdown-toggle btn-sm" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../assets/img/Flags/us.svg" alt="" style="height:1.5em; width:auto;">
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item"href="../<?= redirectTranslation(basename($_SERVER['PHP_SELF'])); ?>">
                            <img src="../assets/img/Flags/hr.svg" alt="" style="height:1.5em; width:auto;">&ensp;Hrvatski
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>