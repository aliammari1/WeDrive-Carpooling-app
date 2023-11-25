<?php
require_once "../../../Controller/Users/authentification.php";
require_once "../../../Controller/Users/ControlAffichage.php";
require_once "../../../Controller/Users/pagination.php";
require_once "../../../Model/Users/user.php";
require_once "../../../Model/Users/admin.php";
require_once "../../../Model/Users/passager.php";
$user = unserialize($_SESSION['user']) ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
  <title>WeDrive</title>
  <!-- Datatable-->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" /> -->
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
  <!-- sweet alerts  -->
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body class="g-sidenav-show bg-gray-100">
  <?php require_once "dashHeader.php" ?>
  <main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
              <a class="opacity-5 text-white" href="javascript:">Pages</a>
            </li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">
              Tables
            </li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Tables</h6>
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
              <a href="javascript:" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:" class="nav-link text-white p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../../assets/img/team-2.jpg" class="avatar avatar-sm me-3" />
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
                  <a class="dropdown-item border-radius-md" href="javascript:">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark me-3" />
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
                  <a class="dropdown-item border-radius-md" href="javascript:">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary me-3 my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
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
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>table des Utilisateurs</h6>
            </div>
            <div class="card-header d-flex justify-content-between">
              <div class="col-6">
                <div class="form-group">
                  <div class="input-group mb-4">
                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                    <input class="form-control" placeholder="Search" type="text" name="search" id="searchBar">
                  </div>
                </div>
              </div>
              <button type="button" class="btn" onclick="sort()">sort</button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="table">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Author
                      </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Function
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Status
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Employed
                      </th>
                      <!-- <th class="text-secondary opacity-7"></th> -->
                    </tr>
                  </thead>
                  <tbody id="usersTable">
                    <?php if (isset($usersTable))
                      for ($row = 0; $row < count($usersTable); $row++) {
                    ?>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="data:image/jpeg;base64,<?= base64_encode($usersTable[$row]['profileImage']) ?>" class="avatar avatar-sm me-3" alt="user1" />
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <p class="mb-0 text-sm font-weight-bolder">
                                <?= $usersTable[$row]['nom'] . ' ' . $usersTable[$row]['prenom']; ?>
                              </p>
                              <p class="text-xs text-secondary mb-0">
                                <?= $usersTable[$row]['email'] ?>
                              </p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">
                            <?= $usersTable[$row]['role']; ?>
                          </p>
                          <p class="text-xs text-secondary mb-0">
                            <?= $usersTable[$row]['adresse']; ?>
                          </p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success">
                            <?= $usersTable[$row]['numTel']; ?>
                          </span>
                        </td>
                        <td class="align-middle text-center">
                          <button style="text-align:center;" class="col-4 btn text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user" onclick="deleteRow(this,<?= $usersTable[$row]['id_user']; ?>)"><i class="fas fa-trash-alt" style="color:#e24"></i></button>
                          <button style="text-align:center;" class="col-4 btn text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" data-bs-toggle="modal" data-bs-target="#updateModal<?= $usersTable[$row]['id_user'] ?>"><i class="fas fa-edit" style="color:#21e"></i></button>
                          <div class="modal fade" id="updateModal<?= $usersTable[$row]['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form role="form" enctype="multipart/form-data" id="formulaire<?= $usersTable[$row]['id_user']; ?>" method="post" action="../../../Controller/Users/ControlTable.php" onsubmit="editRow(event,<?= $usersTable[$row]['id_user']; ?>)">
                                    <div id="form1">
                                      <div class="row w-100 ms-1 mb-3">
                                        <input type="text" class="form-control col" placeholder="Prénom" aria-label="prenom" name="prenom" value="<?= $usersTable[$row]['prenom']; ?>" />
                                        <input type="text" class="form-control col ms-3" placeholder="Nom" aria-label="nom" name="nom" value="<?= $usersTable[$row]['nom']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="email" class="form-control mx-1" placeholder="Email" aria-label="email" name="email" value="<?= $usersTable[$row]['email']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="tel" class="form-control mx-1" placeholder="Téléphone" aria-label="numTel" name="numTel" value="<?= $usersTable[$row]['numTel']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="text" class="form-control mx-1" placeholder="Adresse" aria-label="adresse" name="adresse" value="<?= $usersTable[$row]['adresse']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-1 mb-3 form-group">
                                        <select class="form-select form-control" aria-label="role" name="role">
                                          <option selected>choisir un role</option>
                                          <option value="conducteur">conducteur</option>
                                          <option value="passager">passager</option>
                                          <option value="admin">admin</option>
                                        </select>
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="file" accept="image/*" class="form-control mx-1" aria-label="profileImage" name="profileImage" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="password" class="form-control mx-1" placeholder="Password" aria-label="password" name="password" value="<? $usersTable[$row]['password']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="hidden" class="form-control mx-1" name="id_user" value="<?= $usersTable[$row]['id_user']; ?>" />
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php
                      } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <div class="my-2"><?= "showing " . $sizeUser . " of " . $Rolenumbers[0] ?></div>
              <div>
                <ul style="list-style:none" id="usersPageList" class="d-flex">
                  <li class="my-2 mx-1 btn"><a href="<?= "?pageUser=" . ($pageUser == 0 ? $pageUser : ($pageUser - 1)) ?>">&lt;</a></li>
                  <?php
                  $NumberUserPages = floor($Rolenumbers[0]  / $sizeUser) + 1;
                  if ($NumberUserPages < 5) {
                    for ($i = 0; $i < $NumberUserPages; $i++) {
                  ?>
                      <li class="my-2 mx-1 btn  <?= $i == $pageUser ? ' btn-primary' : '' ?>">
                        <a href="?pageUser=<?= $i ?>">
                          <?= $i + 1 ?>
                        </a>
                      </li>
                    <?php
                    }
                  } else {
                    ?>
                    <li class="my-2 mx-1 btn  <?= (0 == $pageUser ? ' btn-primary' : '') ?>">
                      <a href="?pageUser=0">
                        1
                      </a>
                    </li>
                    <li class="my-2 mx-1 btn  <?= (1 == $pageUser ? ' btn-primary' : '') ?>">
                      <a href="?pageUser=1">
                        2
                      </a>
                    </li>
                    <li class="my-2 mx-1 btn">
                      ...
                    </li>
                    <li class="my-2 mx-1 btn  <?= ($NumberUserPages - 2 == $pageUser ? ' btn-primary' : '') ?>">
                      <a href="?pageUser=<?= $NumberUserPages - 2  ?>">
                        <?= $NumberUserPages - 1 ?>
                      </a>
                    </li>
                    <li class="my-2 mx-1 btn  <?= ($NumberUserPages - 1 == $pageUser ? ' btn-primary' : '') ?>">
                      <a href="?pageUser=<?= $NumberUserPages - 1 ?>">
                        <?= $NumberUserPages ?>
                      </a>
                    </li>
                  <?php
                  }
                  ?>
                  <li class="my-2 mx-1 btn"><a href="<?= "?pageUser=" . ($pageUser == $NumberUserPages - 1 ? $pageUser : ($pageUser + 1)) ?>">&gt;</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>table des administrateurs</h6>
            </div>
            <div class="card-header">
              <button class="btn col-2" onclick="sort()">sort</button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="table">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Author
                      </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Function
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Status
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Employed
                      </th>
                      <!-- <th class="text-secondary opacity-7"></th> -->
                    </tr>
                  </thead>
                  <tbody id="adminsTable">
                    <?php
                    if (isset($adminsTable))
                      for ($row = 0; $row < count($adminsTable); $row++) {
                    ?>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="data:image/jpeg;base64,<?= base64_encode($adminsTable[$row]['profileImage']) ?>" class="avatar avatar-sm me-3" alt="user1" />
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <p class="mb-0 text-sm font-weight-bolder">
                                <?= $adminsTable[$row]['nom'] . ' ' . $adminsTable[$row]['prenom']; ?>
                              </p>
                              <p class="text-xs text-secondary mb-0">
                                <?= $adminsTable[$row]['email'] ?>
                              </p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">
                            <?= $adminsTable[$row]['role']; ?>
                          </p>
                          <p class="text-xs text-secondary mb-0">
                            <?= $adminsTable[$row]['adresse']; ?>
                          </p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success">
                            <?= $adminsTable[$row]['numTel']; ?>
                          </span>
                        </td>
                        <td class="align-middle text-center">
                          <button style="text-align:center;" class="col-4 btn text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user" onclick="deleteRow(this,<?= $adminsTable[$row]['id_user']; ?>)"><i class="fas fa-trash-alt" style="color:#e24"></i></button>
                          <button style="text-align:center;" class="col-4 btn text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" data-bs-toggle="modal" data-bs-target="#updateModal<?= $adminsTable[$row]['id_user'] ?>"><i class="fas fa-edit" style="color:#21e"></i></button>
                          <div class="modal fade" id="updateModal<?= $adminsTable[$row]['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form role="form" enctype="multipart/form-data" id="formulaire<?= $adminsTable[$row]['id_user'] ?>" method="post" action="../../../Controller/Users/ControlTable.php" onsubmit="editRow(event,<?= $adminsTable[$row]['id_user']; ?>)">
                                    <div id="form1">
                                      <div class="row w-100 ms-1 mb-3">
                                        <input type="text" class="form-control col" placeholder="Prénom" aria-label="prenom" name="prenom" value="<?= $adminsTable[$row]['prenom']; ?>" />
                                        <input type="text" class="form-control col ms-3" placeholder="Nom" aria-label="nom" name="nom" value="<?= $adminsTable[$row]['nom']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="email" class="form-control mx-1" placeholder="Email" aria-label="email" name="email" value="<?= $adminsTable[$row]['email']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="tel" class="form-control mx-1" placeholder="Téléphone" aria-label="numTel" name="numTel" value="<?= $adminsTable[$row]['numTel']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="text" class="form-control mx-1" placeholder="Adresse" aria-label="adresse" name="adresse" value="<?= $adminsTable[$row]['adresse']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-1 mb-3 form-group">
                                        <select class="form-select form-control" aria-label="role" name="role">
                                          <option selected>choisir un role</option>
                                          <option value="conducteur">conducteur</option>
                                          <option value="passager">passager</option>
                                          <option value="admin">admin</option>
                                        </select>
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="file" accept="image/*" class="form-control mx-1" aria-label="profileImage" name="profileImage" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="password" class="form-control mx-1" placeholder="Password" aria-label="password" name="password" value="<? $adminsTable[$row]['password']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="password" class="form-control mx-1" placeholder="Confirm Password" aria-label="cpassword" name="id_user" value="<?= $adminsTable[$row]['id_user']; ?>" />
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php
                      } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <div id="adminNumber" class="my-2"></div>
              <div>
                <ul style="list-style:none" id="adminsPageList" class="d-flex"></ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>table des passagers</h6>
            </div>
            <div class="card-header">
              <button class="btn col-2" onclick="sort()">sort</button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="table">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Author
                      </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Function
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Status
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Employed
                      </th>
                      <!-- <th class="text-secondary opacity-7"></th> -->
                    </tr>
                  </thead>
                  <tbody id="passagersTable">
                    <?php
                    if (isset($passagersTable))
                      for ($row = 0; $row < count($passagersTable); $row++) {
                    ?>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="data:image/jpeg;base64,<?= base64_encode($passagersTable[$row]['profileImage']) ?>" class="avatar avatar-sm me-3" alt="user1" />
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <p class="mb-0 text-sm font-weight-bolder">
                                <?= $passagersTable[$row]['nom'] . ' ' . $passagersTable[$row]['prenom']; ?>
                              </p>
                              <p class="text-xs text-secondary mb-0">
                                <?= $passagersTable[$row]['email'] ?>
                              </p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">
                            <?= $passagersTable[$row]['role']; ?>

                          </p>
                          <p class="text-xs text-secondary mb-0">
                            <?= $passagersTable[$row]['adresse']; ?>

                          </p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success">
                            <?= $passagersTable[$row]['numTel']; ?>

                          </span>
                        </td>
                        <td class="align-middle text-center">
                          <button style="text-align:center;" class="col-4 btn text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user" onclick="deleteRow(this,<?= $passagersTable[$row]['id_user']; ?>)"><i class="fas fa-trash-alt" style="color:#e24"></i></button>
                          <button style="text-align:center;" class="col-4 btn text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" data-bs-toggle="modal" data-bs-target="#updateModal<?= $passagersTable[$row]['id_user'] ?>"><i class="fas fa-edit" style="color:#21e"></i></button>
                          <div class="modal fade" id="updateModal<?= $passagersTable[$row]['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form role="form" enctype="multipart/form-data" id="formulaire<?= $passagersTable[$row]['id_user']; ?>" method="post" action="../../../Controller/Users/ControlTable.php" onsubmit="editRow(event,<?= $passagersTable[$row]['id_user']; ?>)">
                                    <div id="form1">
                                      <div class="row w-100 ms-1 mb-3">
                                        <input type="text" class="form-control col" placeholder="Prénom" aria-label="prenom" name="prenom" value="<?= $passagersTable[$row]['prenom']; ?>" />
                                        <input type="text" class="form-control col ms-3" placeholder="Nom" aria-label="nom" name="nom" value="<?= $passagersTable[$row]['nom']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="email" class="form-control mx-1" placeholder="Email" aria-label="email" name="email" value="<?= $passagersTable[$row]['email']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="tel" class="form-control mx-1" placeholder="Téléphone" aria-label="numTel" name="numTel" value="<?= $passagersTable[$row]['numTel']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="text" class="form-control mx-1" placeholder="Adresse" aria-label="adresse" name="adresse" value="<?= $passagersTable[$row]['adresse']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-1 mb-3 form-group">
                                        <select class="form-select form-control" aria-label="role" name="role">
                                          <option selected>choisir un role</option>
                                          <option value="conducteur">conducteur</option>
                                          <option value="passager">passager</option>
                                          <option value="admin">admin</option>
                                        </select>
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="file" accept="image/*" class="form-control mx-1" aria-label="profileImage" name="profileImage" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="password" class="form-control mx-1" placeholder="Password" aria-label="password" name="password" value="<? $passagersTable[$row]['password']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="password" class="form-control mx-1" placeholder="Confirm Password" aria-label="cpassword" name="id_user" value="<?= $passagersTable[$row]['id_user']; ?>" />
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php
                      } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <div id="passagerNumber" class="my-2"></div>
              <div>
                <ul style="list-style:none" id="passagersPageList" class="d-flex"></ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>table des conducteurs</h6>
            </div>
            <div class="card-header">
              <button class="btn col-2" onclick="sort()">sort</button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="table">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Author
                      </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Function
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Status
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Employed
                      </th>
                      <!-- <th class="text-secondary opacity-7"></th> -->
                    </tr>
                  </thead>
                  <tbody id="conducteursTable">
                    <?php
                    if (isset($conducteursTable))
                      for ($row = 0; $row < count($conducteursTable); $row++) {
                    ?>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="data:image/jpeg;base64,<?= base64_encode($conducteursTable[$row]['profileImage']) ?>" class="avatar avatar-sm me-3" alt="user1" />
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <p class="mb-0 text-sm font-weight-bolder">
                                <?= $conducteursTable[$row]['nom'] . ' ' . $conducteursTable[$row]['prenom']; ?>
                              </p>
                              <p class="text-xs text-secondary mb-0">
                                <?= $conducteursTable[$row]['email'] ?>
                              </p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">
                            <?= $conducteursTable[$row]['role']; ?>
                          </p>
                          <p class="text-xs text-secondary mb-0">
                            <?= $conducteursTable[$row]['adresse']; ?>
                          </p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success">
                            <?= $conducteursTable[$row]['numTel']; ?>
                          </span>
                        </td>
                        <td class="align-middle text-center">
                          <button style="text-align:center;" class="col-4 btn text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user" onclick="deleteRow(this,<?= $conducteursTable[$row]['id_user']; ?>)"><i class="fas fa-trash-alt" style="color:#e24"></i></button>
                          <button style="text-align:center;" class="col-4 btn text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" data-bs-toggle="modal" data-bs-target="#updateModal<?= $conducteursTable[$row]['id_user'] ?>"><i class="fas fa-edit" style="color:#21e"></i></button>
                          <div class="modal fade" id="updateModal<?= $conducteursTable[$row]['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form role="form" enctype="multipart/form-data" id="formulaire<?= $conducteursTable[$row]['id_user']; ?>" method="post" action="../../../Controller/Users/ControlTable.php" onsubmit="editRow(event,<?= $conducteursTable[$row]['id_user'] ?>)">
                                    <div id="form1">
                                      <div class="row w-100 ms-1 mb-3">
                                        <input type="text" class="form-control col" placeholder="Prénom" aria-label="prenom" name="prenom" value="<?= $conducteursTable[$row]['prenom']; ?>" />
                                        <input type="text" class="form-control col ms-3" placeholder="Nom" aria-label="nom" name="nom" value="<?= $conducteursTable[$row]['nom']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="email" class="form-control mx-1" placeholder="Email" aria-label="email" name="email" value="<?= $conducteursTable[$row]['email']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="tel" class="form-control mx-1" placeholder="Téléphone" aria-label="numTel" name="numTel" value="<?= $conducteursTable[$row]['numTel']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="text" class="form-control mx-1" placeholder="Adresse" aria-label="adresse" name="adresse" value="<?= $conducteursTable[$row]['adresse']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-1 mb-3 form-group">
                                        <select class="form-select form-control" aria-label="role" name="role">
                                          <option selected>choisir un role</option>
                                          <option value="conducteur">conducteur</option>
                                          <option value="passager">passager</option>
                                          <option value="admin">admin</option>
                                        </select>
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="file" accept="image/*" class="form-control mx-1" aria-label="profileImage" name="profileImage" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="password" class="form-control mx-1" placeholder="Password" aria-label="password" name="password" value="<? $conducteursTable[$row]['password']; ?>" />
                                      </div>
                                      <div class="row w-100 ms-0 mb-3">
                                        <input type="password" class="form-control mx-1" placeholder="Confirm Password" aria-label="cpassword" name="id_user" value="<?= $conducteursTable[$row]['id_user']; ?>" />
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php
                      } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <div id="conducteurNumber" class="my-2"></div>
              <div>
                <ul style="list-style:none" id="conducteursPageList" class="d-flex"></ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class=" row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Projects table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Project
                      </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Budget
                      </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Status
                      </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                        Completion
                      </th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2">
                          <div>
                            <img src="../../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify" />
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">Spotify</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">$2,500</p>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">working</span>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-xs font-weight-bold">60%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <button class="btn btn-link text-secondary mb-0">
                          <i class="fa fa-ellipsis-v text-xs"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2">
                          <div>
                            <img src="../../assets/img/small-logos/logo-invision.svg" class="avatar avatar-sm rounded-circle me-2" alt="invision" />
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">Invision</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">$5,000</p>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">done</span>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-xs font-weight-bold">100%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-ellipsis-v text-xs"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2">
                          <div>
                            <img src="../../assets/img/small-logos/logo-jira.svg" class="avatar avatar-sm rounded-circle me-2" alt="jira" />
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">Jira</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">$3,400</p>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">canceled</span>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-xs font-weight-bold">30%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="30" style="width: 30%"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-ellipsis-v text-xs"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2">
                          <div>
                            <img src="../../assets/img/small-logos/logo-slack.svg" class="avatar avatar-sm rounded-circle me-2" alt="slack" />
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">Slack</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">$1,000</p>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">canceled</span>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-xs font-weight-bold">0%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0" style="width: 0%"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-ellipsis-v text-xs"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2">
                          <div>
                            <img src="../../assets/img/small-logos/logo-webdev.svg" class="avatar avatar-sm rounded-circle me-2" alt="webdev" />
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">Webdev</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">$14,000</p>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">working</span>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-xs font-weight-bold">80%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="80" style="width: 80%"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-ellipsis-v text-xs"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2">
                          <div>
                            <img src="../../assets/img/small-logos/logo-xd.svg" class="avatar avatar-sm rounded-circle me-2" alt="xd" />
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">Adobe XD</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">$2,300</p>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">done</span>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-xs font-weight-bold">100%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-ellipsis-v text-xs"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php require_once "dashFooter.php" ?>
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

  <!-- <script>
    const xmlrequest = new XMLHttpRequest();
    xmlrequest.open('GET', '../../../Controller/Users/darkModeCookie.php?dark=on', true);
    xmlrequest.onload = () => {
      console.log(xmlrequest.responseText)
      if (xmlrequest.responseText === "dark") {
        const darkModeToggler = document.getElementById("dark-version");
        darkModeToggler.click();
      }
    }
    xmlrequest.send();
  </script> -->
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

  <!-- sweet alerts  -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

  <script src="../../scriptjs/modifyInput.js"></script>
  <script>
    function pagination(page = 0, size = 5, user = '') {
      let pageNumber = 0;
      adminNumber.innerText = `showing ${size} of ${data[1]}`;
      pageNumber = (Math.floor(data[1] / size)) + 1;
      console.log(`Total Number: ${data[1]} pageNumber: ${pageNumber}`)
      adminsPageList.innerHTML = `<li class="my-2 mx-1 btn">&lt;</li>`
      for (let i = 0; i < pageNumber; i++) {
        adminsPageList.innerHTML += `<li class="my-2 mx-1 btn ${i === page ? 'btn-primary' : ''}"><a href="?pageAdmin=${i}">${i+1}</a></li>`
      }
      adminsPageList.innerHTML += `<li class="my-2 mx-1 btn">&gt;</li>`
      passagerNumber.innerText = `showing ${size} of ${data[2]}`;
      pageNumber = (Math.floor(data[2] / size)) + 1;
      console.log(`Total Number: ${data[2]} pageNumber: ${pageNumber}`)
      passagersPageList.innerHTML = `<li class="my-2 mx-1 btn">&lt;</li>`
      for (let i = 0; i < pageNumber; i++) {
        passagersPageList.innerHTML += `<li class="my-2 mx-1 btn ${i === page ? 'btn-primary' : ''}" onclick="fetchPassagers(${i})">${i+1}</li>`
      }
      passagersPageList.innerHTML += `<li class="my-2 mx-1 btn">&gt;</li>`
      conducteurNumber.innerText = `showing ${size} of ${data[3]}`;
      pageNumber = (Math.floor(data[3] / size)) + 1;
      console.log(`Total Number: ${data[3]} pageNumber: ${pageNumber}`)
      conducteursPageList.innerHTML = `<li class="my-2 mx-1 btn">&lt;</li>`
      for (let i = 0; i < pageNumber; i++) {
        conducteursPageList.innerHTML += `<li class="my-2 mx-1 btn ${i === page ? 'btn-primary' : ''}" onclick="fetchPassagers(${i})">${i+1}</li>`
      }
      conducteursPageList.innerHTML += `<li class="my-2 mx-1 btn">&gt;</li>`
    }
    pagination(urlParameters);
  </script>
  <script>
    function editRow(event, formNumber) {
      const form = document.getElementById("formulaire" + formNumber);
      event.preventDefault();
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Update it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          swalWithBootstrapButtons.fire(
            'Updated!',
            'Your Account has been updated.',
            'success'
          )
          form.submit();
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your account is safe :)',
            'error'
          )
        }
      })
    }


    function deleteRow(button, id) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          const row = button.parentNode.parentNode
          row.parentNode.removeChild(row)
          fetch('../../../Controller/Users/ControlDelete.php?id_user=' + id)
            .then(response => response.text())
            .then(data => {
              console.log(data);
            })
          swalWithBootstrapButtons.fire(
            'Deleted!',
            'the selected user has been deleted.',
            'success'
          )
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          )
        }
      })
    }

    function sort() {
      var table, rows, switching, i, x, y, shouldSwitch;
      table = document.getElementById("table");
      switching = true;
      while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
          shouldSwitch = false;
          x = rows[i].getElementsByTagName("TD")[0];
          y = rows[i + 1].getElementsByTagName("TD")[0];
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
        }
        if (shouldSwitch) {
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
        }
      }
    }
  </script>
  <script>
    const searchBar = document.getElementById("searchBar");
    searchBar.addEventListener("keyup", (e) => {
      const searchString = e.target.value.toLowerCase();
      const rows = document.querySelectorAll("tbody tr");
      rows.forEach((row) => {
        const name = row.querySelector("td:nth-child(1)").textContent;
        if (name.toLowerCase().includes(searchString)) {
          row.style.display = "table-row";
        } else {
          row.style.display = "none";
        }
      });
    });
  </script>
</body>

</html>