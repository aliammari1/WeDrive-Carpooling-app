<?php


class user
{
    private int $id_user;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $addresse;
    private string $password;
    private int $numTel;
    private string $role;
    private $profileImage;
    public function __construct(array $data)
    {
        $this->id_user = $data['id_user'];
        $this->nom = $data['nom'];
        $this->prenom = $data['prenom'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->addresse = $data['addresse'];
        $this->numTel = $data['numTel'];
        $this->role = $data['role'];
        $this->profileImage = $data['profileImage'];
    }
    public function getID()
    {
        return $this->id_user;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getAdresse()
    {
        return $this->addresse;
    }
    public function setAdresse($addresse)
    {
        $this->addresse = $addresse;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getNumTel()
    {
        return $this->numTel;
    }
    public function setNumTel($numTel)
    {
        $this->numTel = $numTel;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }
    public function getProfileImage()
    {
        return $this->profileImage;
    }
    public function setProfileImage($profileImage)
    {
        $this->profileImage = $profileImage;
    }
}
