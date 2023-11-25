<?php
require_once '../../Model/Reclamations/typesreclamation.php';
$typeReclamation = new typeReclamations();
$data = $typeReclamation->getNoms();
// $data = array_unique($typeReclamation->getNoms(), SORT_REGULAR);
var_dump($data);
$select = '<option value="">Sélectionnez une option</option>';
foreach ($data as $type) {
    $select .= '<option value="' . $type['nom'] . '">' . $type['nom'] . '</option>';
}
echo $select;
