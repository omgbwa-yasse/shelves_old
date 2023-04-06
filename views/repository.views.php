<?php include "template/sous_menu.inc.php"; ?>


<p>Recherche</p>
<ul>        
    <li>
    <a href="../shelves/index.php?q=repository&categ=search&sub=allrecords"> Tous les enregistrements </a>
    </li>
    <li>
    <a href="../shelves/index.php?q=repository&categ=search&sub=byOrganization"> Recherche par detenteur </a>
    </li>
    <li>
    <a href="../shelves/index.php?q=repository&categ=search&sub=byDate"> Recherche par date </a>
    </li>
    <li>
    <a href="../shelves/index.php?q=repository&categ=search&sub=byKeyword"> Recherche par mots-clés </a>
    </li>
    <li>
    <a href="../shelves/index.php?q=repository&categ=search&sub=byClasse"> Recherche par classe </a>
    </li>
</ul>
        
<p>Enregistrements</p>
<ul>
    <li><a href="../shelves/index.php?q=repository&categ=create&sub=new">Nouvel enregistrement </a></li>
    <li><a href="../shelves/index.php?q=repository&categ=create&sub=last">Derniers enregistrements </a></li>
</ul>
            
<p>Chariot</p>
<ul>
    <li><a href="../shelves/index.php?q=dolly&categ=container&sub=alldolly"> Tous les chariot de description </a></li>
    <li><a href="../shelves/index.php?q=dolly&categ=container&sub=create"> Ajouter un chariot de description </a></li>
</ul>

<?php

include "template/container.inc.php";
if($q == "repository" && $_GET['categ'] == "search" && $_GET['sub'] == "allrecords"){
    include "views/inventory/allrecords.inc.php";
}
if($q == "repository" && $_GET['categ'] == "create" && $_GET['sub'] == "new"){
    include "views/inventory/createRecords.inc.php";
}
if($q == "repository" && $_GET['categ'] == "create" && $_GET['sub'] == "newSave"){
    include "views/inventory/saveRecords.inc.php";
}
if($q == "repository" && $_GET['categ'] == "create" && $_GET['sub'] == "last"){
    include "views/inventory/lastRecords.inc.php";
}
if($q == "repository" && $_GET['categ'] == "search" && $_GET['sub'] == "byClasse"){
    include "views/inventory/searchByClasse.inc.php";
}
if($q == "repository" && $_GET['categ'] == "search" && $_GET['sub'] == "byKeyword"){
    include "views/inventory/searchAllKeyword.inc.php";
}
if($q == "repository" && $_GET['categ'] == "search" && $_GET['sub'] == "Keyword" && !empty($_GET['id']) ){
    include "views/inventory/searchByKeyword.inc.php";
}
if($q == "repository" && $_GET['categ'] == "search" && $_GET['sub'] == "byDate"){
    include "views/inventory/searchByDate.inc.php";
}
if($q == "repository" && $_GET['categ'] == "search" && $_GET['sub'] == "byOrganization"){
    include "views/inventory/searchByOrganization.inc.php";
}

?>


