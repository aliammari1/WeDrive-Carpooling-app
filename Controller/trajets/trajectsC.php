
<?php

/*require_once ('../../../Model/connection.php');
	require_once ('../../../Model/ tarjects.php');*/

#require_once(__DIR__ . '/../../Model/connection.php');
#require_once(__DIR__ . '/../../Model/ trajects.php');
require_once(__DIR__ . '/integration/project2223_2a30-2a30-tnraiders/Model/connection.php');
require_once(__DIR__ . '/integration/project2223_2a30-2a30-tnraiders/Model/ tarjects.php');




class trajectsC
{
	private $db;
	function __construct()
	{
		$this->db = (new connection())->getDb();
	}

	//	let connection;
	/////..............................Afficher............................../////
	function Affichertraject()
	{
		$sql = "SELECT * FROM trajects";
		try {
			$connection = new connection();
			$db = $connection->getDb();
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}


	/////..............................Supprimer............................../////
	function Supprimertraject($idtraject)
	{
		$sql = "DELETE FROM trajects WHERE idtraject=:idtraject";

		$req = $this->db->prepare($sql);
		$req->bindValue(':idtraject', $idtraject);
		try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMeesage());
		}
	}


	/////..............................Ajouter............................../////
	function Ajoutertraject($trajects)
	{
		$sql = "INSERT INTO trajects ( idConducteur,lien_depar_arriver,tarif,Date_D,img) VALUES (:idConducteur,:lien_depar_arriver,:tarif,:Date_D,:img);";

		try {
			$query = $this->db->prepare($sql);
			$query->execute([
				':idConducteur' => $trajects->getidConducteur(),
				':lien_depar_arriver' => $trajects->getlien_depar_arriver(),
				':tarif' => $trajects->gettarif(),
				':Date_D' => $trajects->getDate_D(),
				':img' => $trajects->getimg(),
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}

	/////..............................Affichage par la cle Primaire............................../////
	function Recuperertraject($idtraject)
	{
		$sql = "SELECT * from trajects where idtraject=$idtraject";

		try {
			$query = $this->db->prepare($sql);
			$query->execute();

			$trajects = $query->fetch();
			return $trajects;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}


	/////..............................Update............................../////
	function Modifiertraject($trajects, $id)
	{
		try {

			$query = $this->db->prepare('UPDATE trajects SET idConducteur = :idConducteur, lien_depar_arriver = :lien_depar_arriver, tarif = :tarif, Date_D = :Date_D, img = :img WHERE idtraject= :id');
			$query->execute([
				'idConducteur' => $trajects->getidConducteur(),
				'lien_depar_arriver' => $trajects->getlien_depar_arriver(),
				'tarif' => $trajects->gettarif(),
				'Date_D' => $trajects->getDate_D(),
				'img' => $trajects->getimg(),
				'id' => $id
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
}
?>
