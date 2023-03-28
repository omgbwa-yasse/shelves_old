<?php 
include "template/sous_menu.inc.php";
echo '
        <p>Depôt </p>
        <ul>
                <li><a href="/'.'../shelves/'.'index?q=deposit&categ=search&sub=all"/> Tous mes depôts </a></li>
                <li><a href="/'.'../shelves/'.'index?q=deposit&categ=deposit&sub=create"/> Nouveau depôt </a></li>
        </ul>
        
        <p>Mes Etagières</p>
        <ul>
                <li><a href="/'.'../shelves/'.'index?q=deposit&categ=search&sub=all"/> Mes Etagières </a></li>
                <li><a href="/'.'../shelves/'.'index?q=deposit&categ=shelves&sub=create"/> Nouvel étagière </a></li>
        </ul>
        
        <p> Mes contenants </p>
        <ul>
                <li><a href="/'.'../shelves/'.'index?q=deposit&categ=search&sub=all"/> Toutes les contenants </a></li>
                <li><a href="/'.'../shelves/'.'index?q=deposit&categ=container&sub=create"/> Nouveau Contenant </a></li>
        </ul>
        
        <p> Mes Chariots </p>
        <ul>
                <li><a href="/'.'../shelves/'.'index?q=dolly&categ=search&sub=all"/> Chariot contenant </a></li>
                <li><a href="/'.'../shelves/'.'index?q=dolly&categ=contain&sub=create"/> Nouveau Chariot de contenant </a></li>
        </ul>';

include "template/container.inc.php";
if($_GET['q'] == "repertoire" && $_GET['categ'] == "search" && $_GET['sub'] == "allrecords"){
        include "views/inventory/allrecords.inc.php";
    }
?>
