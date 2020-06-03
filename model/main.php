<?php 

require_once "dbconnect.php";

class Main extends Dbconnect{
    
    public function __construct(){
        parent::__construct();
    }

    public function executeQuery($sql){
        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function action($sql){
        $this->connection->exec($sql);
    }

}

?>