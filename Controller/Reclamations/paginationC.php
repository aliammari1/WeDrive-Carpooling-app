<?php
require_once __DIR__ . "\..\..\Model\Reclamations\Reclamation.php";
try {

    $reclamations = new reclamations();
    $totalRecs = $reclamations->getTotal();
    $nbrPages = floor($totalRecs[0] / 5) + 1;
    $pageRec = isset($_GET['pageRec']) ? $_GET['pageRec'] : 0;
    $sizeRec = isset($GET['sizeRec']) ? $_GET['sizeRec'] : 5;
    $listreclamations = $reclamations->displayreclamations($pageRec, $sizeRec);
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
