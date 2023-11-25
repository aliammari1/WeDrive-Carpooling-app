<?php
	class adress{
		private $adressid=null;
		private $adressA=null;
		private $adressB=null;
		private $type=null;
	
		function __construct($adressA, $adressB, $type){
			$this->adressA=$adressA;
			$this->adressB=$adressB;
			$this->type=$type;
		
		}
		function getadressid(){
			return $this->adressid;
		}
		function getadressA(){
			return $this->adressA;
		}
		function getadressB(){
			return $this->adressB;
		}
		function gettype(){
			return $this->type;
		}
	}
	?>