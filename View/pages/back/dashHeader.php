<div class="min-height-300 bg-primary position-absolute w-100"></div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
    <div class="navdash">
        <div class="navdash">
            <div class="profile-container">
                <img src="data:image/jpeg;base64,<?= base64_encode($user->getProfileImage()); ?>" alt="profileImage" class="w-60 rounded-circle shadow-sm navbar-brand-img" id="profile-image" />
                <span id="profile-hover" onclick="changeImage()">+</span>
            </div>
        </div>
        <p>
            <?php
            echo $user->getPrenom() . getenv("ali_password");
            ?>
        </p>
    </div>
    <hr class="horizontal dark mt-0" />
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav dashnav">
            <?php
            $hrefList = ["dashboard", "tables", "trajets/Affichertrajects", "view/page", "reservation",  "consulterRecGest", "billing", "virtual-reality"];
            $stringList = ["Statistiques", "Tables", "gestion des trajets", "gestion des Avis", "reservation",  "Reclamations", "Billing", "Virtual Reality"];
            $iconList = ["ni ni-tv-2 text-primary", "ni ni-calendar-grid-58 text-warning", "ni ni-calendar-grid-58 text-warning", "ni ni-calendar-grid-58 text-warning", "ni ni-calendar-grid-58 text-warning",  "ni ni-calendar-grid-58 text-warning", "ni ni-credit-card text-success", "ni ni-app text-info"];
            for ($i = 0; $i < count($stringList); $i++) {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $hrefList[$i] ?>.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="<?= $iconList[$i] ?> text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1"><?= $stringList[$i] ?></span>
                    </a>
                </li>
            <?php
            } ?>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                    Account pages
                </h6>
            </li>
            <?php
            $hrefList = ["profile", "sign-in", "sign-up", "../../../../Controller/Users/ControlSignout"];
            $stringList = ["Profile", "Sign In", "Sign up", "Sign Out"];
            $iconList = ["ni ni-single-02 text-dark", "ni ni-single-copy-04 text-warning", "ni ni-collection text-info", "ni ni-collection text-info"];
            for ($i = 0; $i < count($stringList); $i++) {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $hrefList[$i] ?>.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="<?= $iconList[$i] ?> text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1"><?= $stringList[$i] ?></span>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</aside>