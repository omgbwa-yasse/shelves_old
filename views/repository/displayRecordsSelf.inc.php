<?php
require_once 'models/repository/keyword.class.php';
require_once 'views/repository/display.inc.php';


$record  = new records();
$record -> setRecordId($_GET['id']);
$record -> getRecordById();
displayRecordLong($record);

/*
require_once 'models/repository/records.class.php';
require_once 'views/repository/displayRecord.inc.php';

echo $_GET['id'];
echo "Liste des ouvrages ...";
$record = new records();
$record -> setRecordId($_GET['id']);
$record -> getRecordById();
displayRecord($record); */

?>