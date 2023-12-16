
<?php
function displayTransfer($transfer){
        echo "<a href=\"index.php?q=transfer&categ=search&sub=transfer&id=".$transfer->getTransferId()."\">";
        echo $transfer->getTransferReference(). " - " .  $transfer->getTransferTitle() .  $transfer->getTransferDateAuthorize();
        echo "<a/>";
        echo "<hr/>";
    }
?>