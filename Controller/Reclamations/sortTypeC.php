<?php

require_once __DIR__ . "\..\..\Model\\connection.php";
require_once __DIR__ . "\..\..\Model\\Reclamations\\typesreclamation.php";
require_once __DIR__ . "\..\..\Model\\Reclamations\\typereclamation.php";
$db = new connection();
$typesreclamations = new typeReclamations();
$listtypereclamations = $typesreclamations->sorttypereclamations($_GET['sort']);
?>
<?php for ($typereclamation = 0; $typereclamation < count($listtypereclamations); $typereclamation++) : ?>
    <li class="list-group-item" id="typereclamation-<?= $listtypereclamations[$typereclamation]['id_type'] ?>">
        <div class="d-flex flex-column">
            <h6 class="mb-3 text-sm">Utilisateur</h6>
            <span class="mb-2 text-xs fw-bold">Nom:</span>
            <span class="text-dark"><?= $listtypereclamations[$typereclamation]["nom"] ?></span>
            <span class="mb-2 text-xs fw-bold">categorie:</span>
            <span class="text-dark"><?= $listtypereclamations[$typereclamation]["categorie"] ?></span>
            <span class="text-xs fw-bold">modele_de_reponse:</span>
            <span class="text-dark"><?= $listtypereclamations[$typereclamation]["modele_de_reponse"] ?></span>
        </div>
        <div class="ms-auto text-end">
            <button type="button" class="btn btn-danger px-3 mb-0" onclick="deletetypereclamation(this,<?= $listtypereclamations[$typereclamation]['id_type'] ?>)">
                <i class="far fa-trash-alt me-2"></i>Delete
            </button>
            <button type="button" class="btn btn-primary px-3 mb-0" data-toggle="modal" data-target="#exampleModal<?= $listtypereclamations[$typereclamation]['id_type'] ?>">
                <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit
            </button>
        </div>
    </li>
    <div class="modal fade" id="exampleModal<?= $listtypereclamations[$typereclamation]['id_type'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form method="post" action="../../../Controller/typereclamationC.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nom">Nom:</label>
                                <input type="text" class="form-control" name="nom" placeholder="Entrez le nom de la reclamation" id="nom" minlength="5" maxlength="50" value="<?= $listtypereclamations[$typereclamation]['nom'] ?>" required>
                                <small class="text-muted">Le nom doit comporter entre 5 et 50 caractères.</small>
                            </div>
                            <div class="form-group">
                                <label for="description">Categorie:</label>
                                <input type="text" class="form-control" name="categorie" placeholder="Entrez la categorie de la reclamation" id="categorie" minlength="5" maxlength="50" value="<?= $listtypereclamations[$typereclamation]['categorie'] ?>" required>
                                <small class="text-muted">La categorie doit comporter entre 10 et 500 caractères.</small>
                            </div>
                            <div class="form-group">
                                <label for="description">modele_de_reponse:</label>
                                <input type="text" class="form-control" name="modele_de_reponse" placeholder="Entrez le modele_de_reponse" id="modele_de_reponse" minlength="5" maxlength="50" value="<?= $listtypereclamations[$typereclamation]['modele_de_reponse'] ?>" required>
                                <small class="text-muted">Le modele_de_reponse doit comporter entre 10 et 500 caractères.</small>
                            </div>
                            <input type="hidden" name="id_type" value="<?= $listtypereclamations[$typereclamation]['id_type'] ?>">
                            <input type="submit" value="Update" class="btn btn-primary">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endfor; ?>