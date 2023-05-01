<?php 
 
 include_once "template/header.inc.php"; 
 include_once 'template/template.php';

if($_GET['categ'] == NULL && $_GET['sub'] == NULL){
    header ('location:../shelves/index.php?q='.$q.'&categ=search&sub=allrecords') ;
} 
else if(isset($q)){
    switch($q){
        case "repository" : include 'views/repository.views.php';
        break;
        case "versement" : include 'views/versement.views.php';
        break;
        case "loan" : include 'views/demande.views.php';
        break;
        case "deposit" : include 'views/deposit.views.php';
        break;
        case "dolly" : include 'views/dolly.views.php';
        break;
        case "audit" : include 'views/audit.views.php';
        break;
        case "outilsGestion" : include 'views/outilsGestion.views.php';
        break;
        case "parametre" : include 'views/parametre.views.php';
        break;
        default :include 'views/repository.views.php';
        break;
    }
} 

include "template/footer.inc.php"; 

?>