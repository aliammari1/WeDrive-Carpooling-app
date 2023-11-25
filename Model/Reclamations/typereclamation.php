<?php

class typeReclamation
{
    private ?int $id_type;
    private string $nom;
    private string $categorie;
    private string $modele_de_reponse;

    public function getIdType(): int
    {
        return $this->id_type;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getCategorie(): string
    {
        return $this->categorie;
    }

    public function getModeleDeReponse(): string
    {
        return $this->modele_de_reponse;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function setCategorie(string $categorie): void
    {
        $this->categorie = $categorie;
    }

    public function setModeleDeReponse(string $modele_de_reponse): void
    {
        $this->modele_de_reponse = $modele_de_reponse;
    }

    public function __construct(?int $id_type = null, string $nom, string $categorie, string $modele_de_reponse)
    {
        $this->id_type = $id_type;
        $this->nom = $nom;
        $this->categorie = $categorie;
        $this->modele_de_reponse = $modele_de_reponse;
    }
}
