<?php 
class Database{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'inventory';

    private $dbh;
    private $error;
    private $stmt;

    public function __construct(){
        //database string
        $dsn = 'mysql:host='.$this->host . ';dbname='. $this->dbname;

        //setting PDO options
        $options = array(
            PDO::ATTR_PERSISTENT => FALSE,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        //create new PDO
        try{
          $this->dbh = new PDO($dsn, $this->user, $this->password,$options);
           
        }catch(PDOException $e){
            echo $this->error = $e->getMessage();


        }
        
        
    }

    public function query($query){
       $this->stmt = $this->dbh->prepare($query);
       
    }
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
					$type = PDO::PARAM_INT;
					break;

                case is_bool($type):
                     $type = PDO::PARAM_BOOL;
                     break;
                
                case is_null($value):
                     $type = PDO::PARAM_NULL;
                     break;

                     default: 
                     $type = PDO::PARAM_STR;
             
            }
        }
        $this->stmt->bindValue($param, $value, $type);
       
    }

    public function execute(){
        
        return $this->stmt->execute();
    
    }

    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function lastInsertId(){
        return $this->dbh->lastInsertId();
      
    }

}




?>