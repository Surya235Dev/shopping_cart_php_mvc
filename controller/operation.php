<?php 

require_once "model/dbconnect.php";

class Operation extends Dbconnect{

    public function __construct(){
        parent::__construct();
    }

    public function check($a)
        {
            $return = mysqli_real_escape_string($this->connection,$a);
            return $return;
        }

    public function store_record(){
     
       if(isset($_POST['submit'])){
       $name = $_POST['name'];
       $price = $_POST['price'];
       $description = $_POST['description'];
       $imageurl = $_POST['imageurl'];

       if($this->insert_record($name, $price, $description,$imageurl)){
        header("Location:index.php?controller=product");
        } else {
        return $showAlert = 'Invalid Input';
        }
    }
    }

    public function insert_record($a, $b, $c, $d){
        if(empty($id)||empty($name)||empty($price)||empty($description)){
            return false;
        } else {
            $query = "INSERT INTO items (name, price, description, imageurl) VALUES ('$a','$b','$c','$d')";
        $result = $this->connection->exec($query);
        if($result){
            return true;
        } else {
            return false;
        }
        }
    }

    public function executeQuery($sql){
        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function get_record($id){
   
        $sql = "SELECT * FROM items WHERE id='$id' ";
        $data = $this->executeQuery($sql);
        return $data;
    }

    public function delete_record($id){
        if(isset($_GET['id'])){
        $query = "DELETE FROM items where id='$id' ";
        $result = $this->connection->exec($query);
        if($result){
            header("Location:index.php?controller=product");
        } }
    }

    public function update(){
        if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $imageurl = $_POST['imageurl'];
            if($this->update_record($id, $name, $price, $description,$imageurl)){
                header("Location:index.php?controller=product");
            } else {
                 return $showAlert = 'Invalid Input. Please fill the form again.';
            }
        }
    }

    public function update_record($id, $name, $price, $description, $imageurl){
        if(empty($id)||empty($name)||empty($price)||empty($description)){
            return false;
        } else {
            $sql = "UPDATE items SET name='$name', price='$price', description='$description', imageurl='$imageurl' WHERE id='$id' ";
        $result = $this->connection->exec($sql);
        if($result){
            return true;
        } else {
            return false;
        }
        }
    }

}

?>