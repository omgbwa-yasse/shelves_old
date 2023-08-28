<?php
require_once 'models/dolly/dollyRecord.class.php';

$list = htmlspecialchars($_POST['listRecords']);
$list = explode("\n", $list);

echo $_GET['id'] . " chariot <br/>";

$dolly = new dollyRecord();
foreach ($list as $record) {
    echo $record;
    $record = htmlspecialchars_decode($record);
    $dolly -> linkDollyRecordToRecord($_GET['id'], $record);
}

?>
