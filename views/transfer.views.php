
<?php 
include "template/sous_menu.inc.php";
echo '
        <p class="btnSousMenu">Recherche</p>
        <ul class="optionSousMenu">
                <li><a href="index.php?q=transfer&categ=search&sub=all"/> Tous les recherche </a></li>
                <li><a href="index.php?q=transfer&categ=search&sub=reference"/> Recherche par n° transfert </a></li>
                <li><a href="index.php?q=transfer&categ=search&sub=date"/> Recherche par date </a></li>
                <li><a href="index.php?q=transfer&categ=search&sub=organization"/> Recherche par detenteur</a></li>
        </ul>
        <p class="btnSousMenu">Versement</p>
        <ul class="optionSousMenu">
                <li><a href="index.php?q=transfer&categ=create&sub=add"/> Nouveau transfert </a></li>
                <li><a href="index.php?q=transfer&categ=search&sub=last"/> Derniers transferts </a></li>
        </ul>
         <p class="btnSousMenu">Chariot</p>
        <ul class="optionSousMenu">
                <li><a href="index.php?q=dolly&categ=transfert&sub=alltransfer"/>Tous les chariots de transfers</a></li>
                <li><a href="index.php?q=dolly&categ=transfert&sub=create"/> Ajouter chariot de transfers</a></li>        
                </ul>
';
if($_GET['q'] == "transfer" && $_GET['categ'] == "search" && $_GET['sub'] == "alltransfert"){
        include "views/transfer/allTransfer.inc.php";
}


include "template/container.inc.php";
include_once "controller/transfer.controller.php";
?>
