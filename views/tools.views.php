<?php 
include "template/sous_menu.inc.php";
?>
<p>Charte d'archivage</p>
        <ul>
                <li><a href="#"> Visualiser</a></li>
                <li><a href="#"> Exporter </a></li>
        </ul>
<p>Plan de classement</p>
        <ul>
                <li><a href="index.php?q=tools&categ=classificationScheme&sub=mainClasses"> Plan de classement </a></li>
                <li><a href="index.php?q=tools&categ=classificationScheme&sub=addClass"> Ajouter une classe </a></li>
        </ul>
<p>Reférentiel de conservation</p> 
        <ul>       
                <li><a href="index.php?q=tools&categ=retention&sub=allDua"> Référentiel de conservation</a></li>     
                <li><a href="index.php?q=tools&categ=retention&sub=addDuaRule"> Ajouter une règles </a></li>
        </ul>
<p>Règles de communicabilité</p>
        <ul>    
                <li><a href="index.php?q=tools&categ=communicability&sub=allCommunicability"> Règle communicabilité </a></li>
                <li><a href="index.php?q=tools&categ=communicability&sub=addCommunicabilityRule"> Ajouter une règle </a></li>
        </ul>
<p>Classe d'accès</p>  
        <ul>      
                <li><a href="index.php?q=tools&categ=accessRule&sub=allAccess"> Classification pour l'accès </a></li>      
                <li><a href="index.php?q=tools&categ=accessRule&sub=addAccessRule"> Ajouter une règle d'accès </a></li>
        </ul>
<p>Organigramme</p>
        <ul> 
                <li><a href="index.php?q=tools&categ=organization&sub=allOrganization"> Organigramme </a></li>
                <li><a href="index.php?q=tools&categ=organization&sub=addOrganization"> Ajouter un service </a></li>
        </ul> 
<p>Thésaurus</p>
        <ul> 
                <li><a href="index.php?q=tools&categ=thesaurus&sub=allhome"> Voir le thésaurus </a></li>
                <li><a href="index.php?q=tools&categ=thesaurus&sub=addIndex"> Ajouter une index </a></li>
        </ul>

<?php
        include "template/container.inc.php";
        include "controller/tools.controller.php";
?>
