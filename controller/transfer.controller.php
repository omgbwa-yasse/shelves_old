<?php
if($_GET['q'] = "transfer" && isset($_GET['categ'])){

    if($_GET['categ'] = 'search' && isset($_GET['sub'])){
        switch($_GET['sub']){
            case 'all' : include 'views/transfer/allTransfer.inc.php';
            break;
            case 'date' : include '';
            break;
            case 'reference' : include '';
            break;
            case 'organization' : include '';
            break;
            case 'user' : include '';
            break;
            case 'last' : include 'views/transfer/lastTransfer.inc.php';
            break;
            case 'transfer' : include 'views/transfer/transfer.inc.php';
            break;
        }
    }
    if($_GET['categ'] = 'create' && isset($_GET['sub'])){
        switch($_GET['sub']){
            case 'view' : include '';
            break;
            case 'add' : include 'views/transfer/addTransfer.inc.php';
            break;
            case 'save' : include 'views/transfer/saveTransfer.inc.php';
            break;
            case 'update' : include '';
            break;
            case 'delete' : include '';
            break;
            case 'saveRecord' : include 'views/transfer/transferSaveRecord.inc.php';
            break;
            case 'addRecord' : include 'views/transfer/TransferAddRecord.inc.php';
            break;
        }
    }

}


?>