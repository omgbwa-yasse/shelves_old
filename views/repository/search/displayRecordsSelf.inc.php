<?php
require_once 'models/repository/keyword.class.php';
require_once 'views/repository/records/display.inc.php';
require_once  'models/repository/record.class.php';

$record  = new record();
$record -> setRecordId($_GET['id']);
$record -> getRecordById();
displayRecord($record);
?>