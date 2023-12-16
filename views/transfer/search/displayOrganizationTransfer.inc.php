<?php  
require_once "models/transfer/transferManager.class.php";
require_once "views/transfer/search/displayTransfer.inc.php";
require_once "models/transfer/transfer.class.php";

$transfers = new transferManager();
$transfers = $transfers -> transferByOrganization($_GET['id']);
foreach($transfers as $id){
    $transfer = new transfer();
    $transfer -> hydrateById($id['id']);
    displayTransfer($transfer);
}



?>