<?php

require_once __DIR__ . "\..\..\Model\Reclamations\\reclamations.php";
require_once __DIR__ . "\..\..\Model\Reclamations\\reclamation.php";

$reclamations = new reclamations();
$listreclamations = $reclamations->displayUserReclamations($_SESSION['id_user']);
$updateReclamation = NULL;

$id_rec = $_GET['id_rec'] ?? null;

if ($id_rec !== null) {
    echo "passed by";
    if ($reclamations->deletereclamation($id_rec)) {
        header('Location: http://localhost/View/pages/back/deleteReclamation.php');
    } else {
        echo "Error: Failed to delete the reclamation.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_rec = $_POST['id_rec'] ?? null;
    $reclamations = new reclamations();
    $reclamation = $reclamations->getReclamationById($id_rec);
    if ($reclamation !== null) {
        $date = isset($_POST['date']) ? date('Y-m-d', strtotime($_POST['date'])) : '';
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $piecesJointes = $_FILES['pieces_jointes']['size'] !== 0 ? file_get_contents($_FILES['pieces_jointes']['tmp_name']) : '';
        $rec = new reclamation([$id_rec, $date, $nom, $description, $piecesJointes]);
        $reclamations->updateReclamation($id_rec, $rec);

        header('Location: http://localhost/View/pages/back/consulterRecGest.php');
    } else {
        echo "Complaint not found!";
    }
}
