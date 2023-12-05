<?php
require_once '../../../../Controller/trajets/trajectsC.php';
$trajectC = new trajectsC();
$trajectC->Supprimertraject($_GET["idtraject"]);
header('Location:Affichertrajects.php');
