<?php 
 
 include_once "template/header.inc.php"; 
 include_once 'template/template.php';
 

if(isset($q)){
    switch($q){
        case "repertoire" : include '../shelves/views/repertoire.views.php';
        break;
        case "versement" : include '../shelves/views/versement.views.php';
        break;
        case "loan" : include '../shelves/views/demande.views.php';
        break;
        case "deposit" : include '../shelves/views/deposit.views.php';
        break;
        case "dolly" : include '../shelves/views/dolly.views.php';
        break;
        case "outilsGestion" : include '../shelves/views/outilsGestion.views.php';
        break;
        case "parametre" : include '../shelves/views/parametre.views.php';
        break;
    }
} 

include "template/footer.inc.php"; 

?>