<?php
if($_GET['q'] == "session" && $_GET['categ'] == "user"){
    switch($_GET['sub']){
        case 'addUser' : include('views/connexion/addUser.views.php');
        break;
        case 'verifyUser' : include('views/connexion/verifyUser.views.php');
        break;
        case 'access' : include('views/connexion/accessUser.views.php');
        break;
        case 'form' : include('views/connexion/connexionForm.views.php');
        break;
        default : include('views/connexion/session.views.php');
    }}
?>