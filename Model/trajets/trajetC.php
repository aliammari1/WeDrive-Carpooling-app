
<?php
require_once(__DIR__ . '/../connection.php');
require_once(__DIR__ . '/trajet.php');

class trajetC
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
        $sql = "SELECT * FROM trajets";
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
    function Supprimertraject($idtrajet)
    {
        $sql = "DELETE FROM trajets WHERE idtrajet=:idtrajet";

        $req = $this->db->prepare($sql);
        $req->bindValue(':idtrajet', $idtrajet);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }


    /////..............................Ajouter............................../////
    function Ajoutertraject($trajets)
    {
        $sql = "INSERT INTO trajets ( idConducteur,lien_depar_arriver,tarif,Date_D,img) VALUES (:idConducteur,:lien_depar_arriver,:tarif,:Date_D,:img);";

        try {
            $query = $this->db->prepare($sql);
            $query->execute([
                ':idConducteur' => $trajets->getidConducteur(),
                ':lien_depar_arriver' => $trajets->getlien_depar_arriver(),
                ':tarif' => $trajets->gettarif(),
                ':Date_D' => $trajets->getDate_D(),
                ':img' => $trajets->getimg(),
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    /////..............................Affichage par la cle Primaire............................../////
    function Recuperertraject($idtrajet)
    {
        $sql = "SELECT * from trajets where idtrajet=$idtrajet";

        try {
            $query = $this->db->prepare($sql);
            $query->execute();

            $trajets = $query->fetch();
            return $trajets;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    /////..............................Update............................../////
    function Modifiertraject($trajets, $id)
    {
        try {

            $query = $this->db->prepare('UPDATE trajets SET idConducteur = :idConducteur, lien_depar_arriver = :lien_depar_arriver, tarif = :tarif, Date_D = :Date_D, img = :img WHERE idtrajet= :id');
            $query->execute([
                'idConducteur' => $trajets->getidConducteur(),
                'lien_depar_arriver' => $trajets->getlien_depar_arriver(),
                'tarif' => $trajets->gettarif(),
                'Date_D' => $trajets->getDate_D(),
                'img' => $trajets->getimg(),
                'id' => $id
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>
