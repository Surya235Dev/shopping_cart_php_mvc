<?php 

include "./model/main.php";
$app = new Main();       

if(isset($_GET['controller'])){
    $controller = $_GET['controller'];
} else {
    $controller = "";
}

switch($controller)
{
 case 'product': 
          require_once "controller/index.php";
          break;
 default:
         require_once "controller/index.php";
         break;
}

?>