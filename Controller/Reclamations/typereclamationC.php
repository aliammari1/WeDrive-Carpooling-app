<?php
require_once __DIR__ . "\..\..\Model\Reclamations\\typereclamation.php";
require_once __DIR__ . "\..\..\Model\Reclamations\\typesreclamation.php";

$typereclamation = new typeReclamations();
$listtypereclamations  = $typereclamation->displaytypereclamations();
// var_dump($listtypereclamations);
$updateReclamation = NULL;

$id_type = $_GET['id_type'] ?? null;

if ($id_type !== null) {
    if ($typereclamation->deletetypereclamation($id_type)) {
        header('Location: http://localhost/View/pages/back/deleteReclamation.php');
    } else {
        echo "Error: Failed to delete the reclamation.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_type = $_POST['id_type'] ?? null;
    var_dump($_POST);
    $reclamationtype = $typereclamation->gettypereclamationById($id_type);
    if ($reclamationtype !== null) {
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $categorie = isset($_POST['categorie']) ? $_POST['categorie'] : '';
        $modele_de_reponse = isset($_POST['modele_de_reponse']) ? $_POST['modele_de_reponse'] : '';
        $typerec = new typeReclamation($id_type, $nom, $categorie, $modele_de_reponse);
        if ($nom !== '')
            $typerec->setNom($nom);
        if ($categorie !== '')
            $typerec->setCategorie($categorie);
        if ($modele_de_reponse !== '')
            $typerec->setModeleDeReponse($modele_de_reponse);

        $typereclamation->updateReclamation($id_type, $typerec);

        header('Location: http://localhost/View/pages/back/consultertypeRec.php');
    } else {
        echo "Complaint not found!";
    }
}
