<?php 
require_once "models/transfer/transferManager.class.php";
require_once "views/transfer/search/displayTransfer.inc.php";

$transfers   = new transferManager();
$transfers = $transfers ->transferByDates($_POST['start'], $_POST['end']);
foreach($transfers as $transfer){
    $transfer = new transfer();
    $transfer -> hydrateById($id['id']);
    displayTransfer($transfer);
}

?>