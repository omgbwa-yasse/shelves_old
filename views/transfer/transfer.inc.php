<?php
    require_once "models/transfer/transfer.class.php";
    require_once "views/transfer/displayTransfer.inc.php";
    $transfer = new transfer();
    $transfer ->hydrateById($_GET['id']);
?>
<h1>bordereau de transfert n° <?= $transfer->getTransferReference()?></h1>
<?php
    displayTransfer($_GET['id']);
?>