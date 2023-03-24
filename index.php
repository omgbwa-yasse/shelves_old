<?php 
require_once 'models/allRecords.class.php';

$allRecords = new allRecords();

if(empty($_GET['page'])){
    require "views/accueil.views.php";
}else{
    switch ($_GET['page']){
            case "accueil" : require "views/accueil.views.php";
            break;
            case "Records" : $allRecords->getAllRecords();
            break;
        }
    }

?>