<?php

class connection
{

    private $db;
    public function __construct()
    {

        try {
            $this->db = new PDO("mysql:host=localhost;dbname=covoiturage", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function get_db(){
        return $this->db;
    }


}







?>