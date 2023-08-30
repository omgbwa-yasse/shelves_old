<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="template/css/style.css"> 
</head>

<?php
session_start();
// if(empty($_GET['q'])){
//     header('Location: index.php?q=session&categ=user&sub=form');
// }
if (true) {  //isset($_GET['q'])
    
        if (false) { //$_GET['q'] == 'session'
            include_once 'models/session.class.php';
            require_once 'controller/session.controller.php';
        }else if(isset($_GET['q']) && $_GET['q'] != NULL){ 
            include_once 'template/header.inc.php';
            include_once 'template/template.php';
            include_once 'controller/index.controller.php';
            menu(); 
            include "template/footer.inc.php";
            echo "</body></html>"; 
        }}

?>







