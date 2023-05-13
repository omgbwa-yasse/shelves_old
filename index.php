<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
    include 'views/session.views.php';
} else {
   
        include_once 'models/session.class.php';
        include_once 'template/header.inc.php';
        include_once 'template/template.php';
        include_once 'controller/index.controller.php';
        menu();
        include "template/footer.inc.php";
        echo "</body></html>";
    }

?>