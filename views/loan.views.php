<?php 
include "template/sous_menu.inc.php";
?>

<p class="btnSousMenu">Recherche </p>
<ul class="optionSousMenu">
        <li><a href="index.php?q=loan&categ=search&sub=all"> Toutes les demandes </a></li>
        <li><a href="index.php?q=loan&categ=search&sub=organization"> Demandes par organisation </a></li>
        <li><a href="index.php?q=loan&categ=search&sub=date"> Demandes par date </a></li>
        <li><a href="index.php?q=loan&categ=search&sub=user"> Demandes par utilisateur </a></li>
        <li><a href="index.php?q=loan&categ=search&sub=last"> Derniers</a></li> 
</ul>
<p class="btnSousMenu">Demande</p>
<ul class="optionSousMenu">
        <li><a href="index.php?q=loan&categ=create&sub=add"> Nouvelle demande </a></li>
         
</ul>
<p class="btnSousMenu"> Statut </p>
<ul class="optionSousMenu">
        <li><a href="index.php?q=loan&categ=status&sub=ask">A traiter </a></li>
        <li><a href="index.php?q=loan&categ=status&sub=current"> En cours </a></li>
        <li><a href="index.php?q=loan&categ=status&sub=cancel"> Annuler </a></li>
        <li><a href="index.php?q=loan&categ=status&sub=archives"> Archives </a></li>      
</ul>
<p class="btnSousMenu"> Chariot </p>
<ul class="optionSousMenu">
        <li><a href="index.php?q=dolly&categ=search&sub=all"> Tous les Chariot contenant </a></li>  
        <li><a href="index.php?q=dolly&categ=contain&sub=create"> Nouveau Chariot de contenant </a></li>      
</ul>
<?php
        include "template/container.inc.php";
        include_once 'controller/loan.controller.php';
?>
