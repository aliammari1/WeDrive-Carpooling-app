<?php


require_once "user.php";

class admin extends user
{
    private $id_user;
    private $id_admin;
    public function __construct(user $user)
    {
        parent::__construct([
            'id_user' => $user->getID(),
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email' => $user->getEmail(),
            'password' =>  $user->getPassword(),
            'adresse' => $user->getAdresse(),
            'numTel' => $user->getNumTel(),
            'role' => $user->getRole(),
            'profileImage' => $user->getProfileImage()
        ]);
        $this->id_user = $user->getID();
        $this->id_admin = $user->getID();
    }
    public function getUserID()
    {
        return $this->id_user;
    }
}
