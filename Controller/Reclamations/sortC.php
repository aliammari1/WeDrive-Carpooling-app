<?php

require_once realpath(dirname(__FILE__)) . "\..\..\Model\\connection.php";
require_once realpath(dirname(__FILE__)) . "\..\..\Model\Reclamations\\reclamations.php";
require_once realpath(dirname(__FILE__)) . "\..\..\Model\Reclamations\\reclamation.php";
$db = new connection();
$reclamations = new reclamations($db->getDb());
$listreclamations = $reclamations->sortreclamations($_GET['sort']);
?>
<div class="d-flex flex-column align-items-center">
    <ul style="list-style:none;height:36px;border-radius:18px;padding:0px;" class="d-flex flex-row align-items-center row-cols-5 shadow-blur w-90 bg-white">
        <li class=" text-xs fw-bold  text-center">Nom</li>
        <li class=" text-xs fw-bold text-center">Description</li>
        <li class=" text-xs fw-bold text-center">Date</li>
        <li class=" text-xs fw-bold text-center">Pièces jointes</li>
        <li class=" text-xs fw-bold text-center">Pièces jointes</li>
    </ul>
    <?php for ($reclamation = 0; $reclamation < count($listreclamations); $reclamation++) : ?>
        <ul style="list-style:none;height:36px;border-radius:18px;padding:0px;" class="d-flex flex-row align-items-center row-cols-5 shadow-blur w-90 bg-white listReclamation">
            <li class=" text-xs fw-bold  text-center"><?= $listreclamations[$reclamation]['nom'] ?></li>
            <li class=" text-xs fw-bold  text-center"><?= $listreclamations[$reclamation]['description'] ?></li>
            <li class=" text-xs fw-bold  text-center"><?= $listreclamations[$reclamation]['date'] ?></li>
            <li class=" text-xs fw-bold  text-center">
                <?php if (!empty($listreclamations[$reclamation]["pieces_jointes"])) : ?>
                    <a href="#" class="text-dark" onclick="downloadImage(<?= $listreclamations[$reclamation]['id_rec'] ?>)">
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
            <div class="modal fade" id="exampleModal<?= $listreclamations[$reclamation]['id_rec'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <form method="post" action="../../../Controller/reclamationC.php" enctype="multipart/form-data">
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