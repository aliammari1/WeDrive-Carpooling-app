<?php
require_once realpath(dirname(__FILE__)) . "/../../Model/Reclamations/typereclamation.php";
require_once realpath(dirname(__FILE__)) . "/../../Model/Reclamations/typesreclamation.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $categorie = isset($_POST['categorie']) ? $_POST['categorie'] : '';
        $modele_de_reponse = isset($_POST['modele_de_reponse']) ? $_POST['modele_de_reponse'] : '';
        $id_type = null;
        $typereclamation = new typeReclamation($id_type, $nom, $categorie, $modele_de_reponse);
        $typereclamations = new typeReclamations();
        $typereclamations->addtypeReclamation($typereclamation);
        header('Location: http://localhost/View/pages/back/consultertypeRec.php');
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
