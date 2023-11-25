<?php

class paiements
{
    private $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=covoiturage;charset=utf8', 'root', '');
    }
    public function addPaiement(paiement $paiement)
    {
        $req = $this->db->prepare('INSERT INTO paiement ( id_reserv, date, prix) VALUES ( :id_reserv, :date, :prix)');
        $req->bindValue(':id_reserv', $paiement->getId_reserv());
        $req->bindValue(':date', $paiement->getDate());
        $req->bindValue(':prix', $paiement->getPrix());
        $req->execute();
    }
    public function showPaiement()
    {
        $req = $this->db->prepare('SELECT * FROM paiement');
        $req->execute();
        $paiement = $req->fetchAll(PDO::FETCH_ASSOC);
        return $paiement;
    }
    public function deletePaiement(int $id_p)
    {
        $req = $this->db->prepare('DELETE FROM paiement WHERE id_p = :id_p');
        $req->bindValue(':id_p', $id_p);
        $req->execute();
    }
    public function updatePaiement(paiement $paiement)
    {
        $req = $this->db->prepare('UPDATE paiement SET id_reserv = :id_reserv, date = :date, prix = :prix WHERE id_p = :id_p');
        $req->bindValue(':id_p', $paiement->getId_p());
        $req->bindValue(':id_reserv', $paiement->getId_reserv());
        $req->bindValue(':date', $paiement->getDate());
        $req->bindValue(':prix', $paiement->getPrix());
        $req->execute();
    }
}