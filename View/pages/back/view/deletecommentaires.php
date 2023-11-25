<?php
include '../../../../Controller/avis/commentairesc.php';
$commentairesc = new commentairesc();
$commentairesc->deletecommentaires($_GET["comment_id"]);
header('Location:listcommentaires.php');
?>