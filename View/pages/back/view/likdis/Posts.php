<?php
class Posts{
    private $host  = 'localhost';
    private $user  = 'root';
    private $password   = '';
    private $database  = 'covoiturage';    
    private $postTable = 'commentaires';
    private $postVotesTable = 'commentaires';
    private $dbConnect = false;
    
    public function __construct(){
        if(!$this->dbConnect){ 
            try {
                $conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->dbConnect = $conn;
            } catch (PDOException $e) {
                die("Error failed to connect to MySQL: " . $e->getMessage());
            }
        }
    }
    
    private function executeQuery($sqlQuery) {
        try {
            $stmt = $this->dbConnect->query($sqlQuery);
            $data= array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data[]=$row;            
            }
            return $data;
        } catch (PDOException $e) {
            die('Error in query: '. $e->getMessage());
        }
    }
    
    public function getPosts(){
        $sqlQuery = 'SELECT * FROM '.$this->postTable;
        return  $this->executeQuery($sqlQuery);        
    }   
    
    public function isUserAlreadyVoted($name, $comment_id){
        $sqlQuery = 'SELECT comment_id, name, post_id FROM '.$this->postVotesTable." WHERE name = ? AND comment_id = ?";
        try {
            $stmt = $this->dbConnect->prepare($sqlQuery);
            $stmt->execute([$name, $comment_id]);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            die('Error in query: '. $e->getMessage());
        }
    }       
    
    public function getUserVotes($name, $post_id){
        $sqlQuery = 'SELECT comment_id, name, post_id FROM '.$this->postVotesTable." WHERE name = ? AND post_id = ?";
        try {
            $stmt = $this->dbConnect->prepare($sqlQuery);
            $stmt->execute([$name, $post_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Error in query: '. $e->getMessage());
        }
    }   
    
    public function getPostVotes($comment_id){
        $sqlQuery = 'SELECT comment_id, name, post_id, note_up FROM '.$this->postTable." WHERE comment_id = ?";
        try {
            $stmt = $this->dbConnect->prepare($sqlQuery);
            $stmt->execute([$comment_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Error in query: '. $e->getMessage());
        }
    }   
  
   
    
}
?>