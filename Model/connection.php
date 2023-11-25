<?php

(new connection())->getDb();
class connection
{
    private $db;
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=covoiturage;charset=utf8', 'root', '');
            // set the PDO error mode to exception
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function __destruct()
    {
        unset($this->db);
    }
    public function getDb()
    {
        return $this->db;
    }
}
