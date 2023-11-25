<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php session_start(); ?>
    <nav style="background-color: black;" class="navbar navbar-expand-lg navbar-dark">
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
                        <button style="background-color: black;color:white;" class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= "ali" ?></button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </nav>
    <div style="height:20vh;"></div>
    <?php require_once 'frontFooter.php' ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>