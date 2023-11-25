<?php
	include_once '../../../../Controller/crudtraject/adressC.php';
	$trajectC=new adressC();
	$trajectC->Supprimeradress($_GET["adressid"]);
	header('Location:Afficheradresss.php');
?>