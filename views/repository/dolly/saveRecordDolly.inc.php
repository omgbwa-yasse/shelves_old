
<?php
require_once 'models/dolly/dollyRecord.class.php';

$dolly = new dollyRecord();
$dolly -> setDollyRecordTitle($_POST['dolly_title']);
$dolly -> setDollyRecordObservation($_POST['dolly_observation']);


echo $dolly -> getDollyRecordTitle();
echo $dolly -> getDollyRecordObservation();

$dolly -> saveDollyRecord();
?>