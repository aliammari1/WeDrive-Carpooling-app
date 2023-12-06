<?php
class reservation
{
    private $id;
    private $etat;
    private $date;
    private $lieu;
    private $nb_place;
    private $id_reserv;
    private $name_cond;
    private $last_name;
    private $id_cond;
    private $id_passager;
    private $animal;
    private $nb_valize;
    private $mode_paiement;
    private $addresse_dep;
    private $addresse_arr;
    private $nb_place_vide;
    private $prix;
    private $date_meet;
    private $num_tel;
    public function __construct(array $reservation)
    {
        $this->animal = $reservation['animal'];
        $this->nb_valize = $reservation['nb_place_vide'];
        $this->mode_paiement = $reservation['mode_paiement'];
        $this->addresse_dep = $reservation['date_meet'];
    }
    public function getAnimal()
    {
        return $this->animal;
    }
    public function getNb_place_vide()
    {
        return $this->nb_valize;
    }
    public function getMode_paiement()
    {
        return $this->mode_paiement;
    }
    public function getDate_meet()
    {
        return $this->date_meet;
    }
    public function getEtat()
    {
        return $this->etat;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function getLieu()
    {
        return $this->lieu;
    }
    public function getNb_place()
    {
        return $this->nb_place;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }
    public function setNb_place($nb_place)
    {
        $this->nb_place = $nb_place;
    }
}
