<?php
require_once __DIR__ . '/../connection.php';
require_once __DIR__ . '/address.php';

class addressC
{
    private $db;
    function __construct()
    {
        $this->db = (new connection())->getDb();
    }
    /////..............................Afficher............................../////
    function Afficheraddress()
    {
        $sql = "SELECT * FROM address";

        try {
            $connection = new connection();
            $db = $connection->getDb();
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }
    //////////.................................././/////////

    function Afficheraddresstri($value, $order)
    {
        $sql = "SELECT * FROM address ORDER BY $value $order";

        try {
            $liste = $this->db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }
    /////////....................................................................../////////////////

    function search($search)
    {
        $sql = "SELECT * FROM address WHERE addressid LIKE :search OR addressA LIKE :search OR addressB LIKE :search OR type LIKE :search ";

        $req = $this->db->prepare($sql);
        $req->bindValue(':search', '%' . $search . '%'); // adding '%' before and after the search string to allow partial match

        try {
            $req->execute(); // execute the prepared statement
            $liste = $req->fetchAll(PDO::FETCH_ASSOC); // fetch the results as associative array
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    /*
function search($search){
$sql="SELECT * FROM address WHERE addressid LIKE :search OR addressA LIKE :search OR addressB LIKE :search OR type LIKE :search ";
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
    function Supprimeraddress($addressid)
    {
        $sql = "DELETE FROM address WHERE addressid=:addressid";

        $req = $this->db->prepare($sql);
        $req->bindValue(':addressid', $addressid);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }


    /////..............................Ajouter............................../////
    function Ajouteraddress($address)
    {
        $sql = "INSERT INTO address (addressA,addressB,type) VALUES (:addressA,:addressB,:type);";
        $connection = new connection();
        $db = $connection->getDb();
        try {
            $query = $this->db->prepare($sql);
            $query->execute([
                ':addressA' => $address->getaddressA(),
                ':addressB' => $address->getaddressB(),
                ':type' => $address->gettype(),

            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    /////..............................Affichage par la cle Primaire............................../////
    function Recupereraddress($addressid)
    {
        $sql = "SELECT * from address where addressid=$addressid";
        //$this->db = config::getConnexion();
        try {
            $query = $this->db->prepare($sql);
            $query->execute();

            $address = $query->fetch();
            return $address;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    /////..............................Update............................../////
    function Modifieraddress($address, $id)
    {
        try {
            // $this->db = config::getConnexion();
            $query = $this->db->prepare('UPDATE address SET addressA = :addressA, addressB = :addressB, type = :type WHERE addressid = :id');
            $query->execute([
                'addressA' => $address->getaddressA(),
                'addressB' => $address->getaddressB(),
                'type' => $address->gettype(),
                'id' => $id
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
