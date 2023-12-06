<?php
require_once "../../../Controller/Users/authentification.php";
require_once "../../../Controller/Reclamations/reclamationUserC.php";
require_once "../../../Controller/Reclamations/paginationUserC.php";
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
  <link href="https://cdn.jsdelivr.net/npm/argon-design-system/dist/css/argon.min.css" rel="stylesheet">
  <style>
    input.search {
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
    <!-- <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/back/statistiquesRec.php " target="_blank">
        <img src="../../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Argon Dashboard 2</span>
      </a>
    </div> -->
    <div class="navdash">
      <div class="navdash">
        <div class="profile-container">
          <img <?php echo 'src="../../../View/assets/images/person_1.jpg"' ?> alt="profile_image" class="w-60 rounded-circle shadow-sm navbar-brand-img" id="profile-image" />
          <span id="profile-hover" onclick="changeImage()">+</span>
        </div>
      </div>
      <p><?php echo 'hind' ?></p>
    </div>
    <hr class="horizontal dark mt-0" />
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav dashnav">
        <li class="nav-item">
          <a class="nav-link" href="statistiquesRec.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tables.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Tables</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="billing.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Billing</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="consulterRecGest.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">ConsulterReclamation</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="Createreclamation.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Reclamation</span>
          </a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="rtl.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">RTL</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
            Account pages
          </h6>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sign-in.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sign-up.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sign-up.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign Out</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
              <a class="opacity-5 text-white" href="javascript:;">Pages</a>
            </li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">
              Billing
            </li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Billing</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here..." />
            </div>
          </div>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../../../assets/img/team-2.jpg" class="avatar avatar-sm me-3" />
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span>
                          from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../../../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark me-3" />
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by
                          Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary me-3 my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>WeDrive</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12 mt-4">
          <button style="border-radius:20px;" class="btn bg-white w-100" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <h1 class="text-center my-2">Liste reclamations</h1>
          </button>
          <div class="collapse" id="collapseExample">
            <div class="card">

              <style>
                .searchBar {
                  width: 36px;
                  transition: width 1s;
                }

                .searchBar:focus {
                  width: 280px;
                }
              </style>
              <div class="container d-flex flex-row justify-content-between w-100 mt-5">
                <div class="form-group">
                  <input style="text-indent:20px" type="text" class="form-control form-control-alternative search searchBar " onkeyup="searchList()" placeholder="Search...">
                  <i style="position:relative;bottom:25px;left:10px;" class="fa fa-search"></i>
                </div>
                <div class="form-group">
                  <select id="sort-select" onchange="sortList()" class="form-control form-control-alternative">
                    <option value="">Sort List</option>
                    <option value="asc">Sort in Ascending Order</option>
                    <option value="desc">Sort in Descending Order</option>
                  </select>
                </div>
              </div>

              <style>
                .card-body {
                  max-height: 400px;
                  overflow-y: scroll;
                  scrollbar-width: thin;
                  scrollbar-color: #6C757D #E9ECEF;
                }

                .card-body::-webkit-scrollbar {
                  width: 6px;
                }

                .card-body::-webkit-scrollbar-track {
                  background-color: #E9ECEF;
                }

                .card-body::-webkit-scrollbar-thumb {
                  background-color: #6C757D;
                  border-radius: 10px;
                }

                .list-group-item {
                  border: none;
                  background-color: #F8F9FA;
                  margin-bottom: 10px;
                  border-radius: 10px;
                  padding: 20px;
                }

                .list-group-item:hover {
                  background-color: #E9ECEF;
                }

                .text-danger:hover {
                  color: #DC3545;
                }

                .text-dark:hover {
                  color: #212529;
                }
              </style>
              <div class="d-flex flex-column align-items-center listReclamation">
                <ul style="list-style:none;height:36px;border-radius:18px;padding:0px;" class="d-flex flex-row align-items-center row-cols-5 shadow-blur w-90 bg-white">
                  <li class=" text-xs fw-bold  text-center">Nom</li>
                  <li class=" text-xs fw-bold text-center">Description</li>
                  <li class=" text-xs fw-bold text-center">Date</li>
                  <li class=" text-xs fw-bold text-center">Pièces jointes</li>
                  <li class=" text-xs fw-bold text-center">Pièces jointes</li>
                </ul>
                <?php for ($reclamation = 0; $reclamation < count($listreclamations); $reclamation++) : ?>
                  <ul style="list-style:none;height:36px;border-radius:18px;padding:0px;" class="d-flex flex-row align-items-center row-cols-5 shadow-blur w-90 bg-white">
                    <li class=" text-xs fw-bold  text-center"><?= $listreclamations[$reclamation]['nom'] ?></li>
                    <li class=" text-xs fw-bold  text-center"><?= $listreclamations[$reclamation]['description'] ?></li>
                    <li class=" text-xs fw-bold  text-center"><?= $listreclamations[$reclamation]['date'] ?></li>
                    <li class=" text-xs fw-bold  text-center">
                      <?php if (!empty($listreclamations[$reclamation]["pieces_jointes"])) : ?>
                        <a href="#" class="text-dark">
                          <img src="data:image/jpeg;base64,<?= base64_encode($listreclamations[$reclamation]["pieces_jointes"]) ?>" class="w-10" />
                        </a>
                      <?php endif; ?>
                    </li>
                    <li class=" text-xs fw-bold  text-center d-flex">
                      <button style="border:none;color:red;" type="button" class="bg-white px-3 mb-0" onclick="deleteReclamation(this,<?= $listreclamations[$reclamation]['id_rec'] ?>)">
                        <i class="far fa-trash-alt me-2"></i>
                      </button>
                      <button style="border:none;color:blue;" type="button" class="bg-white px-3 mb-0" data-toggle="modal" data-target="#exampleModal<?= $listreclamations[$reclamation]['id_rec'] ?>">
                        <i class="fas fa-pencil-alt me-2" aria-hidden="true"></i>
                      </button>
                    </li>

                    <div style="max-width:100%" class="modal fade" id="exampleModal<?= $listreclamations[$reclamation]['id_rec'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="card-body">
                              <form method="post" action="../../../Controller/Reclamations/reclamationUserC.php" enctype="multipart/form-data">
                                <div class="form-group">
                                  <label for="nom">Nom:</label>
                                  <input type="text" class="form-control" name="nom" placeholder="Entrez le nom de la réclamation" id="nom" minlength="5" maxlength="50" value="<?= $listreclamations[$reclamation]['nom'] ?>" required>
                                  <small class="text-muted">Le nom doit comporter entre 5 et 50 caractères.</small>
                                </div>
                                <div class="form-group">
                                  <label for="description">Description:</label>
                                  <textarea class="form-control" name="description" placeholder="Entrez la description de la réclamation" id="description" required minlength="10" maxlength="500"><?= $listreclamations[$reclamation]['description'] ?></textarea>
                                  <small class="text-muted">La description doit comporter entre 10 et 500 caractères.</small>
                                </div>
                                <div class="form-group">
                                  <label for="date">Date:</label>
                                  <input type="date" class="form-control" name="date" id="date" value="<?= $listreclamations[$reclamation]['date'] ?>" required>
                                  <small class="text-muted">Sélectionnez une date.</small>
                                </div>
                                <div class="form-group">
                                  <label for="pieces_jointes">Pièces jointes:</label>
                                  <input type="file" class="form-control-file" name="pieces_jointes" id="pieces_jointes" multiple>
                                  <small class="text-muted">Sélectionnez une ou plusieurs pièces jointes.</small>
                                </div>
                                <input type="hidden" name="id_rec" id="id_rec" value="<?= $listreclamations[$reclamation]['id_rec'] ?>">
                                <input type="submit" value="Update" class="btn btn-primary">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </ul>
                <?php endfor; ?>
              </div>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item">
                    <a class="page-link <?= $pageRec <= 0 ? 'disabled' : '' ?>" href="?pageRec=<?= $pageRec - 1  ?>" tabindex="-1">
                      <i class="fa fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <?php for ($i = 0; $i < $nbrPages; $i++) : ?>
                    <li class="page-item <?= $i == $pageRec ? 'active' : '' ?>"><a class="page-link" href="?pageRec=<?= $i ?>"><?= $i + 1 ?></a></li>
                  <?php endfor; ?>
                  <li class="page-item">
                    <a class="page-link <?= $pageRec >= $nbrPages - 1 ? 'disabled' : '' ?>" href="?pageRec=<?= $pageRec +  1 ?>">
                      <i class="fa fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="footer pt-3">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              ©
              <script>
                document.write(new Date().getFullYear());
              </script>
              , made with <i class="fa fa-heart"></i> by
              <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
              for a better web.
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      </div>
    </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Argon Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1" />
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">
            White
          </button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">
            Dark
          </button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">
          You can change the sidenav type just on desktop view.
        </p>
        <!-- Navbar Fixed -->
        <div class="d-flex my-3">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)" />
          </div>
        </div>
        <hr class="horizontal dark my-sm-4" />
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)" />
          </div>
        </div>
      </div>
    </div>
  </div>

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
  <script src="../../../scriptjs/modifyInput.js"></script>
  <script>
    const listReclamation = document.querySelector('.listReclamation');

    function deleteReclamation(button, id) {
      console.log(id);
      alert('Deleting ' + id);
      const row = button.parentNode.parentNode;
      row.parentNode.removeChild(row);
      fetch('../../../Controller/Reclamations/reclamationUserC.php?id_rec=' + id)
        .then(response => response.text())
        .then(data => console.log(data))
    }

    function sortList() {
      fetch(`../../../Controller/Reclamations/sortUserC.php?sort=${document.querySelector('#sort-select').value}`)
        .then(response => response.text())
        .then(data => {
          listReclamation.innerHTML = data;
        })
    }

    function searchList() {
      const search = document.querySelector('.search').value;
      fetch('../../../Controller/Reclamations/searchUserreclamation.php?search=' + search)
        .then(response => response.text())
        .then(data => {
          listReclamation.innerHTML = data;
        })
    }
  </script>

</body>


</html>