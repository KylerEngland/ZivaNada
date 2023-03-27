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
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE): ?>
                    <div class="small text-center text-muted fst-italic"><a href="profile.php">Profil</a></div>
                <?php else: ?>
                    <div class="small text-center text-muted fst-italic"><a href="loginPage.php">Admin prijava</a></div>
                <?php endif; ?>
                <div class="dropdown text-center">
                    <a class="btn btn-outline-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Icon Credits
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="https://www.flaticon.com/free-icons/devotion" title="devotion icons" >Devotion icons
                            created by Freepik - Flaticon</a></li>
                        <li><a class="dropdown-item" href="https://www.flaticon.com/free-icons/church" title="church icons">Church
                            icons created by Freepik - Flaticon</a></li>
                        <li><a class="dropdown-item" href="https://www.flaticon.com/free-icons/speak" title="speak icons">Speak icons
                            created by Voysla - Flaticon</a></li>
                        <li><a class="dropdown-item" href="https://www.flaticon.com/free-icons/hug" title="hug icons">Hug icons
                            created by Irakun - Flaticon</a></li>
                        <li><a class="dropdown-item" href="https://www.flaticon.com/free-icons/family" title="family icons">Family
                            icons created by yut1655 - Flaticon</a></li>
                        <li><a class="dropdown-item" href="https://www.flaticon.com/free-icons/help" title="help icons">Help icons
                            created by Freepik - Flaticon</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>