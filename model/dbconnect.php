<?php 

class Dbconnect{
    private $serverName = 'localhost';
    private $username = 'root';
    private $password = 'surya123';
    private $dbName = 'shop';
    protected $connection = null;

    public function __construct(){
        try{
            $this->connection = new PDO("mysql:host=$this->serverName;dbname=$this->dbName;charset=utf8",$this->username,$this->password);
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}

?>