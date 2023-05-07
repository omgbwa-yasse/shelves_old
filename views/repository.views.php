<?php 
    include "template/sous_menu.inc.php"; 
    
?>
<p>Recherche</p>
<ul>        
    <li>
    <a href="index.php?q=repository&categ=search&sub=allrecords"> Tous les enregistrements </a>
    </li>
    <li>
    <a href="index.php?q=repository&categ=search&sub=byOrganization"> Recherche par detenteur </a>
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
</ul>
        
<p>Enregistrements</p>
<ul>
    <li><a href="index.php?q=repository&categ=create&sub=new">Nouvel enregistrement </a></li>
    <li><a href="index.php?q=repository&categ=search&sub=last">Derniers enregistrements </a></li>
</ul>
            
<p>Chariot</p>
<ul>
    <li><a href="index.php?q=dolly&categ=container&sub=alldolly"> Gestion </a></li>
    <li><a href="index.php?q=dolly&categ=container&sub=create"> Ajouter </a></li>
</ul>
<p>Import</p>
<ul>
    <li><a href="index.php?q=dolly&categ=container&sub=#"> Importer Excel </a></li>
    <li><a href="index.php?q=dolly&categ=container&sub=#"> Import EAD</a></li>
    <li><a href="index.php?q=dolly&categ=container&sub=#"> Import CVS</a></li>
</ul>


<?php
    include_once "template/container.inc.php";
    include_once "controller/repository.controller.php";
    
    
?>


