<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    include 'views/session.views.php';
} else {
    if (isset($_SESSION['login']) && !empty($_SESSION['login'])) {
        include_once 'models/session.class.php';
        include_once 'template/header.inc.php';
        include_once 'template/template.php';
        include_once 'controller/index.controller.php';
        menu();
        include "template/footer.inc.php";
        echo "</body></html>";
    }

?>