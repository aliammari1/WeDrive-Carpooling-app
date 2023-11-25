<?php
require_once '../../Model/Reclamations/reclamations.php';
$reclamations = new reclamations();
$noms = $reclamations->getNoms();
for ($i = 0; $i < count($noms); $i++) {
    $data[$i] = $noms[$i]["nom"];
}
$values = array_count_values($data);
header('Content-Type: application/json');
echo json_encode($values);
