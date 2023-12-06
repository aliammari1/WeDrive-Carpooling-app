<?php
require_once __DIR__ . '\..\connection.php';
require_once 'conducteur.php';
require_once 'admin.php';
require_once 'passager.php';
class users
{
    private $db;
    public function __construct()
    {
        $this->db = (new connection())->getDb();
    }
    public function getUser(string $email/*, string $password*/)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        // AND password = :password
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        // $stmt->bindParam(':password', $password);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $stmt->rowCount() > 0 ?
            new user([
                'id_user' => $result['id_user'],
                'nom' => $result['nom'],
                'prenom' => $result['prenom'],
                'email' => $result['email'],
                'password' => $result['password'],
                'adresse' => $result['adresse'],
                'numTel' => $result['numTel'],
                'role' => $result['role'],
                'profileImage' => $result['profileImage']
            ])
            : null;
    }
    public function getUserByID(int $id_user)
    {
        $sql = "SELECT * FROM users WHERE id_user = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id_user);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $stmt->rowCount() > 0 ?
            new user([
                'id_user' => $result['id_user'],
                'nom' => $result['nom'],
                'prenom' => $result['prenom'],
                'email' => $result['email'],
                'password' => $result['password'],
                'adresse' => $result['adresse'],
                'numTel' => $result['numTel'],
                'role' => $result['role'],
                'profileImage' => $result['profileImage']
            ])
            : null;
    }
    public function getUserRoleByID(int $id_user)
    {
        $sql = "SELECT role FROM users WHERE id_user = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id_user);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $stmt->rowCount() > 0 ?
            $result['role']
            : null;
    }
    public function addUser(array $data)
    {
        $sql = "INSERT INTO users (nom, prenom, numTel, email, password, role, adresse, profileImage) VALUES (:nom, :prenom, :numTel, :email, :password, :role, :adresse, :profileImage)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nom', $data['nom'], PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $data['prenom'], PDO::PARAM_STR);
        $stmt->bindParam(':numTel', $data['numTel'], PDO::PARAM_INT);
        $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $data['password'], PDO::PARAM_STR);
        $stmt->bindParam(':role', $data['role'], PDO::PARAM_STR);
        $stmt->bindParam(':adresse', $data['adresse'], PDO::PARAM_STR);
        $stmt->bindParam(':profileImage', $data['profileImage'], PDO::PARAM_LOB);
        $stmt->execute();
        return $stmt->rowCount() > 0 ?
            new user([
                'id_user' => $this->db->lastInsertId(),
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'email' => $data['email'],
                'password' => $data['password'],
                'adresse' => $data['adresse'],
                'numTel' => $data['numTel'],
                'role' => $data['role'],
                'profileImage' => $data['profileImage']
            ])
            : null;
    }
    public function showUsers($pageNumber = 0, $pageSize = 5)
    {
        $sql = "SELECT * FROM users LIMIT " . $pageNumber * $pageSize . ", " . $pageSize;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $stmt->rowCount() > 0 ?
            $result
            : null;
    }
    public function deleteUsers(int $id_user)
    {
        $sql = "DELETE FROM users WHERE id_user = :id";
        $sql = "DELETE FROM users WHERE id_user = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id_user);
        $stmt->execute();
        return $stmt->rowCount() > 0 ?
            true
            : false;
    }
    public function updateUsers(array $data)
    {
        $data['profileImage'] = file_get_contents($_FILES['profileImage']['tmp_name']);
        $sql = "UPDATE users SET nom = :nom, prenom = :prenom, numTel = :numTel, email = :email, password = :password, role = :role, adresse = :adresse, profileImage = :profileImage WHERE id_user = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $data['id_user']);
        $stmt->bindParam(':id', $data['id_user']);
        $stmt->bindParam(':nom', $data['nom']);
        $stmt->bindParam(':prenom', $data['prenom']);
        $stmt->bindParam(':numTel', $data['numTel']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':role', $data['role']);
        $stmt->bindParam(':adresse', $data['adresse']);
        $stmt->bindParam(':profileImage', $data['profileImage']);
        $stmt->execute();
        return $stmt->rowCount() > 0 ?
            new user([
                'id_user' => $data['id_user'],
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'email' => $data['email'],
                'password' => $data['password'],
                'adresse' => $data['adresse'],
                'numTel' => $data['numTel'],
                'role' => $data['role'],
                'profileImage' => $data['profileImage']
            ])
            : null;
    }
    public function sortUsers()
    {
        $sql = "SELECT * FROM users ORDER BY nom";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $stmt->rowCount() > 0 ?
            $result
            : null;
    }
    public function updateUserProfilePicture($profileImage)
    {
        $profileImage = file_get_contents($profileImage);
        $sql = $sql = "UPDATE users SET profileImage = :profileImage";
        $query = $this->db->prepare($sql);
        $query->bindParam(":profileImage", $profileImage);
        $query->execute();
    }
    public function addPassager(passager $passager)
    {
        $sql = "INSERT INTO passagers (id_user) VALUES (:id)";
        $stmt = $this->db->prepare($sql);
        $id_user = $passager->getUserID();
        $stmt->bindParam(':id', $id_user);
        $stmt->execute();
        return $stmt->rowCount() > 0 ?
            new passager($passager)
            : null;
    }
    public function showPassagers($pageNumber = 0, $pageSize = 5)
    {
        $sql = "SELECT * FROM users WHERE role = 'passager' LIMIT " . $pageNumber * $pageSize . ", " . $pageSize;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount() > 0 ?
            $stmt->fetchAll()
            : null;
    }
    public function deletePassager($id_user)
    {
        $sql = "DELETE FROM passagers WHERE id_user = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id_user);
        $stmt->execute();
        return $stmt->rowCount() > 0 ?
            true
            : false;
    }
    public function addConducteur(conducteur $conducteur)
    {
        $sql = "INSERT INTO conducteurs (id_user, modeleVoiture, nbPlaces) VALUES (:id, :modeleVoiture, :nbPlaces)";
        $stmt = $this->db->prepare($sql);
        $id_user = $conducteur->getConducteurID();
        $modeleVoiture = $conducteur->getModeleVoiture();
        $nbPlaces = $conducteur->getNbPlaces();
        $stmt->bindParam(':id', $id_user);
        $stmt->bindParam(':modeleVoiture', $modeleVoiture);
        $stmt->bindParam(':nbPlaces', $nbPlaces);
        $stmt->execute();
        return $stmt->rowCount() > 0 ?
            new conducteur($conducteur, $modeleVoiture, $nbPlaces)
            : null;
    }
    public function showConducteurs($pageNumber = 0, $pageSize = 5)
    {
        $sql = "SELECT * FROM users LIMIT " . $pageNumber * $pageSize . ", " . $pageSize;
        $sql = "SELECT * FROM users WHERE role = 'conducteur' LIMIT " . $pageNumber * $pageSize . ", " . $pageSize;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount() > 0 ?
            $stmt->fetchAll()
            : null;
    }
    // public function modifyConducteur()
    // {
    //     $sql = "UPDATE conducteurs SET modeleVoiture = :modeleVoiture, nbPlaces = :nbPlaces WHERE conducteurs.id_user = :id";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->bindParam(':id', $this->conducteur_id);
    //     $stmt->bindParam(':modeleVoiture', $this->modeleVoiture);
    //     $stmt->bindParam(':nbPlaces', $this->nbPlaces);
    //     $stmt->execute();
    //     return $stmt->rowCount() > 0 ?
    //         new conducteur($this, $this->modeleVoiture, $this->nbPlaces)
    //         : null;
    // }
    public function deleteConducteur($id_user)
    {
        $sql = "DELETE FROM conducteurs WHERE id_user = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id_user);
        $stmt->execute();
        return $stmt->rowCount() > 0 ?
            true
            : false;
    }
    public function addAdmin(admin $admin)
    {
        $sql = "INSERT INTO admins (id_user) VALUES (:id)";
        $stmt = $this->db->prepare($sql);
        $id_user = $admin->getUserID();
        $stmt->bindParam(':id', $id_user);
        $stmt->execute();
        return $stmt->rowCount() > 0 ?
            new admin($admin)
            : null;
    }
    public function showAdmins($pageNumber = 0, $pageSize = 5)
    {
        $sql = "SELECT * FROM users where role = 'admin' LIMIT " . $pageNumber * $pageSize . ", " . $pageSize;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount() > 0 ?
            $stmt->fetchAll()
            : null;
    }
    public function modifyAdmin(array $data)
    {
        $data['profileImage'] = file_get_contents($_FILES['profileImage']['tmp_name']);
        $sql = "UPDATE users SET nom = :nom, prenom = :prenom, numTel = :numTel, email = :email, password = :password, role = :role, adresse = :adresse, profileImage = :profileImage WHERE admins.id_user = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $data['id_user']);
        $stmt->bindParam(':nom', $data['nom']);
        $stmt->bindParam(':prenom', $data['prenom']);
        $stmt->bindParam(':numTel', $data['numTel']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':role', $data['role']);
        $stmt->bindParam(':adresse', $data['adresse']);
        $stmt->bindParam(':profileImage', $data['profileImage']);
        $stmt->execute();
        return $stmt->rowCount() > 0 ?
            new user([
                'id_user' => $data['id_user'],
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'email' => $data['email'],
                'password' => $data['password'],
                'adresse' => $data['adresse'],
                'numTel' => $data['numTel'],
                'role' => $data['role'],
                'profileImage' => $data['profileImage']
            ])
            : null;
    }
    public function deleteAdmin($id_user)
    {
        $sql = "DELETE FROM admins WHERE id_user = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id_user);
        $stmt->execute();
        return $stmt->rowCount() > 0 ?
            true
            : false;
    }
    public function getProfilePictureById($id)
    {
        $sql = "SELECT profileImage FROM users WHERE id_user = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0 ?
            $stmt->fetchColumn()
            : null;
    }
    function getRoleNumber($role)
    {
        $sql = "SELECT COUNT(*) FROM users WHERE role = :role";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':role', $role);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}
