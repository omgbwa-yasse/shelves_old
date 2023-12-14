<?php
require_once "models/transfer/transfer.class.php";
$transfer = new transfer();
$transfer->hydrateById($_GET['id']);
echo "<h1> Transfer n°". $transfer->getTransferReference() ." - ". $transfer->getTransferTitle() . "</h1>";

?>
<a href="index.php?q=transfer&categ=search&sub=transfer&id=<?=$transfer->getTransferId()?>">Voir le bordereau de transfert</a>
<form method="POST" action="index.php?q=transfer&categ=create&sub=saveRecord&id=<?= $_GET['id']?>">
    <?php
        include 'views/transfer/TransferRecordForm.inc.php';
    ?>
</form>