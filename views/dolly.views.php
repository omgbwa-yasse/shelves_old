<?php 
include "template/sous_menu.inc.php";
?>

    <p>Chariot des enregistrements</p>
    <ul>
    <li><a href="../shelves/index?q=dolly&categ=records&sub=allTypeDolly"> Tous types de chariots </a></li>
    <li><a href="../shelves/index?q=dolly&categ=search&sub=allRecords"> Tous les chariots </a></li>
    <li><a href="../shelves/index?q=dolly&categ=create&sub=addRecords"> Ajouter un chariot </a></li>
    </ul>

    <p>Chariot des versements</p>
    <ul>
    <li><a href="../shelves/index?q=dolly&categ=transfert"> Tous les chariots </a></li>
    <li><a href="../shelves/index?q=dolly&categ=transfert"> Ajouter un chariot </a></li>
    </ul>

    <p>Chariot de contenants</p>
    <ul>
    <li><a href="../shelves/index?q=dolly&categ=container"> Tous les chariots </a></li>
    <li><a href="../shelves/index?q=dolly&categ=container"> Ajouter un chariot </a></li>
    </ul>

    <p>Chariot de demandes</p>
    <ul>
    <li><a href="../shelves/index?q=dolly&categ=loan"> Tous les chariots </a></li>
    <li><a href="../shelves/index?q=dolly&categ=loan"> Ajouter un chariot </a></li>
    </ul>

<?php
include "template/container.inc.php";
if($_GET['q'] == "dolly" && $_GET['categ'] == "search" && $_GET['sub'] == "allTypeDolly"){
    include "views/dolly/allTypeDolly.inc.php";
}
?>
