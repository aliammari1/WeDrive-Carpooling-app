<?php
	include_once '../../../../Controller/crudtraject/trajectsC.php';
	$trajectC=new trajectsC();
	$trajectC->Supprimertraject($_GET["idtraject"]);
	header('Location:Affichertrajects.php');
?>