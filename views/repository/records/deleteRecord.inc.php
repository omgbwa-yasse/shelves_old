<?php
    require_once 'models/repository/keyword.class.php';
    $del = new keyword();
    $del -> setRecordId($_GET['id']);
    $del -> deleteKeyword();
    $del -> deleteRecord($_GET['id']);

?>