<?php
if($_GET['q'] == "session" && $_GET['categ'] == "user"){
    switch($_GET['sub']){
        case 'accessControl' : include 'views/connexion/userAccessControl.views.php';
        break;
        case 'form' : include 'views/connexion/connexionForm.views.php';
        break;
        case 'add' : include 'views/connexion/addUser.views.php';
        break;
        case 'deconnexion' : include 'views/connexion/userDeconnect.views.php';
        break;
        case 'welcome' : include 'views/connexion/userWelcomeMessage.views.php';
        break;
        case 'addControl' : include 'views/connexion/addUserControl.views.php';
        break;
        default : include 'views/error.views.php';
    }}
?>