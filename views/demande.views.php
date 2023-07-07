
<?php
include "template/sous_menu.inc.php";
?>

<p class="btnSousMenu">Recherche </p>
            <ul class="optionSousMenu">        
            <li>
                <a href="index.php?q=loan&categ=search&sub=allloan"> Toutes les demandes </a>
            </li>       
            <li>
                <a href="index.php?q=loan&categ=search&sub=organization"> Demande par Direction </a>
            </li>
            <li>
                <a href="index.php?q=loan&categ=search&sub=date"> Demande par date </a>
            </li>
            <li>
                <a href="index.php?q=loan&categ=search&sub=classification"> Demande par classe </a>
            </li>
            <li>
                <a href="index.php?q=loan&categ=search&sub=user"> Demande par utilisateurs </a>
            </li>   
        </ul>
        
        
        <p class="btnSousMenu">Demandes</p>
        <ul class="optionSousMenu">
            <li><a href="index.php?q=demande&categ=create&sub=new">Nouvelle demande </a></li>
            <li><a href="index.php?q=demande&categ=create&sub=last">Dernières demandes </a></li>
        </ul>
        <p class="btnSousMenu">Status</p>
        <ul class="optionSousMenu">
            <li><a href="index.php?q=dolly&categ=demande&sub=current"> En cours (15) </a></li>
            <li><a href="index.php?q=dolly&categ=demande&sub=cancel"> Annulée </a></li>
            <li><a href="index.php?q=dolly&categ=demande&sub="> A traiter (10) </a></li>
        </ul>
        
        <p class="btnSousMenu">Chariot</p>
        <ul class="optionSousMenu">
            <li><a href="index.php?q=dolly&categ=loan&sub=alldolly"> Tous les chariot de demande </a></li>
            <li><a href="index.php?q=dolly&categ=loan&sub=create"> Ajouter un chariot de demande </a></li>
        </ul>
<?php
include "template/container.inc.php";

if($_GET['q'] == "loan" && $_GET['categ'] == "search" && $_GET['sub'] == "allloan"){
    include "views/loan/allloan.inc.php";
}

?>
