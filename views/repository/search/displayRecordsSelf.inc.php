<?php
require_once 'models/repository/keyword.class.php';
require_once 'views/repository/records/display.inc.php';
require_once  'models/repository/record.class.php';

echo "Nous sommes ici". $_GET['id'];
$record  = new record();
$record -> setRecordId($_GET['id']);
$record -> getRecordById();
displayRecordLong(19);
?>