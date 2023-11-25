<?php
require_once '../../../../Controller/avis/avisc.php';
$avisc = new avisc();
$avisc->deleteavis($_GET["id"]);
header('Location:listavis.php');
?>