<?php 
    include "template/sous_menu.inc.php"; 
    
?>
<p class="btnSousMenu">Recherche</p>
<ul class="optionSousMenu">        
    <li>
    <a href="index.php?q=repository&categ=search&sub=allrecords"> Tous les enregistrements </a>
    </li>
    <li>
    <a href="index.php?q=repository&categ=search&sub=allOrganization"> Recherche par detenteur </a>
    </li>
    <li>
    <a href="index.php?q=repository&categ=search&sub=byDateForm"> Recherche par date </a>
    </li>
    <li>
    <a href="index.php?q=repository&categ=search&sub=byKeyword"> Recherche par mots-clés </a>
    </li>
    <li>
    <a href="index.php?q=repository&categ=search&sub=selectClasse"> Recherche par classe </a>
    </li>
    <li>
    <a href="index.php?q=repository&categ=search&sub=AllDeposit"> Recherche par dépôt </a>
    </li>
</ul>
        
<p class="btnSousMenu">Enregistrements</p>
<ul class="optionSousMenu">
    <li><a href="index.php?q=repository&categ=create&sub=new">Nouvel enregistrement </a></li>
    <li><a href="index.php?q=repository&categ=search&sub=last">Derniers enregistrements </a></li>
    <li><a href="index.php?q=repository&categ=recordInContainer&sub=link">Inserer dans un contenant</a></li>
</ul>
            
<p class="btnSousMenu">Chariot</p>
<ul class="optionSousMenu">
    <li><a href="index.php?q=repository&categ=dolly&sub=all"> Gestion </a></li>
    <li><a href="index.php?q=repository&categ=dolly&sub=create"> Ajouter </a></li>
</ul>
<p class="btnSousMenu">Import</p>
<ul class="optionSousMenu">
    <li><a href="index.php?q=dolly&categ=container&sub=#"> Importer Excel </a></li>
    <li><a href="index.php?q=dolly&categ=container&sub=#"> Import EAD</a></li>
    <li><a href="index.php?q=dolly&categ=container&sub=#"> Import CVS</a></li>
</ul>


<?php
    include_once "template/container.inc.php";
    include_once "controller/repository.controller.php";
    
    
?>


