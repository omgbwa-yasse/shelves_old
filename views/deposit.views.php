<?php 
include "template/sous_menu.inc.php";
?>
<p>Recherche </p>
<ul>
        <li><a href="index.php?q=deposit&categ=search&sub=all"> Tous mes depôts </a></li>
        <li><a href="index.php?q=deposit&categ=search&sub=all"> Mes Etagières </a></li>
        <li><a href="index.php?q=deposit&categ=search&sub=all"> Toutes les contenants </a></li>

</ul>
        
<p> Ajouter un espace </p>
<ul>
        <li><a href="index.php?q=deposit&categ=deposit&sub=create"> Nouveau depôt </a></li>
        <li><a href="index.php?q=deposit&categ=shelves&sub=create"> Nouvel étagière </a></li>
        <li><a href="index.php?q=deposit&categ=container&sub=create"> Nouveau Contenant </a></li>
</ul>
<p> Chariots </p>
<ul>
        <li><a href="index.php?q=dolly&categ=contain&sub=create"> Nouveau Chariot de contenant </a></li>
        <li><a href="index.php?q=dolly&categ=search&sub=all"> Tous les Chariot contenant </a></li>
</ul>
<?php
include "template/container.inc.php";
if($_GET['q'] == "repertoire" && $_GET['categ'] == "search" && $_GET['sub'] == "allrecords"){
        include "views/inventory/allrecords.inc.php";
    }
?>
