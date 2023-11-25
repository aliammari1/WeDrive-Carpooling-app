<!DOCTYPE html>
<html lang="en">

</html>

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

    <link rel="stylesheet" type="text/css" href="../../assets/css/open-iconic-bootstrap.min.css" />


    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css" />
    <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />

</head>

<body class="g-sidenav-show bg-gray-100">
    <main class="main-content position-relative border-radius-lg">

        <?php
        require_once "frontHeader.php"
        ?>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">informations de réclamation</h6>
                        </div>
                        <div class="container">
                            <h1 class="text-center my-5">formulaire de réclamation</h1>
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">Ajouter une réclamation</div>
                                        <div class="card-body">
                                            <div class="form-group"></div>
                                            <form method="POST" action="../../../Controller/addreclamation.php" enctype="multipart/form-data" class="needs-validation">
                                                <div class="form-group">
                                                    <label for="nom" class="form-label">
                                                        Nom<span class="required">*</span>
                                                    </label>
                                                    <div class="input-group d-flex flex-column">
                                                        <select class="form-control selectNom w-100" name="nom" id="nom" required></select>
                                                        <div id="nomError"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="description" class="form-label">
                                                        Description<span class="required">*</span>
                                                    </label>
                                                    <div class="input-group d-flex flex-column">
                                                        <textarea class="form-control w-100" name="description" id="description"></textarea>
                                                        <div id="descriptionError"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="date" class="form-label">
                                                        Date<span class="required">*</span>
                                                    </label>
                                                    <div class="input-group d-flex flex-column">
                                                        <input type="date" class="form-control w-100" name="date" id="date">
                                                        <div id="dateError"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="pieces_jointes" class="form-label">
                                                        Pièces jointes
                                                    </label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="pieces_jointes" id="pieces_jointes" multiple>
                                                    </div>
                                                    <small class="form-text text-muted">Joindre une ou plusieurs pièces jointes si nécessaire.</small>
                                                </div>


                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="sendMail" id="flexSwitchCheckDefault">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Send Mail</label>
                                                </div>

                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-icon btn-3 btn-primary">
                                                <span class="btn-inner--icon me-2"><i class="ni ni-send"></i></span>
                                                <span class="btn-inner--text">Ajouter la réclamation</span>
                                            </button>


                                            </form>






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
                                        </footer>
    </main>

    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"></i>
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
    <script src="../../scriptjs/modifyInput.js"></script>
    <script>
        const form = document.querySelector('.needs-validation');
        const nom = document.getElementById("nom");
        const nomError = document.getElementById("nomError");
        const date = document.getElementById("date");
        const dateError = document.getElementById("dateError");
        const description = document.getElementById("description");
        const descriptionError = document.getElementById("descriptionError");
        const pieces_jointes = document.getElementById("pieces_jointes");
        let testNom = false;
        let testDescription = false;
        let testDate = false;
        nom.addEventListener("change", () => {
            if (nom.value === "") {
                nom.style.borderColor = "red"
                nomError.style.color = "red";
                nomError.innerText = "Nom non valide";
                testNom = false;
            } else {
                nom.style.borderColor = "green";
                nomError.style.color = "green";
                nomError.innerText = "Nom valide";
                testNom = true;
            }
        })

        description.addEventListener("keyup", () => {
            if (description.value.trim().length >= 10 && description.value.trim().length <= 500 && description.value.length !== "") {
                description.style.borderColor = "green"
                descriptionError.innerText = " Description valide";
                descriptionError.style.borderColor = "green"
                testDescription = true;
            } else {
                if (description.value === "")
                    descriptionError.innerText = "description vide"
                else if (description.value.length < 10)
                    descriptionError.innerText = "description trop courte"
                else if (description.value.length > 500)
                    descriptionError.innerText = "description trop longue"
                description.style.borderColor = "red";
                descriptionError.style.borderColor = "red"
                testDescription = false;
            }
        })

        date.addEventListener("change", () => {
            if (date.value === "") {
                date.style.borderColor = "red"
                dateError.style.color = "red";
                dateError.innerText = "date non valide";
                testDate = false;
            } else {
                date.style.borderColor = "green";
                dateError.style.color = "green";
                dateError.innerText = "date valide";
                testDate = true;
            }
        })

        form.addEventListener("submit", (event) => {
            event.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Erreur!',
                text: 'Une erreur est survenue lors de l\'ajout de votre réclamation.',
                confirmButtonText: 'OK'
            });
            if (testNom && testDescription && testDate) {
                Swal.fire({
                    icon: 'success',
                    title: 'Réclamation ajoutée!',
                    text: 'Votre réclamation a été ajoutée avec succès.',
                    confirmButtonText: 'OK'
                }).then(function() {
                    form.submit();
                    //location.href = "consulterRecGest.php";
                });
            }
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        const selectNom = document.querySelector('.selectNom')
        const request = new XMLHttpRequest();
        request.open('GET', '../../../Controller/getType.php');
        request.onload = () => {
            selectNom.innerHTML = request.responseText;
        }
        request.send();
        setInterval(() => {
            request.open('GET', '../../../Controller/getType.php');
            request.onload = () => {
                selectNom.innerHTML = request.responseText;
            }
            request.send();
        }, 3600000);
    </script>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/jquery.magnific-popup.min.js"></script>
    <script src="../../assets/js/aos.js"></script>
    <script src="../../assets/js/jquery.animateNumber.min.js"></script>
    <script src="../../assets/js/bootstrap-datepicker.js"></script>
    <script src="../../assets/js/jquery.timepicker.min.js"></script>
    <script src="../../assets/js/scrollax.min.js"></script>
</body>

</html>