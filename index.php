<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    header ('Location:index.php?q=connexion&categ=user&sub=form');
} else {
    if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
        include_once 'models/session.class.php';
        include_once 'template/header.inc.php';
        include_once 'template/template.php';
        include_once 'controller/index.controller.php';
        menu ();
        include "template/footer.inc.php";
        echo "</body></html>";
    }
}
?>