<?php

class reservations
{
    private $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=covoiturage;charset=utf8', 'root', '');
    }
    public function addReservation(array $reservation)
    {
        $sql = "INSERT INTO reservation (animal, nb_place_vide, mode_paiement,date_meet) VALUES ( :animal, :nb_place_vide, :mode_paiement, :date_meet)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':animal', $reservation['animal']);
        $stmt->bindValue(':nb_place_vide', $reservation['nb_place_vide']);
        $stmt->bindValue(':mode_paiement', $reservation['mode_paiement']);
        $stmt->bindValue(':date_meet', $reservation['date_meet']);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function showReservations()
    {
        $sql = "SELECT * FROM reservation";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteReservation($id)
    {
        $sql = "DELETE FROM reservation where id_reserv = :id_reserv";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_reserv', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function updateReservation(array $reservation)
    {
        $sql = "UPDATE reservation SET animal = :animal, nb_place_vide = :nb_place_vide, mode_paiement = :mode_paiement, date_meet = :date_meet";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':animal', $reservation['animal']);
        $stmt->bindValue(':nb_place_vide', $reservation['nb_place_vide']);
        $stmt->bindValue(':mode_paiement', $reservation['mode_paiement']);
        $stmt->bindValue(':date_meet', $reservation['date_meet']);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function reserver($id)
    {
        $sql = "update reservation set nb_place_vide=nb_place_vide-1 where id_reserv = :id_reserv";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_reserv', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function annuler($id)
    {
        $sql = "update reservation set nb_place_vide=nb_place_vide+1 where id_reserv = :id_reserv";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_reserv', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function sortReservation($sort)
    {
        // SECURITY: ORDER BY direction cannot be bound as a parameter, so
        // whitelist it to ASC/DESC to prevent SQL injection via $sort.
        $dir = strtoupper(trim((string) $sort)) === 'DESC' ? 'DESC' : 'ASC';
        $sql = "SELECT * FROM reservation ORDER BY date_meet " . $dir;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function searchReservation($search)
    {
        $sql = "SELECT * FROM reservation WHERE animal LIKE :a OR nb_place_vide LIKE :b OR mode_paiement LIKE :c OR date_meet LIKE :d";
        $stmt = $this->db->prepare($sql);
        $like = '%' . $search . '%';
        foreach (['a', 'b', 'c', 'd'] as $p) {
            $stmt->bindValue(":$p", $like, PDO::PARAM_STR);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pdf()
    {
        $sql = "SELECT animal,nb_valize,mode_paiement,nb_place_vide,date_meet FROM reservation";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>