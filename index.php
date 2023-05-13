<?php
 /*if(session_status() == PHP_SESSION_NONE){
    session_start();
    $_SESSION['pseudo'] = NULL;
    $_SESSION['identify'] = 0;
    header('Location:index.php?q=session&categ=user&sub=form');
}else{
    include_once 'controller/session.controller.php';
    if(isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo']) && $_SESSION['identify'] == 1){
        include_once 'models/session.class.php';
        include_once 'template/header.inc.php';
        include_once 'template/template.php';
        include_once 'controller/index.controller.php';
        menu();
        include "template/footer.inc.php";
        echo "</body></html>";
    }else{
        header('Location:index.php?q=session&categ=user&sub=form');
    }}*/
if($_GET['q']=='session'){ 
    include_once 'controller/session.controller.php'; 
}
?>