<?php

class paiement
{
    private int $id_p;
    private int $id_reserv;
    private string $date;
    private float $prix;
    public function __construct(array $paiement)
    {
        if (isset($paiement['id_p']))
            $this->id_p = $paiement['id_p'];
        $this->id_reserv = $paiement['id_reserv'];
        $this->date = $paiement['date'];
        $this->prix = $paiement['prix'];
    }
    public function getId_p(): int
    {
        return $this->id_p;
    }
    public function setId_p(int $id_p): void
    {
        $this->id_p = $id_p;
    }
    public function getId_reserv(): int
    {
        return $this->id_reserv;
    }
    public function setId_reserv(int $id_reserv): void
    {
        $this->id_reserv = $id_reserv;
    }
    public function getDate(): string
    {
        return $this->date;
    }
    public function setDate(string $date): void
    {
        $this->date = $date;
    }
    public function getPrix(): float
    {
        return $this->prix;
    }
    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
    }
}