<?php 
include "template/sous_menu.inc.php";
?>
<p>Plan de classement</p>
        <ul>
                <li><a href="index.php?q=outilsGestion&categ=planClassement&sub=allClass"> Plan de classement </a></li>
                <li><a href="index.php?q=outilsGestion&categ=planClassement&sub=addClasse"> Ajouter une classe </a></li>
        </ul>
<p>Reférentiel de conservation</p> 
        <ul>       
                <li><a href="index.php?q=outilsGestion&categ=retention&sub=allDua"> Référentiel de conservation</a></li>     
                <li><a href="index.php?q=outilsGestion&categ=retention&sub=addDuaRule"> Ajouter une règles </a></li>
        </ul>
<p>Règles de communicabilité</p>
        <ul>    
                <li><a href="index.php?q=outilsGestion&categ=communicability&sub=allCommunicability"> Règle communicabilité </a></li>
                <li><a href="index.php?q=outilsGestion&categ=communicability&sub=addCommunicabilityRule"> Ajouter une règle </a></li>
        </ul>
<p>Classe d'accès</p>  
        <ul>      
                <li><a href="index.php?q=outilsGestion&categ=accessClassification&sub=allAccess"> Classification pour l'accès </a></li>      
                <li><a href="index.php?q=outilsGestion&categ=accessClassification&sub=addAccessRule"> Ajouter une règle d'accès </a></li>
        </ul>
<p>Organigramme</p>
        <ul> 
                <li><a href="index.php?q=outilsGestion&categ=organization&sub=allOrganization"> Organigramme </a></li>
                <li><a href="index.php?q=outilsGestion&categ=organization&sub=addOrganization"> Ajouter un service </a></li>
        </ul> 
<p>Thésaurus</p>
        <ul> 
                <li><a href="index.php?q=outilsGestion&categ=thesaurus&sub=allIndex"> Voir le thésaurus </a></li>
                <li><a href="index.php?q=outilsGestion&categ=thesaurus&sub=addIndex"> Ajouter une index </a></li>
        </ul>
        </ul>
        </ul>

        </ul>

<?php
        include "template/container.inc.php";
        
        if($_GET['q'] == "outilsGestion" && $_GET['categ'] == "all" && $_GET['sub'] == "all"){
                include "views/tools/allTools.inc.php";
        }

        if($_GET['q'] == "outilsGestion" && $_GET['categ'] == "planClassement" && !empty($_GET['sub'])){
              switch($_GET['sub']){
                case "addClasse" : include "views/tools/planClassement/addClasse.inc.php";
                break;
                case "savedClasse" : include "views/tools/planClassement/saveClasse.inc.php";
                break;
                case "allMainClasse" : include "views/tools/planClassement/allMainClasse.inc.php";
                break;
                default : include "views/tools/planClassement/allClasse.inc.php";
                break;
        }}
        if($_GET['q'] == "outilsGestion" && $_GET['categ'] == "thesaurus" && !empty($_GET['allIndex'])){
                switch($_GET['sub']){
                  case "allIndex" : echo "Index : chronologique, thématique, géographique, typologie, Onosmatique, Action, etc.";
                  break;
                  case "addIndex" : echo "Choisit la branche, la classe, clic ajouter ou ajouter et on charte la branche";
                  break;
          }}
?>
