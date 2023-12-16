<?php
if($_GET['q'] == "transfer"){
    // Partie recherche
            if($_GET['categ'] = 'search'){
                    switch($_GET['sub']){
                        case 'all' : include 'views/transfer/allTransfer.inc.php';
                        break;
                        case 'selectDates' : include 'views/transfer/search/transferByDate.inc.php';
                        break;
                        case 'date' : include 'views/transfer/search/displayTransferByDate.inc.php';
                        break;
                        case 'reference' : include 'views/transfer/search/searchTransferByReference.inc.php';
                        break;
                        case 'allOrganization' : include "views/transfer/search/transferByOrganization.inc.php";
                        break;
                        case 'organization' : include "views/transfer/search/displayOrganizationTransfer.inc.php";
                        break;
                        case 'user' : echo "Rechercher par utilisateur";
                        break;
                        case 'last' : include "views/transfer/lastTransfer.inc.php";
                        break;
                        case 'transfer' : include "views/transfer/transfer.inc.php";
                        break;
                    }
                }

            // Creation des transferts
            if($_GET['q'] = "transfer" && $_GET['categ'] = 'create' && isset($_GET['sub'])){
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