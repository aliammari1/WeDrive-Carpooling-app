<?php

class Reclamation
{
    private int $id_rec;
    private string $nom;
    private string $description;
    private string $pieces_jointes; // blob type
    private string $date;


    public function getIdRec(): ?int
    {
        return $this->id_rec;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPiecesJointes(): string
    {
        return $this->pieces_jointes;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setPiecesJointes(?string $pieces_jointes): void
    {
        $this->pieces_jointes = $pieces_jointes;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
    public function __construct(int $id_rec = NULL, string $date = '', string $nom = '', string $description = '', ?string $pieces_jointes = '')
    {
        if ($id_rec !== null)
            $this->id_rec = $id_rec;
        $this->date = $date ?? date("now");
        $this->nom = $nom;
        $this->description = $description;
        $this->pieces_jointes = $pieces_jointes;
    }
}
