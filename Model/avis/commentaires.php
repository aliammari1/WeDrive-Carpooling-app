<?php
class commentaires{
    private $comment_id;
    private $name;
    private $message;
    private $post_id;
    
    public function __construct($comment_id, $name,$message,$post_id){
        $this->comment_id=$comment_id;
        $this->name=$name;
        $this->message=$message;
        $this->post_id=$post_id;}

        public function getcomment_id(){
            return $this->comment_id;; 
        }
        public function getname(){
            return $this->name; 
        }
        public function getmessage(){
            return $this->message; 
        }
        public function getpost_id(){
            return $this->post_id;; 
        }
        public function setcomment_id($comment_id){
            $this->comment_id=$comment_id; 
        }
        public function setname($name){
            $this->name=$name; 
        }
        public function setmessage($message){
            $this->message=$message; 
        }
        public function setpost_id($post_id){
            $this->post_id=$post_id; 
        }
        
}
?>