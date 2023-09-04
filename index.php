<?php 
session_start();
require_once 'models/session.class.php';
$access = new administrator(); 
if (isset($_COOKIE['pseudo'])){
   if ($access->userExist($_COOKIE['pseudo']))
   {
        include_once 'template/header.inc.php';
        include_once 'template/template.php';
        include_once 'controller/index.controller.php';
        menu();
        include "template/footer.inc.php";
        echo "</body></html>";
    }
  }else if($_GET['q'] == "session"){
    require_once 'controller/session.controller.php';
  }else{  
    header('Location: index.php?q=session&categ=user&sub=form');
  }
?>






