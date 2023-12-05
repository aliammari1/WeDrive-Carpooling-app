<?php
require_once "../../../Controller/Users/authentification.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>WeDrive</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.0/css/all.min.css" integrity="sha384-G8Nv55OhLaLxjkfzDOw27ikW8+wrGEGnm9XkysaJ0t0+NR8jPcJxPveo31CHfztG" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flaticon@11.0.1/css/flaticon.css" integrity="sha384-31IkX41D6+3qgJqxYtr1kbyxHmGQzOm/+6lJU6fZU9XuSY7cL/HSdGn4V4Jz5u5K" crossorigin="anonymous" />
  <link rel="icon" type="image/png" href="../../assets/images/favicon.png" />
  <link rel="stylesheet" type="text/css" href="../../assets/css/open-iconic-bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.0/css/all.min.css" integrity="sha384-G8Nv55OhLaLxjkfzDOw27ikW8+wrGEGnm9XkysaJ0t0+NR8jPcJxPveo31CHfztG" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flaticon@11.0.1/css/flaticon.css" integrity="sha384-31IkX41D6+3qgJqxYtr1kbyxHmGQzOm/+6lJU6fZU9XuSY7cL/HSdGn4V4Jz5u5K" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <link rel="icon" type="image/png" href="../../assets/images/favicon.png" />
  <link rel="stylesheet" type="text/css" href="../../assets/css/open-iconic-bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="../../assets/css/animate.css" />

  <link rel="stylesheet" type="text/css" href="../../assets/css/owl.carousel.min.css" />
  <link rel="stylesheet" type="text/css" href="../../assets/css/owl.theme.default.min.css" />
  <link rel="stylesheet" type="text/css" href="../../assets/css/magnific-popup.css" />

  <link rel="stylesheet" type="text/css" href="../../assets/css/aos.css" />

  <link rel="stylesheet" type="text/css" href="../../assets/css/ionicons.min.css" />

  <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap-datepicker.css" />
  <link rel="stylesheet" type="text/css" href="../../assets/css/jquery.timepicker.css" />

  <link rel="stylesheet" type="text/css" href="../../assets/css/flaticon.css" />
  <link rel="stylesheet" type="text/css" href="../../assets/css/icomoon.css" />
  <link rel="stylesheet" type="text/css" href="../../assets/css/style.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="../../index.html">We<span>Drive</span></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="../../index.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="about.html" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="services.html" class="nav-link">Services</a>
          </li>
          <li class="nav-item">
            <a href="pricing.html" class="nav-link">Pricing</a>
          </li>
          <li class="nav-item">
            <a href="car.html" class="nav-link">Cars</a>
          </li>
          <li class="nav-item">
            <a href="blog.html" class="nav-link">Blog</a>
          </li>
          <li class="nav-item active">
            <a href="reclamation.html" class="nav-link">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../../assets/images/bg_1.jpg')" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs">
            <span class="mr-2"><a href="../../index.html">Home <i class="ion-ios-arrow-forward"></i></a></span>
            <span>Contact <i class="ion-ios-arrow-forward"></i></span>
          </p>
          <h1 class="mb-3 bread">Contact Us</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section contact-section">
    <div class="container">
      <div class="row d-flex mb-5 contact-info">
        <div class="col-md-4">
          <div class="row mb-5">
            <div class="col-md-12">
              <div class="border w-100 p-4 rounded mb-2 d-flex">
                <div class="icon mr-3">
                  <span class="icon-map-o"></span>
                </div>
                <p>
                  <span>Address:</span> 198 West 21th Street, Suite 721 New
                  York NY 10016
                </p>
              </div>
            </div>
            <div class="col-md-12">
              <div class="border w-100 p-4 rounded mb-2 d-flex">
                <div class="icon mr-3">
                  <span class="icon-mobile-phone"></span>
                </div>
                <p>
                  <span>Phone:</span>
                  <a href="tel://1234567920">+ 1235 2355 98</a>
                </p>
              </div>
            </div>
            <div class="col-md-12">
              <div class="border w-100 p-4 rounded mb-2 d-flex">
                <div class="icon mr-3">
                  <span class="icon-envelope-o"></span>
                </div>
                <p>
                  <span>Email:</span>
                  <a href="mailto:info@yoursite.com">info@yoursite.com</a>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8 block-9 mb-md-5">
          <form action="../../../Controller/Reclamations/addreclamation.php" class="p-5 bg-primary contact-form" style="opacity: 0.775; border-radius: 40px" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6 form-group">
                <label for="nom" class="form-label text-white">Nom</label>
                <select class="form-control selectNom w-100" name="nom" id="nom" required></select>
              </div>
              <div class="col-md-6 form-group">
                <label for="date" class="form-label text-white">Date</label>
                <input type="date" class="form-control form-control-alternative" id="date" name="date" required />
              </div>
            </div>
            <div class="form-group">
              <label for="description" class="form-label text-white">Description</label>
              <textarea name="description" id="description" cols="30" rows="7" class="form-control form-control-alternative" placeholder="Entrez une description de votre demande" required></textarea>
            </div>
            <div class="form-group">
              <label for="pieces_jointes" class="form-label text-white">Pièce jointe</label>
              <input type="file" class="form-control form-control-alternative" id="pieces_jointes" name="pieces_jointes" />
            </div>
            <div class="form-group mt-4">
              <button type="submit" class="btn btn-block btn-lg shadow-lg text-white" style="background-color: #130ac77b; border-radius: 20px">
                Envoyer
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div id="map" class="bg-white"></div>
        </div>
      </div>
    </div>
  </section>

  <footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">
              <a href="#" class="logo">We<span>Drive</span></a>
            </h2>
            <p>
              Far far away, behind the word mountains, far from the countries
              Vokalia and Consonantia, there live the blind texts.
            </p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate">
                <a href="#"><span class="icon-twitter"></span></a>
              </li>
              <li class="ftco-animate">
                <a href="#"><span class="icon-facebook"></span></a>
              </li>
              <li class="ftco-animate">
                <a href="#"><span class="icon-instagram"></span></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-5">
            <h2 class="ftco-heading-2">Information</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">About</a></li>
              <li><a href="#" class="py-2 d-block">Services</a></li>
              <li>
                <a href="#" class="py-2 d-block">Term and Conditions</a>
              </li>
              <li>
                <a href="#" class="py-2 d-block">Best Price Guarantee</a>
              </li>
              <li>
                <a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Customer Support</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">FAQ</a></li>
              <li><a href="#" class="py-2 d-block">Payment Option</a></li>
              <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
              <li><a href="#" class="py-2 d-block">How it works</a></li>
              <li>
                <a href="#" class="py-2 d-block">Ajouter une réclamation</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li>
                  <span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California,
                    USA</span>
                </li>
                <li>
                  <a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a>
                </li>
                <li>
                  <a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script>
            All rights reserved | This template is made with
            <i class="icon-heart color-danger" aria-hidden="true"></i> by
            <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg>
  </div>

  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <script src="../../assets/js/jquery.easing.1.3.js"></script>
  <script src="../../assets/js/jquery.waypoints.min.js"></script>
  <script src="../../assets/js/jquery.stellar.min.js"></script>
  <script src="../../assets/js/owl.carousel.min.js"></script>
  <script src="../../assets/js/jquery.magnific-popup.min.js"></script>
  <script src="../../assets/js/aos.js"></script>
  <script src="../../assets/js/jquery.animateNumber.min.js"></script>
  <script src="../../assets/js/bootstrap-datepicker.js"></script>
  <script src="../../assets/js/jquery.timepicker.min.js"></script>
  <script src="../../assets/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../../assets/js/google-map.js"></script>
  <script src="../../assets/js/main.js"></script>
  <script>
    const selectNom = document.querySelector('.selectNom')
    fetch('../../../Controller/Reclamations/getType.php')
      .then(res => res.text())
      .then(data => {
        selectNom.innerHTML = data;
        console.log(data);
      })
    setInterval(() => {
      fetch('../../../Controller/Reclamations/getType.php')
        .then(res => res.text())
        .then(data => {
          selectNom.innerHTML = data;
          console.log(data);
        })
    }, 3600000);
  </script>
</body>

</html>