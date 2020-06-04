<?php 
   include "operation.php";

   $newApp = new Operation();
   if(isset($_GET['action'])){
       $action = $_GET['action'];
   } else {
       $action = "";
   }
   
   switch($action){
       case "add" : $alert = $newApp->store_record();
                    if(isset($alert)){
                        $showAlert = $alert;
                    }
                    require_once "view/addproduct.php";
                    break;
            
       case "edit" : 
              if(isset($_GET['id'])){ 
                 $id = $_GET['id'];
                 $result = $newApp->get_record($id);
                 foreach($result as $item){
                      $name = isset($item['name'])?$item['name']:'';
                      $price = isset($item['price'])?$item['price']:'';
                      $description = isset($item['description'])?$item['description']:'';
                      $imageurl =isset($item['imageurl'])?$item['imageurl']:'';
                      $id = $item['id'];
                  }   
              }
            $alert = $newApp->update();
            if(isset($alert)){
                $showAlert = $alert;
            }
            require_once "view/editproduct.php";
            break;
   
       case "delete": $newApp->delete_record($_GET['id']); break;
   
       default: $data = $newApp->executeQuery("SELECT * from items");
                require_once "view/index.php";
                break;
   }
   
   
   ?>
