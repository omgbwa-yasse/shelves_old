<?php include "template/sous_menu.inc.php"; ?>


<p>Recherche</p>
<ul>        
    <li>
    <a href="home.php?q=repository&categ=search&sub=allrecords"> Tous les enregistrements </a>
    </li>
    <li>
    <a href="home.php?q=repository&categ=search&sub=byOrganization"> Recherche par detenteur </a>
    </li>
    <li>
    <a href="home.php?q=repository&categ=search&sub=byDateForm"> Recherche par date </a>
    </li>
    <li>
    <a href="home.php?q=repository&categ=search&sub=byKeyword"> Recherche par mots-clés </a>
    </li>
    <li>
    <a href="home.php?q=repository&categ=search&sub=selectClasse"> Recherche par classe </a>
    </li>
</ul>
        
<p>Enregistrements</p>
<ul>
    <li><a href="home.php?q=repository&categ=create&sub=new">Nouvel enregistrement </a></li>
    <li><a href="home.php?q=repository&categ=create&sub=last">Derniers enregistrements </a></li>
</ul>
            
<p>Chariot</p>
<ul>
    <li><a href="home.php?q=dolly&categ=container&sub=alldolly"> Gestion </a></li>
    <li><a href="home.php?q=dolly&categ=container&sub=create"> Ajouter </a></li>
</ul>
<p>Import</p>
<ul>
    <li><a href="home.php?q=dolly&categ=container&sub=#"> Importer Excel </a></li>
    <li><a href="home.php?q=dolly&categ=container&sub=#"> Import EAD</a></li>
    <li><a href="home.php?q=dolly&categ=container&sub=#"> Import CVS</a></li>
</ul>


<?php

include "template/container.inc.php";
    /* Case create */



if($q == "repository" && $_GET['categ'] == "create" && isset($_GET['sub'])){
    switch($_GET['sub']){
        case "new" : include "views/repository/createRecords.inc.php";
        break ;
        case "newSave" : include "views/repository/saveRecords.inc.php";
        break ;
        case "update" : include "views/repository/updateRecords.inc.php";
        break ;
        case "delete" : include "views/repository/deleteRecord.inc.php"; 
        break ;
        case "last" : include "views/repository/lastRecords.inc.php";
        break ;

    }
}

/* Case search */
if($q == "repository" && $_GET['categ'] == "search" && isset($_GET['sub'])){
    switch($_GET['sub']){
        case "allrecords" : include "views/repository/allrecords.inc.php";
        break ;
        case "selectClasse" : include "views/repository/selecteClasse.inc.php"  ;
        break ;
        case "byClasse" : include "views/repository/searchByClasse.inc.php";
        break ;  
        case "byClasseId" : include "views/repository/searchByClasseId.inc.php";
        break ;
        case "byKeyword" : include "views/repository/searchAllKeyword.inc.php";
        break ;
        case "byKeywordId" :  include "views/repository/searchByKeywordId.inc.php";
        break ;
        case "searchByKeyword" : include "views/repository/searchByKeyword.inc.php" ;
        break ;
        case "byDateForm" : include "views/repository/searchRecordsByDates.inc.php";
        break ;
        case "byOrganization" : include "views/repository/searchByOrganization.inc.php";
        break ;
        case "byDatesResult" : include "views/repository/displayRecordsByDates.inc.php";
        break ;
        case "default" : include "views/repository/displayQuery.inc.php";
        break ;
    }}
?>


