<?php


require_once "user.php";
class Passager extends user
{
    private $id_user;
    private $id_passager;
    public function __construct(user $user)
    {
        parent::__construct([
            'id_user' => $user->getID(),
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email' => $user->getEmail(),
            'password' =>  $user->getPassword(),
            'addresse' => $user->getAdresse(),
            'numTel' => $user->getNumTel(),
            'role' => $user->getRole(),
            'profileImage' => $user->getProfileImage()
        ]);
        $this->id_user = $user->getID();
        $this->id_passager = $user->getID();
    }
    public function getUserID()
    {
        return $this->id_user;
    }
}
