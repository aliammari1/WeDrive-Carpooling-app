<?php


require_once "user.php";
class conducteur extends user
{
    private $conducteur_id;
    private $modeleVoiture;
    private $nbPlaces;
    public function __construct(user $user, $modeleVoiture = null, $nbPlaces = null)
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
        $this->conducteur_id = $user->getID();
        $this->modeleVoiture = $modeleVoiture;
        $this->nbPlaces = $nbPlaces;
    }
    public function getModeleVoiture()
    {
        return $this->modeleVoiture;
    }
    public function setModeleVoiture($modeleVoiture)
    {
        $this->modeleVoiture = $modeleVoiture;
    }
    public function getNbPlaces()
    {
        return $this->nbPlaces;
    }
    public function setNbPlaces($nbPlaces)
    {
        $this->nbPlaces = $nbPlaces;
    }
    public function getConducteurID()
    {
        return $this->conducteur_id;
    }
}
