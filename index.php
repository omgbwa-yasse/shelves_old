<?php
include_once 'models/session.class.php';
include_once "template/header.inc.php";
include_once 'template/template.php';
include_once 'controller/index.controller.php';

if(empty($_GET['q'])){
        menu();
        }else{ 
        menu(); 
}
         
include "template/footer.inc.php"; 
?>
</body>
</html>
