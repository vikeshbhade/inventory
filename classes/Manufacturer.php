<?php
include ('Database.php');

class Manufacturer{
    private $name;
    private $db;
    
    public function __construct(){
        $data = new Database();
        $this->db = $data;
        
    }

    public function getRecords($name){
        $this->name = $name;
        $this->db->query("SELECT name FROM manufacturer where name = :name ");
        $this->db->bind(':name', $this->name);
        return  $this->db->resultSet();
        

    }
    public function getNames(){
        $this->db->query("SELECT name FROM manufacturer");
        return $this->db->resultSet();
    }
    public function setRecords($name){
        $this->db->query("INSERT INTO manufacturer values('NULL',:name)");
        $this->db->bind(':name',$name);
        return $this->db->execute();
    }
    
    public function __destruct(){
        $this->db = NULL;
    }
}