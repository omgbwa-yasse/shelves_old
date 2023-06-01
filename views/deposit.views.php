<?php 
include "template/sous_menu.inc.php";
?>

<p>Contenant </p>
<ul>
        <li><a href="index.php?q=deposit&categ=container&sub=all"> Toutes les contenants </a></li>
        <li><a href="index.php?q=deposit&categ=container&sub=add"> Nouveau Contenant </a></li>
        <li><a href="index.php?q=deposit&categ=containerProperty&sub=all">  Nouveau format </a></li>
</ul>
<p>Epis </p>
<ul>
        <li><a href="index.php?q=deposit&categ=shelve&sub=all"> Toutes les Epis </a></li>
        <li><a href="index.php?q=deposit&categ=shelve&sub=add"> Nouvel étagière </a></li>
</ul>
<p>Salle </p>
<ul>
        <li><a href="index.php?q=deposit&categ=room&sub=all"> Tous les salles </a></li>
        <li><a href="index.php?q=deposit&categ=room&sub=add"> Nouvelle salle </a></li>
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
