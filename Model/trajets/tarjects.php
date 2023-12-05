<?php
	class traject{
		private $idtraject=null;
		private $idConducteur=null;
		private $lien_depar_arriver=null;
		private $tarif=null;
		private $Date_D=null;
		private $img=null;
		function __construct($idConducteur, $lien_depar_arriver, $tarif, $Date_D, $img){
			$this->idConducteur=$idConducteur;
			$this->lien_depar_arriver=$lien_depar_arriver;
			$this->tarif=$tarif;
			$this->Date_D=$Date_D;
			$this->img=$img;
		}
		function getidtraject(){
			return $this->idtraject;
		}
		function getidConducteur(){
			return $this->idConducteur;
		}
		function getlien_depar_arriver(){
			return $this->lien_depar_arriver;
		}
		function gettarif(){
			return $this->tarif;
		}
		function getDate_D(){
			return $this->Date_D;
		}
		function getimg(){
			return $this->img;
		}
		function setidConducteur(int $idConducteur){
			$this->idConducteur=$idConducteur;
		}
		function setlien_depar_arriver(string $lien_depar_arriver){
			$this->lien_depar_arriver=$lien_depar_arriver;
		}
		function settarif(int $tarif){
			$this->tarif=$tarif;
		}
		function setDate_D(int $Date_D){
			$this->Date_D=$Date_D;
		}
		function setimg(string $img){
			$this->img=$img;
		}

	}
	
?>