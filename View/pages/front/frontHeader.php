<nav style="background-color: black;overflow:hidden;" class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="../../../index.php">We<span style="color:#01d28e;">Drive</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span style="font-size:0.8em;" class="navbar-toggler-icon"></span>
        <span>Menu</span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a href="../../index.php" class="nav-link">Home</a>
            </li>
            <?php if (!(isset($_SESSION['authentification']) && $_SESSION['authentification'] == true)) { ?>
                <li class="nav-item">
                    <a href="about.php" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="services.php" class="nav-link">Services</a>
                </li>
                <li class="nav-item">
                    <a href="pricing.php" class="nav-link">Pricing</a>
                </li>
                <li class="nav-item">
                    <a href="car.php" class="nav-link">Cars</a>
                </li>
                <li class="nav-item">
                    <a href="blog.php" class="nav-link">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a href="trajets.php" class="nav-link">trajets</a>
                </li>
                <li class="nav-item">
                    <a href="reservations.php" class="nav-link">reservations</a>
                </li>
                <li class="nav-item">
                    <a href="reclamations.php" class="nav-link">reclamations</a>
                </li>
                <li class="nav-item">
                    <a href="avis.php" class="nav-link">avis</a>
                </li>
            <?php } ?>
        </ul>
        <?php if (!(isset($_SESSION['authentification']) && $_SESSION['authentification'] == true)) { ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item cta"><a href="login.php" class="nav-link"><span>Login</span></a></li>
                <li class="nav-item cta"><a href="register.php" class="nav-link"><span>Register</span></a></li>
            </ul>
        <?php } else { ?>
            <div class="navbar-nav d-flex flex-row">

                <img style="width:4vw;height:4vw;" class="img-fluid rounded-circle shadow-sm navbar-brand-img" src="../../assets/images/person_1.jpg" alt="">
                <div class="dropdown">
                    <div>
                        <button style="background-color: black;color:white;" class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= "ali" ?></button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</nav>