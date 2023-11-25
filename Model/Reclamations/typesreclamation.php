<?php
require_once 'connection.php';

class typeReclamations
{
    private $db;
    public function __construct()
    {
        $this->db = (new connection())->getDb();
    }
    public function addtypeReclamation($typereclamation)
    {
        try {
            $sql = "INSERT INTO classification (nom, categorie,modele_de_reponse) VALUES (:nom, :categorie, :modele_de_reponse)";
            $query = $this->db->prepare($sql);
            $query->bindValue('nom', $typereclamation->getNom());
            $query->bindValue('categorie', $typereclamation->getCategorie());
            $query->bindValue('modele_de_reponse', $typereclamation->getModeleDeReponse());
            $query->execute();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function displaytypereclamations()
    {
        try {
            $sql = "SELECT * from classification";
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function deletetypereclamation($id)
    {
        $sql = "DELETE FROM reclamation where id_type = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $sql = "DELETE FROM classification where id_type = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0 ? true : false;
    }

    public function gettypereclamationById($id)
    {
        try {
            $sql = "SELECT * from classification where id_type = :id";
            $query = $this->db->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
        return $query->fetch();
    }
    public function updateReclamation($id, $reclamation)
    {
        try {
            $sql = "UPDATE classification SET nom = :nom, categorie = :categorie, modele_de_reponse = :modele_de_reponse WHERE id_type = :id";
            $query = $this->db->prepare($sql);
            $query->bindValue(':nom', $reclamation->getNom());
            $query->bindValue(':categorie', $reclamation->getCategorie());
            $query->bindValue(':modele_de_reponse', $reclamation->getModeleDeReponse());
            $query->bindValue(':id', $id);
            $query->execute();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    public function sorttypereclamations($order = 'asc')
    {
        try {
            $sql = "SELECT * FROM classification ORDER BY nom " . ($order === 'asc' ? 'ASC' : 'DESC');
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function searchtypereclamations($search)
    {
        try {
            $sql = "SELECT * FROM classification WHERE nom LIKE :search OR categorie LIKE :search OR modele_de_reponse LIKE :search";
            $query = $this->db->prepare($sql);
            $query->bindValue(':search', '%' . $search . '%');
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function getNoms()
    {
        try {
            $sql = "SELECT nom FROM classification";
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Throwable $e) {
            echo $e->getMessage();
        }
    }
}
