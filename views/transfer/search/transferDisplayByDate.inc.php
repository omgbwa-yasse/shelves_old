<?php
    require_once "models/transfer/transferManager.class.php";
    require_once "views/transfer/search/displayTransfer.inc.php";
    
    $transfers = new transferManager();
    $transfers = $transfers -> getTransferByDates(isset($_POST['start']), isset($_POST['end']));
    foreach($transfers as $id){
        $transfer = new transfer();
        $transfer -> hydrateById($id['id']);
        displayTransfer($transfer);
    }



?>