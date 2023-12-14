<h1>List des bordereaux de transfert</h1>
<?php
require_once "models/transfer/transferManager.class.php";
require_once "models/transfer/transfer.class.php";

$list = new transferManager();
$list = $list ->allTransfer();
foreach($list as $id){
   
    $transfer = new transfer();
    $transfer ->hydrateById($id['id']);
    echo "<a href=\"index.php?q=transfer&categ=search&sub=transfer&id=".$transfer->getTransferId()."\">";
    echo $transfer->getTransferReference(). " - " .  $transfer->getTransferTitle() .  $transfer->getTransferDateAuthorize();
    echo "<a/>";
    echo "<hr/>";
}


?>