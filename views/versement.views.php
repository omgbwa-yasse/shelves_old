
<?php 
include "template/sous_menu.inc.php";
echo '
        <p class="btnSousMenu">Recherche</p>
        <ul class="optionSousMenu">
                <li><a href="index.php?q=versement&categ=search&sub=allversement"/> Tous les recherche </a></li>
                <li><a href="index.php?q=versement&categ=search&sub=reference"/> Recherche par n° versement </a></li>
                <li><a href="index.php?q=versement&categ=search&sub=date"/> Recherche par date </a></li>
                <li><a href="index.php?q=versement&categ=search&sub=detenteur"/> Recherche par detenteur</a></li>
        </ul>
        <p class="btnSousMenu">Versement</p>
        <ul class="optionSousMenu">
                <li><a href="index.php?q=versement&categ=create"/> Nouveau versement </a></li>
                <li><a href="index.php?q=versement&categ=search&sub=lastversement"/>Derniers versements </a></li>
        </ul>
         <p class="btnSousMenu">Chariot</p>
        <ul class="optionSousMenu">
                <li><a href="index.php?q=dolly&categ=transfert&sub=allversement"/>Tous les chariot de versements</a></li>
                <li><a href="index.php?q=dolly&categ=transfert&sub=create"/> Ajouter chariot de versements</a></li>        
                </ul>
';
if($_GET['q'] == "versement" && $_GET['categ'] == "search" && $_GET['sub'] == "alltransfert"){
        include "views/transfer/allTransfer.inc.php";
}


include "template/container.inc.php";
?>
