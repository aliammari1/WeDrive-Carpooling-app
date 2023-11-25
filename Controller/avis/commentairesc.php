<?php
include __DIR__.'\..\..\Model\connection.php';
include __DIR__.'\..\..\Model\avis\commentaires.php'; 

class commentairesc
{
    private $db;
    public function __construct()
    {
        $this->db = (new connection())->getDb();
    }
    public function listcommentaires()
    {
        $sql="SELECT * FROM commentaires";
       
        try {
            $liste = $this->db->query($sql);
            return $liste;
        }catch (Exception $e)
        {   die ('Error:'. $e->getMessage());}
    }

    public function deletecommentaires($comment_id)
    {
        $sql = "DELETE FROM commentaires WHERE comment_id = :comment_id";
      
        $req = $this->db->prepare($sql);
        $req->bindValue(':comment_id', $comment_id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addcommentaires($commentairesc)
    {
        $sql = "INSERT INTO commentaires  (comment_id,name, message) VALUES ( :id,:vision, :comment,:notepro)";
        
    
        try {
          
            $query = $this->db->prepare($sql);
            $query->execute([
                'id' => $commentairesc->getid(),
                'vision' => $commentairesc->getvision(),
                'comment' => $commentairesc->getcomment(),
                'notepro' => $commentairesc->getnotepro()->format('Y/m/d')
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
	
    
    
}

?>