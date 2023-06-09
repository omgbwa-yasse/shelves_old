<?php 
include "template/sous_menu.inc.php";
?>

    <p>Rechercher</p>
    <ul>
    <li><a href="index.php?q=dolly&categ=records&sub=allTypeDolly"> Tous les types de chariots </a></li>
    <li><a href="index.php?q=dolly&categ=search&sub=allRecords"> Chariots des enregistrements </a></li>
    <li><a href="index.php?q=dolly&categ=transfert"> Chariots de transferts </a></li>
    <li><a href="index.php?q=dolly&categ=container"> Chariots de Dépôts </a></li>
    <li><a href="index.php?q=dolly&categ=container"> Chariots de contenants </a></li>
    <li><a href="index.php?q=dolly&categ=container"> Chariots de épis </a></li>
    <li><a href="index.php?q=dolly&categ=loan"> Chariots de demandes </a></li>
    </ul>

    <p>Ajouter un chariot</p>
    <ul>
    <li><a href="index.php?q=dolly&categ=create&sub=addRecords"> Enregistrement </a></li>
    <li><a href="index.php?q=dolly&categ=transfert"> Transfert </a></li>
    <li><a href="index.php?q=dolly&categ=container"> Contenant </a></li>
    <li><a href="index.php?q=dolly&categ=loan"> Demande </a></li>
    </ul>

<?php
include "template/container.inc.php";
if($_GET['q'] == "dolly" && $_GET['categ'] == "search" && $_GET['sub'] == "allTypeDolly"){
    include "views/dolly/allTypeDolly.inc.php";
}
?>
