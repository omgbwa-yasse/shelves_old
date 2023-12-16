<?php
if($_GET['q'] == "transfer"){

    /* redirige si il y'a pas de categorie */
    if(empty($_GET['categ'])){
        include 'views/transfer/allTransfer.inc.php';
    }else{
    
    // Partie recherche
            if($_GET['q'] = "transfer" && $_GET['categ'] = 'search' && isset($_GET['sub'])){
                    switch($_GET['sub']){
                        case 'all' : include 'views/transfer/allTransfer.inc.php';
                        break;
                        case 'date' : include 'views/transfer/search/transferByDate.inc.php';
                        break;
                        case 'reference' : echo "Rechercher par reference";
                        break;
                        case 'organization' : echo "Rechercher par organisation";
                        break;
                        case 'user' : echo "Rechercher par utilisateur";
                        break;
                        case 'last' : echo "les derniers transfert";
                        break;
                        case 'transfer' : echo "le transfert";
                        break;
                    }
                }

            // Affichage du resultat de la recherche
            if($_GET['q'] = "transfer" && $_GET['categ'] = 'display' && isset($_GET['sub'])){
                    switch($_GET['sub']){
                        case 'all' : include 'views/transfer/allTransfer.inc.php';
                        break;
                        case 'date' : echo 'afficher par date';
                        break;
                        case 'reference' : echo "Afficher par reference";
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
        }

?>