<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
  <title>WeDrive</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <style>
    .circle.active {
      background-color: #1a1a1a;
    }

    .containerProgress {
      margin-bottom: 30px;
    }

    .containerCircles {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .circle {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: #fff;
      border: 2px solid #000;
      font-weight: bold;
      font-size: 18px;
    }

    .line {
      border-top: 2px solid #000 !important;
      width: 100%;
      margin-top: 20px;
      margin-bottom: 20px;
    }
  </style>
</head>

<body class="">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <!-- <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="dashboard.php">
        Argon Dashboard 2
      </a> -->
      <!-- <button
          class="navbar-toggler shadow-none ms-2"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navigation"
          aria-controls="navigation"
          aria-expanded="false"
          aria-label="Toggle navigation"> 
          <span class="navbar-toggler-icon mt-2">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </span>
        </button>-->
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav mx-auto">
          <!-- <li class="nav-item">
              <a
                class="nav-link d-flex align-items-center me-2 active"
                aria-current="page"
                href="dashboard.php">
                <i class="fa fa-chart-pie opacity-6 me-1"></i>
                Dashboard
              </a>
            </li> -->
          <li class="nav-item">
            <a class="nav-link me-2" href="../../index.php">
              <i class="fa fa-user opacity-6 me-1"></i>
              Accueil
            </a>
          </li>
          <!-- <li class="nav-item">
              <a class="nav-link me-2" href="register.php">
                <i class="fas fa-user-circle opacity-6 me-1"></i>
                Sign Up
              </a>
            </li> -->
          <li class="nav-item">
            <a class="nav-link me-2" href="login.php">
              <i class="fas fa-key opacity-6 me-1"></i>
              Sign In
            </a>
          </li>
        </ul>
        <!-- <ul class="navbar-nav d-lg-block d-none">
            <li class="nav-item">
              <a
                href="https://www.creative-tim.com/product/argon-dashboard"
                class="btn btn-sm mb-0 me-1 bg-gradient-light"
                >Free Download</a
              >
            </li>
          </ul> -->
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <main class="main-content mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="
          background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg');
          background-position: top;
        ">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Welcome!</h1>
            <p class="text-lead text-white">
              Use these awesome forms to login or create new account in your
              project for free.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Register with</h5>
            </div>
            <div class="row px-xl-5 px-sm-4 px-3">
              <div class="col-3 ms-auto px-1">
                <a class="btn btn-outline-light w-100" href="javascript:">
                  <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(3.000000, 3.000000)" fill-rule="nonzero">
                        <circle fill="#3C5A9A" cx="29.5091719" cy="29.4927506" r="29.4882047"></circle>
                        <path d="M39.0974944,9.05587273 L32.5651312,9.05587273 C28.6886088,9.05587273 24.3768224,10.6862851 24.3768224,16.3054653 C24.395747,18.2634019 24.3768224,20.1385313 24.3768224,22.2488655 L19.8922122,22.2488655 L19.8922122,29.3852113 L24.5156022,29.3852113 L24.5156022,49.9295284 L33.0113092,49.9295284 L33.0113092,29.2496356 L38.6187742,29.2496356 L39.1261316,22.2288395 L32.8649196,22.2288395 C32.8649196,22.2288395 32.8789377,19.1056932 32.8649196,18.1987181 C32.8649196,15.9781412 35.1755132,16.1053059 35.3144932,16.1053059 C36.4140178,16.1053059 38.5518876,16.1085101 39.1006986,16.1053059 L39.1006986,9.05587273 L39.0974944,9.05587273 L39.0974944,9.05587273 Z" fill="#FFFFFF"></path>
                      </g>
                    </g>
                  </svg>
                </a>
              </div>
              <div class="col-3 px-1">
                <a class="btn btn-outline-light w-100" href="javascript:">
                  <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(7.000000, 0.564551)" fill="#000000" fill-rule="nonzero">
                        <path d="M40.9233048,32.8428307 C41.0078713,42.0741676 48.9124247,45.146088 49,45.1851909 C48.9331634,45.4017274 47.7369821,49.5628653 44.835501,53.8610269 C42.3271952,57.5771105 39.7241148,61.2793611 35.6233362,61.356042 C31.5939073,61.431307 30.2982233,58.9340578 25.6914424,58.9340578 C21.0860585,58.9340578 19.6464932,61.27947 15.8321878,61.4314159 C11.8738936,61.5833617 8.85958554,57.4131833 6.33064852,53.7107148 C1.16284874,46.1373849 -2.78641926,32.3103122 2.51645059,22.9768066 C5.15080028,18.3417501 9.85858819,15.4066355 14.9684701,15.3313705 C18.8554146,15.2562145 22.5241194,17.9820905 24.9003639,17.9820905 C27.275104,17.9820905 31.733383,14.7039812 36.4203248,15.1854154 C38.3824403,15.2681959 43.8902255,15.9888223 47.4267616,21.2362369 C47.1417927,21.4153043 40.8549638,25.1251794 40.9233048,32.8428307 M33.3504628,10.1750144 C35.4519466,7.59650964 36.8663676,4.00699306 36.4804992,0.435448578 C33.4513624,0.558856931 29.7884601,2.48154382 27.6157341,5.05863265 C25.6685547,7.34076135 23.9632549,10.9934525 24.4233742,14.4943068 C27.7996959,14.7590956 31.2488715,12.7551531 33.3504628,10.1750144"></path>
                      </g>
                    </g>
                  </svg>
                </a>
              </div>
              <div class="col-3 me-auto px-1">
                <a class="btn btn-outline-light w-100" href="javascript:">
                  <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(3.000000, 2.000000)" fill-rule="nonzero">
                        <path d="M57.8123233,30.1515267 C57.8123233,27.7263183 57.6155321,25.9565533 57.1896408,24.1212666 L29.4960833,24.1212666 L29.4960833,35.0674653 L45.7515771,35.0674653 C45.4239683,37.7877475 43.6542033,41.8844383 39.7213169,44.6372555 L39.6661883,45.0037254 L48.4223791,51.7870338 L49.0290201,51.8475849 C54.6004021,46.7020943 57.8123233,39.1313952 57.8123233,30.1515267" fill="#4285F4"></path>
                        <path d="M29.4960833,58.9921667 C37.4599129,58.9921667 44.1456164,56.3701671 49.0290201,51.8475849 L39.7213169,44.6372555 C37.2305867,46.3742596 33.887622,47.5868638 29.4960833,47.5868638 C21.6960582,47.5868638 15.0758763,42.4415991 12.7159637,35.3297782 L12.3700541,35.3591501 L3.26524241,42.4054492 L3.14617358,42.736447 C7.9965904,52.3717589 17.959737,58.9921667 29.4960833,58.9921667" fill="#34A853"></path>
                        <path d="M12.7159637,35.3297782 C12.0932812,33.4944915 11.7329116,31.5279353 11.7329116,29.4960833 C11.7329116,27.4640054 12.0932812,25.4976752 12.6832029,23.6623884 L12.6667095,23.2715173 L3.44779955,16.1120237 L3.14617358,16.2554937 C1.14708246,20.2539019 0,24.7439491 0,29.4960833 C0,34.2482175 1.14708246,38.7380388 3.14617358,42.736447 L12.7159637,35.3297782" fill="#FBBC05"></path>
                        <path d="M29.4960833,11.4050769 C35.0347044,11.4050769 38.7707997,13.7975244 40.9011602,15.7968415 L49.2255853,7.66898166 C44.1130815,2.91684746 37.4599129,0 29.4960833,0 C17.959737,0 7.9965904,6.62018183 3.14617358,16.2554937 L12.6832029,23.6623884 C15.0758763,16.5505675 21.6960582,11.4050769 29.4960833,11.4050769" fill="#EB4335"></path>
                      </g>
                    </g>
                  </svg>
                </a>
              </div>
              <div class="mt-2 position-relative text-center">
                <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                  or
                </p>
              </div>
            </div>
            <div class="container mt-4">
              <div class="row-cols-5 containerCircles ms-1">
                <div class="col d-flex justify-content-center align-items-center">
                  <div class="circle active">1</div>
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                  <hr class="line" />
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                  <div class="circle">2</div>
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                  <hr class="line" />
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                  <div class="circle">3</div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row w-100 ms-1 mb-3">
                <span style="
                      background-color: rgba(255, 255, 108, 0.764);
                      border-radius: 10px;
                    " class="p-2 text-center d-none warn">
                  Remplir tous les champs S'il vous plaît!!!
                </span>
              </div>
              <form method="post" action="../../../Controller/Users/ControlSignup.php" role="form" enctype="multipart/form-data" id="form">
                <div id="form1">
                  <div class="row w-100 ms-1 mb-2">
                    <input type="text" class="form-control col" placeholder="Prénom" aria-label="prenom" id="prenom" name="prenom" />
                    <input type="text" class="form-control col ms-3" placeholder="Nom" aria-label="nom" id="nom" name="nom" />
                  </div>
                  <div class="row w-100 ms-1 mb-2">
                    <div class="col" id="prenomError"></div>
                    <div class="col" id="nomError"></div>
                  </div>
                  <div class="row w-100 ms-0 mb-2">
                    <input type="email" class="form-control mx-1" placeholder="Email" aria-label="email" id="email" name="email" />
                  </div>
                  <div class="row w-100 ms-1 mb-2">
                    <div id="emailError"></div>
                  </div>
                  <div class="row w-100 ms-0 mb-2">
                    <input type="number" class="form-control mx-1" placeholder="Téléphone" aria-label="numTel" id="numTel" name="numTel" />
                  </div>
                  <div class="row w-100 ms-1 mb-2">
                    <div id="numTelError"></div>
                  </div>
                  <div class="row w-100 ms-0 mb-2">
                    <input type="text" class="form-control mx-1" placeholder="Adresse" aria-label="adresse" id="adresse" name="adresse" />
                  </div>
                  <div class="row w-100 ms-1 mb-2">
                    <div id="adresseError"></div>
                  </div>
                  <div class="row w-100 ms-1 mb-2 form-group">
                    <select class="form-select form-control" aria-label="role" name="role" id="role">
                      <option selected>Sélectionnez votre role</option>
                      <option value="conducteur">conducteur</option>
                      <option value="passager">passager</option>
                      <option value="admin">admin</option>
                    </select>
                  </div>
                  <div class="row w-100 ms-1 mb-2">
                    <div id="roleError"></div>
                  </div>
                  <div class="row w-100 ms-0 mb-2">
                    <input type="file" accept="image/*" class="form-control mx-1" aria-label="profileImage" id="profileImage" name="profileImage" />
                  </div>
                  <div class="row w-100 ms-0 mb-2">
                    <input type="password" class="form-control mx-1" placeholder="Password" aria-label="password" id="password" name="password" />
                  </div>
                  <div class="row w-100 ms-0 mb-2">
                    <input type="password" class="form-control mx-1" placeholder="Confirm Password" aria-label="cpassword" id="cpassword" name="cpassword" />
                  </div>
                  <div class="row w-100 ms-1 mb-2">
                    <div id="passwordVerify"></div>
                  </div>
                </div>
                <div id="form2"></div>
                <div id="form3" class="text-center d-none">
                  <h4>👏 Thank you for completing the form! </h4>
                  📝 Your response has been successfully submitted.
                  🚀 An email has been sent to the address you provided.
                  📧 Please check your inbox and follow the instructions to verify your email. 😀
                </div>
                <div class="form-check form-check-info text-start ms-4">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked />
                  <label class="form-check-label" for="flexCheckDefault">
                    I agree the
                    <a href="javascript:" class="text-dark font-weight-bolder">Terms and Conditions</a>
                  </label>
                </div>
                <div class="text-center row-cols-3 w-100 ms-1 d-flex">
                  <button type="button" class="btn bg-gradient-dark ms-4 w-40 my-4 mb-2 col" id="prev" disabled>
                    Prev
                  </button>
                  <button type="button" class="btn bg-gradient-dark mx-4 w-40 my-4 mb-2 col" id="next">
                    Next
                  </button>
                </div>
                <p class="text-sm mt-3 mb-0">
                  Already have an account?
                  <a href="front/login.php" class="text-dark font-weight-bolder">Sign in</a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
          <a href="javascript:" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Company
          </a>
          <a href="javascript:" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            About Us
          </a>
          <a href="javascript:" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Team
          </a>
          <a href="javascript:" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Products
          </a>
          <a href="javascript:" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Blog
          </a>
          <a href="javascript:" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Pricing
          </a>
        </div>
        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
          <a href="javascript:" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-dribbble"></span>
          </a>
          <a href="javascript:" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-twitter"></span>
          </a>
          <a href="javascript:" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-instagram"></span>
          </a>
          <a href="javascript:" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-pinterest"></span>
          </a>
          <a href="javascript:" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-github"></span>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright ©
            <script>
              document.write(new Date().getFullYear());
            </script>
            Soft by Creative Tim.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf("Win") > -1;
    if (win && document.querySelector("#sidenav-scrollbar")) {
      var options = {
        damping: "0.5",
      };
      Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <script src="../../scriptjs/signupwizard.js"></script>
  <script>
    // const email = document.getElementById("email");
    // const error = document.getElementById('error');
    // email.addEventListener("keyup", () => {
    //   console.log("ok");
    //   fetch("../../../Controller/Users/formvalidation.php?email=" + email.value)
    //     .then(response => response.text())
    //     .then(data => {
    //       const error = document.getElementById("error");
    //       error.innerHTML = data;
    //     });
    // })
  </script>
</body>

</html>