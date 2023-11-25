<?php
require_once __DIR__ . '\..\connection.php';

class reclamations
{
    private $db;
    public function __construct()
    {
        $this->db = (new connection())->getDb();
    }
    public function addReclamation($reclamation)
    {
        try {
            $sql = "INSERT INTO reclamation (nom, description, date, pieces_jointes,id_user, id_type) 
                    SELECT :nom, :description, :date, :pieces_jointes ,:id_user, id_type  
                    FROM classification 
                    WHERE nom = :nom";
            $query = $this->db->prepare($sql);
            $query->bindValue(':nom', $reclamation['nom']);
            $query->bindValue(':description', $reclamation['description']);
            $query->bindValue(':date', $reclamation['date']);
            $query->bindValue(':pieces_jointes', $reclamation['pieces_jointes']);
            $query->bindValue(':id_user', $reclamation['id_user']);
            $query->execute();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
        var_dump($query->rowCount() > 0);
        var_dump($this->db->lastInsertId());
        return $query->rowCount() > 0
            ? new reclamation([
                'id_rec' => $this->db->lastInsertId(),
                'nom' => $reclamation['nom'],
                'description' => $reclamation['description'],
                'date' => $reclamation['date'],
                'pieces_jointes' => $reclamation['pieces_jointes'],
                'id_user' => $reclamation['id_user']
            ])
            : null;
    }

    public function displayreclamations($pageRec = 0, $sizeRec = 5)
    {
        try {
            $sql = "SELECT * from reclamation LIMIT " . $pageRec * $sizeRec . "," . $sizeRec;
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function displayUserReclamations($userId, $pageRec = 0, $sizeRec = 5)
    {
        try {
            $sql = "SELECT * from reclamation where id_user = :id_user LIMIT " . $pageRec * $sizeRec . "," . $sizeRec;
            $query = $this->db->prepare($sql);
            $query->bindValue(':id_user', $userId);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function displayforPDF($page = 0, $size = 4)
    {
        try {
            $sql = "SELECT id_rec,nom,date,description from reclamation";
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function deletereclamation($id)
    {
        $sql = "DELETE FROM reclamation WHERE id_rec = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0 ? true : false;
    }

    public function getreclamationById($id)
    {
        try {
            $sql = "SELECT * from reclamation where id_rec = :id";
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
            $sql = "UPDATE reclamation SET nom = :nom, description = :description, date = :date, pieces_jointes = :pieces_jointes WHERE id_rec = :id";

            $query = $this->db->prepare($sql);
            $query->bindValue(':nom', $reclamation->getNom());
            $query->bindValue(':description', $reclamation->getDescription());
            $query->bindValue(':date', $reclamation->getDate());
            $query->bindValue(':pieces_jointes', $reclamation->getPiecesJointes(), PDO::PARAM_LOB);
            $query->bindValue(':id', $id);
            $query->execute();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function sortreclamations($order = 'asc')
    {
        try {
            $sql = "SELECT * FROM reclamation ORDER BY date " . ($order === 'asc' ? 'ASC' : 'DESC');
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function sortUserreclamations($id_user, $order = 'asc')
    {
        try {
            $sql = "SELECT * FROM reclamation WHERE id_user = :id_user ORDER BY date " . ($order === 'asc' ? 'ASC' : 'DESC');
            $query = $this->db->prepare($sql);
            $query->bindValue(':id_user', $id_user);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    public function searchreclamations($search)
    {
        try {
            $sql = "SELECT * FROM reclamation WHERE nom LIKE :search OR description LIKE :search OR date LIKE :search";
            $query = $this->db->prepare($sql);
            $query->bindValue(':search', '%' . $search . '%');
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function searchUserreclamations($id_user, $search)
    {
        try {
            $sql = "SELECT * FROM reclamation WHERE (nom LIKE :search OR description LIKE :search OR date LIKE :search) AND (id_user = :id_user)";
            $query = $this->db->prepare($sql);
            $query->bindValue(':search', '%' . $search . '%');
            $query->bindValue(':id_user', $id_user);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function downloadPieceJointe($id)
    {
        try {
            $sql = "SELECT pieces_jointes FROM reclamation WHERE id_rec = :id";
            $query = $this->db->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
        return $query->fetchColumn();
    }
    public function getNoms()
    {
        try {
            $sql = "SELECT nom FROM reclamation";
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function getTotal()
    {
        $sql = "SELECT COUNT(*) FROM reclamation";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_COLUMN);
    }
}
