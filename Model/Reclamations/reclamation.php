<?php

class Reclamation
{
    private int $id_rec;
    private string $nom;
    private string $description;
    private string $pieces_jointes; // blob type
    private string $date;
    private int $id_user;
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
    public function getIdUser(): int
    {
        return $this->id_user;
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
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }
    public function __construct(array $data)
    {
        var_dump($data);
        if ($data['id_rec'] !== null)
            $this->id_rec = $data['id_rec'];
        $this->date = $data['date'] ?? date("now");
        $this->nom = $data['nom'];
        $this->description = $data['description'];
        $this->pieces_jointes = $data['pieces_jointes'];
        if ($data['id_user'] !== null)
            $this->id_user = $data['id_user'];
    }
}
