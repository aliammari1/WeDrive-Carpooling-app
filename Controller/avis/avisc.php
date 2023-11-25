<?php
include __DIR__ . '\..\..\Model\connection.php';
include __DIR__ . '\..\..\Model\avis\avis.php'; 

class avisc
{
    private $db;
    public function __construct()
    {
        $this->db = (new connection())->getDb();
    }
    public function listavis()
    {
        $sql="SELECT * FROM avis";
        try {
            $liste = $this->db->query($sql);
            return $liste;
        }catch (Exception $e)
        {   die ('Error:'. $e->getMessage());}
    }
    public function listUseravis($id_user)
    {
        $sql="SELECT * FROM avis where id_user = '$id_user'";
        try {
            $liste = $this->db->query($sql);
            return $liste;
        }catch (Exception $e)
        {   die ('Error:'. $e->getMessage());}
    }

    public function deleteavis($id)
    {
        $sql = "DELETE FROM avis WHERE id = :id";
        $req = $this->db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addavis($avisc)
    {
        $sql = "INSERT INTO avis  (typee,note, commentaire,datee) VALUES ( :typee,:note, :commentaire,:datee)";
        
        try {
          
            $query = $this->db->prepare($sql);
            $query->execute([
                'typee' => $avisc->gettypee(),
                'note' => $avisc->getnote(),
                'commentaire' => $avisc->getcommentaire(),
                'datee' => $avisc->getDatee()->format('Y/m/d')
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
	
    
    
}

?>