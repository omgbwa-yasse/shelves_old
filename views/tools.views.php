<?php 
include "template/sous_menu.inc.php";
?>
<p class="btnSousMenu">Charte d'archivage</p>
        <ul class="optionSousMenu">
                <li><a href="index.php?q=tools&categ=chart&sub=viewCharter"> Visualiser</a></li>
                <li><a href="index.php?q=tools&categ=chart&sub=export"> Exporter </a></li>
        </ul>
<p class="btnSousMenu">Plan de classement</p>
        <ul class="optionSousMenu">
                <li><a href="index.php?q=tools&categ=classificationScheme&sub=mainClasses"> Plan de classement </a></li>
                <li><a href="index.php?q=tools&categ=classificationScheme&sub=addMainClass"> Ajouter une branche </a></li>
                <li><a href="index.php?q=tools&categ=classificationScheme&sub=addClass"> Ajouter une classe </a></li>
        </ul>
<p class="btnSousMenu">Reférentiel de conservation</p> 
        <ul class="optionSousMenu">       
                <li><a href="index.php?q=tools&categ=retention&sub=all"> Référentiel de conservation</a></li>     
                <li><a href="index.php?q=tools&categ=retention&sub=add"> Ajouter une règles </a></li>
                <li><a href="index.php?q=tools&categ=retentionsort&sub=allretentionsort"> Tri de conservation</a></li>     
                <li><a href="index.php?q=tools&categ=retentionsort&sub=addretentionsort"> Ajouter un tri de conservation </a></li>
        </ul>
<p class="btnSousMenu">Règles de communicabilité</p>
        <ul class="optionSousMenu">    
                <li><a href="index.php?q=tools&categ=communicability&sub=allrule">toute les  Règle de  communicabilité </a></li>
                
                <li><a href="index.php?q=tools&categ=communicability&sub=addrule"> Ajouter une règle </a></li>
        </ul>
<p class="btnSousMenu">Classe d'accès</p>  
        <ul class="optionSousMenu">      
                <li><a href="index.php?q=tools&categ=accessRule&sub=allAccess"> Classification pour l'accès </a></li>      
                <li><a href="index.php?q=tools&categ=accessRule&sub=addAccessclass"> Ajouter une règle d'accès </a></li>
                
        </ul>
<p class="btnSousMenu">Organigramme</p>
        <ul class="optionSousMenu"> 
                <li><a href="index.php?q=tools&categ=organization&sub=allOrganization"> Organigramme </a></li>
                <li><a href="index.php?q=tools&categ=organization&sub=addOrganization"> Nouvelle organisation </a></li>
                <li><a href="index.php?q=tools&categ=organization&sub=addOrganizationUnit"> Nouveau service </a></li>
        </ul> 
<p class="btnSousMenu">Thésaurus</p>
        <ul class="optionSousMenu"> 
                <li><a href="index.php?q=tools&categ=thesaurus&sub=allhome"> Voir le thésaurus </a></li>
                <li><a href="index.php?q=tools&categ=thesaurus&sub=addIndex"> Ajouter une index </a></li>
        </ul>

<?php
        include "template/container.inc.php";
        include "controller/tools.controller.php";
?>
