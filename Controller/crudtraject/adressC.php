<?php
	#include_once '../Config.php';
	include_once '../../../../Model/connection.php';
	//include_once '../../../../../Model/ trajects.php';
#	require_once($_SERVER['DOCUMENT_ROOT'] . '/integration/project2223_2a30-2a30-tnraiders/Model/connection.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/integration/project2223_2a30-2a30-tnraiders/Model/ adresss.php');
	class adressC {
		private $db;
		function __construct()
		{
			$this->db = (new connection())->getDb();
		}
/////..............................Afficher............................../////
		function Afficheradress(){
			$sql="SELECT * FROM adress";
		
			try{
				$connection = new connection();
				$db = $connection->getDb();
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
	//////////.................................././/////////	

		function Afficheradresstri($value,$order){
			$sql="SELECT * FROM adress ORDER BY $value $order";
		
			try{
				$liste = $this->db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
/////////....................................................................../////////////////

function search($search){
	$sql="SELECT * FROM adress WHERE adressid LIKE :search OR adressA LIKE :search OR adressB LIKE :search OR type LIKE :search ";
	
	$req=$this->db->prepare($sql);
	$req->bindValue(':search', '%'.$search.'%'); // adding '%' before and after the search string to allow partial match
	
	try{
		$req->execute(); // execute the prepared statement
		$liste = $req->fetchAll(PDO::FETCH_ASSOC); // fetch the results as associative array
		return $liste;
	}
	catch(Exception $e){
		die('Erreur:'. $e->getMessage());
	}
}

/*
function search($search){
	$sql="SELECT * FROM adress WHERE adressid LIKE :search OR adressA LIKE :search OR adressB LIKE :search OR type LIKE :search ";
	$this->db = config::getConnexion();
	$req=$this->db->prepare($sql);
			$req->bindValue(':search', $search); 

	
	try{
		$liste = $this->db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur:'. $e->getMessage());
	}
}*/
/////..............................Supprimer............................../////
		function Supprimeradress($adressid){
			$sql="DELETE FROM adress WHERE adressid=:adressid";
		
			$req=$this->db->prepare($sql);
			$req->bindValue(':adressid', $adressid);   
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}


/////..............................Ajouter............................../////
		function Ajouteradress($adress){
			$sql="INSERT INTO adress (adressA,adressB,type) VALUES (:adressA,:adressB,:type);";
			$connection = new connection();
			$db = $connection->getDb();
			try{
				$query = $this->db->prepare($sql);
				$query->execute([
					':adressA' => $adress->getadressA(),
					':adressB' => $adress->getadressB(),
					':type' => $adress->gettype(),
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
				
			}			
		

            
}

/////..............................Affichage par la cle Primaire............................../////
		function Recupereradress($adressid){
			$sql="SELECT * from adress where adressid=$adressid";
			//$this->db = config::getConnexion();
			try{
				$query=$this->db->prepare($sql);
				$query->execute();

				$adress=$query->fetch();
				return $adress;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}


/////..............................Update............................../////
		function Modifieradress($adress, $id){
			try {
			//	$this->db = config::getConnexion();
		$query = $this->db->prepare('UPDATE adress SET adressA = :adressA, adressB = :adressB, type = :type  WHERE adressid = :id');
				$query->execute([
					'adressA' => $adress->getadressA(),
					'adressB' => $adress->getadressB(),
					'type' => $adress->gettype(),				
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				die('Erreur: '.$e->getMessage());
			}
		}
	}	
?>
