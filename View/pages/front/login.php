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
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <!-- <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="dashboard.php">
              Argon Dashboard 2
            </a> -->
            <!-- <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button> -->
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <!-- <li class="nav-item">
                    <a
                      class="nav-link d-flex align-items-center me-2 active"
                      aria-current="page"
                      href="dashboard.php">
                      <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                      Dashboard
                    </a>
                  </li> -->
                <li class="nav-item">
                  <a class="nav-link me-2" href="../../index.php">
                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                    Accueil
                  </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link me-2" href="register.php">
                      <i
                        class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                      Sign in
                    </a>
                  </li> -->
                <li class="nav-item">
                  <a class="nav-link me-2" href="register.php">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Sign Up
                  </a>
                </li>
              </ul>
              <!-- <ul class="navbar-nav d-lg-block d-none">
                  <li class="nav-item">
                    <a
                      href="https://www.creative-tim.com/product/argon-dashboard"
                      class="btn btn-sm mb-0 me-1 btn-primary"
                      >Free Download</a
                    >
                  </li>
                </ul> -->
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Sign In</h4>
                  <p class="mb-0">Enter your email and password to sign in</p>
                </div>
                <div class="card-body">
                  <p id="signinverify"></p>
                  <form method="post" role="form" id="login-form" action="../../../Controller/Users/ControlSignin.php">
                    <div class="mb-3 emailContainer">
                      <div style="color:red;top:6px;" class="position-relative" id="error"></div>
                      <input type="email" class="form-control form-control-lg emailInput" placeholder="Email" aria-label="Email" name="email" id="email" />
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" name="password" id="password" />
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" />
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <div class="text-center" id="btsignin">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" id="signin">
                        Sign in
                      </button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="register.php" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="
                    background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
                    background-size: cover;
                  ">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">
                  "Attention is the new currency"
                </h4>
                <p class="text-white position-relative">
                  The more effortless the writing looks, the more effort the
                  writer actually put into the process.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
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
  <script>
    const emailContainer = document.querySelector('emailContainer')
    const emailInput = document.querySelector('emailInput')

    function verify() {
      fetch("../../../Controller/Users/formvalidation.php?email=" + emailInput.value)
        .then(response => response.text())
        .then(data => {
          if (data == "success") {
            emailContainer.classList.add("has-success");
            emailContainer.classList.remove("has-danger");
            emailInput.classList.add("is-valid")
            emailInput.classList.remove("is-invalid")
          } else {
            emailContainer.classList.add("has-danger");
            emailContainer.classList.remove("has-success");
            emailInput.classList.add("is-invalid")
            emailInput.classList.remove("is-valid")
          }
        })
    }
  </script>
</body>

</html>