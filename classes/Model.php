<?php
if(  !class_exists('Database') ) {
    require('Database.php');
}
 class Model{
    private $id;
    private $name;
    private $manufacturer;
    private $color;
    private $registration;
    private $year;
    private $note;
    private $img1;
    private $img2;
    private $db;

    public function __construct(){
        $data = new Database();
        $this->db = $data;
    }

    public function checkImgUpload($registration){
        $this->registration = $registration;
        echo $sql = "SELECT * FROM model WHERE registration_number= '$this->registration'";
        $this->db->query("SELECT * FROM model WHERE registration_number= '$this->registration'");
        return $this->db->resultSet();
    }

    public function updateRecord($fileName,$registration){
        $this->img2 = $fileName;
        $this->registration = $registration;
        $this->db->query("UPDATE model SET img2='$this->img2' WHERE registration_number='$this->registration'");
        
        return $this->db->execute();
    }

    public function setOneRecord($name, $color, $year, $manufacturer, $registration, $note, $fileName, $file= NULL){
        $this->name = $name;
        $this->color = $color;
        $this->year = $year;
        $this->registration = $registration;
        $this->note = $note;
        $this->manufacturer = $manufacturer;
        $this->img1 = $fileName;
        $this->img2 = $file;
        
        $this->db->query("INSERT INTO model(id, name,color,manufacturing_year,manufacturer,registration_number,note,img1,img2) 
        VALUES (NULL,:name,:color,:year,:manufacturer,:registration,:note,:file,:file1)");
        $this->db->bind(':name', $this->name);
        $this->db->bind(':color', $this->color);
        $this->db->bind(':year', $this->year);
        $this->db->bind(':manufacturer', $this->manufacturer);
        $this->db->bind(':registration', $this->registration);
        $this->db->bind(':note', $this->note);
        $this->db->bind(':file', $this->img1);
        $this->db->bind(':file1', $this->img2);
        $this->db->execute();
        
    }

    public function getInventoryItems(){
        $this->db->query("SELECT name,manufacturer,color,year,count FROM Inventory_view");
        return $this->db->resultSet();
        
    }

    public function getDetails($carName,$carManufacturer,$carColor,$carYear){
        $this->name = $carName;
        $this->color = $carColor;
        $this->manufacturer = $carManufacturer;
        $this->year = $carYear;
        $this->db->query("SELECT * FROM model WHERE name=:name AND manufacturer=:manufacturer AND manufacturing_year=:year AND color=:color LIMIT 1");
        $this->db->bind(':name', $this->name);
        $this->db->bind(':color', $this->color);
        $this->db->bind(':manufacturer', $this->manufacturer);
        $this->db->bind(':year', $this->year);
        return $this->db->resultSet();
    }

    public function removeItem($id){
        $this->id = $id;
        $this->db->query("DELETE FROM model WHERE id=:id");
        $this->db->bind(':id',$this->id);
        return $this->db->execute();
        
    }

 }