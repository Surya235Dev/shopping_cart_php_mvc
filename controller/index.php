<?php 
   if(isset($_GET['action'])){
       $action = $_GET['action'];
   } else {
       $action = "";
   }
   
   switch($action){
       case "add" :
               
               if(isset($_POST['submit'])){
                   $name = $_POST['name'];
                   $price = $_POST['price'];
                   $description = $_POST['description'];
                   $imageurl = $_POST['imageurl'];
                   
                   if(empty($name) || empty($price) || empty($description) || empty($imageurl) ){
                       $showAlert = 'Invalid Input. Please fill the form again.';
                   } else {  
                       
                       $app->action("INSERT INTO items (name, price, description, imageurl) VALUES ('$name','$price','$description','$imageurl')");
                       header("Location:index.php?controller=product");
                   }
               }
               require_once "view/addproduct.php";
            break;
            
       case "edit" : 
              
              if(isset($_GET['id'])){
              
                  $id = $_GET['id'];
                  
                  $result = $app->executeQuery("SELECT * FROM items WHERE id='$id'");
                  foreach($result as $item){
                      $name = isset($item['name'])?$item['name']:'';
                      $price = isset($item['price'])?$item['price']:'';
                      $description = isset($item['description'])?$item['description']:'';
                      $imageurl =isset($item['imageurl'])?$item['imageurl']:'';
                  }   
              }
   
              if(isset($_POST['submit'])){
                  
                  $new_name = $_POST['name'];
                  $new_price = $_POST['price'];
                  $new_description = $_POST['description'];
                  $new_imageurl = $_POST['imageurl'];
   
                  if(empty($new_name) || empty($new_imageurl) || empty($new_price) || empty($new_description)){
                      $showAlert = 'Invalid Input. Please fill the form again.';
                  } else {
                      $app->action("UPDATE items SET name='$new_name', price='$new_price', description='$new_description', imageurl='$new_imageurl' WHERE id='$id' ");
                      header("Location:index.php?controller=product");
                  }
              }
              require_once "view/editproduct.php";
              break;
   
       case "delete":
               if(isset($_GET['id'])){
                   $id=$_GET['id'];
                   $app->action("DELETE from items where id='$id' ");
                   header("Location:index.php?controller=product");
               }
                break;
   
   
       default: $data = $app->executeQuery("SELECT * from items");
                require_once "view/index.php";
                break;
   }
   
   
   ?>
