<?php
require_once 'models/repository/keyword.class.php';
require_once 'views/repository/records/display.inc.php';


$record  = new records();
$record -> setRecordId($_GET['id']);
$record -> getRecordById();
displayRecordLong($record);



?>