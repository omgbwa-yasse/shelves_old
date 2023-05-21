<?php 
include "template/sous_menu.inc.php";
?>
<p>Recherche </p>
<ul>
        <li><a href="index.php?q=deposit&categ=room&sub=all"> Tous les salles </a></li>
        <li><a href="index.php?q=deposit&categ=search&sub=all"> Mes Etagières </a></li>
        <li><a href="index.php?q=deposit&categ=search&sub=all"> Toutes les contenants </a></li>

</ul>
        
<p> Ajouter un espace </p>
<ul>
        <li><a href="index.php?q=deposit&categ=room&sub=add"> Nouvelle salle </a></li>
        <li><a href="index.php?q=deposit&categ=shelve&sub=add"> Nouvel étagière </a></li>
        <li><a href="index.php?q=deposit&categ=container&sub=add"> Nouveau Contenant </a></li>
</ul>
<p> Chariots </p>
<ul>
        <li><a href="index.php?q=dolly&categ=contain&sub=create"> Nouveau Chariot de contenant </a></li>
        <li><a href="index.php?q=dolly&categ=search&sub=all"> Tous les Chariot contenant </a></li>
</ul>
<?php
        include "template/container.inc.php";
        include_once 'controller/deposit.controller.php';
?>
