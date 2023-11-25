<?php
class avis{
    private $id;
    private $typee;
    private $note;
    private $commentaire;
    private $datee;
    public function __construct($typee, $note,$commentaire,$datee){
        $this->typee=$typee;
        $this->note=$note;
        $this->commentaire=$commentaire;
        $this->datee=$datee;}

        public function gettypee(){
            return $this->typee; 
        }
        public function getnote(){
            return $this->note; 
        }
        public function getcommentaire(){
            return $this->commentaire; 
        }
        public function getdatee(){
            return $this->datee; 
        }
        public function settypee($typee){
            $this->typee=$typee; 
        }
        public function setnote($note){
            $this->note=$note; 
        }
        public function setcommentaire($commentaire){
            $this->commentaire=$commetnaire; 
        }
        public function setdatee($datee){
            $this->datee=$datee; 
        }
        
}
?>