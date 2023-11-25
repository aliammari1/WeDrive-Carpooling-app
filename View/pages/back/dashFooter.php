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
                    <?php
                    $hrefList = ["https://www.creative-tim.com", "https://www.creative-tim.com/presentation", "https://www.creative-tim.com/blog", "https://www.creative-tim.com/license"];
                    $stringList = ["Creative Tim", "About Us", "Blog", "License"];
                    for ($i = 0; $i < count($stringList); $i++) { ?>
                        <li class="nav-item">
                            <a href="<?= $hrefList[$i] ?>" class="nav-link text-muted" target="_blank"><?= $stringList[$i] ?></a>
                        </li>
                    <?php
                    } ?>
                </ul>
            </div>
        </div>
    </div>
</footer>