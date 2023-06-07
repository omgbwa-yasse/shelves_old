<?php
// Charte d'archivage
if($_GET['q'] = "tools" && $_GET['categ'] = 'chart' && isset($_GET['sub'])){
    switch($_GET['sub']){
        case 'views' : include 'views/tools/viewsChart.views.php';
        break;
        case 'export' : include 'views/tools/exportChart.views.php';
        break;
    }
}

//Calendrier de conservation
if($_GET['q'] = "tools" && $_GET['categ'] = 'retention' && isset($_GET['sub'])){
    switch($_GET['sub']){ 
        case 'addrule' : include 'views/tools/retention/addRule.views.php';
        break;
        case 'UpdateRule' : include 'views/tools/retention/updateRule.views.php';
        break;
        case 'DeleteRule' : include 'views/tools/retention/deleteRule.views.php';
        break;
        case 'viewsRule' : include 'views/tools/retention/viewsRule.views.php';
        break;
    }
}

// Communicabilité
if($_GET['q'] = "tools" && $_GET['categ'] = 'communicability' && isset($_GET['sub'])){
    switch($_GET['sub']){ 
        case 'addrule' : include 'views/tools/retention/addCommunicability.views.php';
        break;
        case 'UpdateRule' : include 'views/tools/retention/updateCommunicability.views.php';
        break;
        case 'DeleteRule' : include 'views/tools/retention/deleteCommunicability.views.php';
        break;
        case 'viewsRule' : include 'views/tools/retention/viewsCommunicability.views.php';
        break;
    }
}

// Classe d'accès
if($_GET['q'] = "tools" && $_GET['categ'] = 'accessRule' && isset($_GET['sub'])){
    switch($_GET['sub']){ 
        case 'addAccessRule' : include 'views/tools/accessRule/addAccessRule.views.php';
        break;
        case 'UpdateAccessRule' : include 'views/tools/accessRule/updateAccessRule.views.php';
        break;
        case 'DeleteAccessRule' : include 'views/tools/accessRule/deleteAccessRule.views.php';
        break;
        case 'viewsAccessRule' : include 'views/tools/accessRule/viewsAccessRule.views.php';
        break;
    }
}

// plan de classement
if($_GET['q'] == "tools" && $_GET['categ'] == "classificationScheme" && isset($_GET['sub'])){
      switch($_GET['sub']){
        case "addClass" : include "views/tools/classificationScheme/addClass.inc.php";
        break;
        case "addMainClass" : include "views/tools/classificationScheme/addMainClass.inc.php";
        break;
        case "saveClass" : include "views/tools/classificationScheme/saveClass.inc.php";
        break;
        case "mainClasses" : include "views/tools/classificationScheme/allMainClasses.inc.php";
        break;
        case "viewClass" : include "views/tools/classificationScheme/viewClass.inc.php";
        break;
        case "parentClass" : include "views/tools/classificationScheme/parentClass.inc.php";
        break;
        case "childClass" : include "views/tools/classificationScheme/childClasses.inc.php";
        break;
        case "deleteClass" : include "views/tools/classificationScheme/deleteclass.inc.php";
        break;
        case "modifyClass" : include "views/tools/classificationScheme/modifyclass.inc.php";
        break;
}}


// Organization

if($_GET['q'] == "tools" && $_GET['categ'] == "organization" && isset($_GET['sub'])){
        switch($_GET['sub']){
         case "addOrganization" : include "views/tools/organization/addOrganization.inc.php";
          break;
        case "saveOrganization" : include "views/tools/organization/saveOrganization.inc.php";
          break;
          case "allOrganization" : include "views/tools/organization/allOrganization.inc.php";
          break;
          case "deleteUnite" : include "views/tools/organization/deleteOrganization.inc.php";
          break;
          case "updateUnite" : include "views/tools/organization/updateOrganization.inc.php";
          break;
        case "unite" : include "views/tools/organization/displayOrganization.inc.php";
          break;

  }}


// thesaurus
if($_GET['q'] == "tools" && $_GET['categ'] == "thesaurus" && !empty($_GET['allIndex'])){
        switch($_GET['sub']){
          case "allIndex" : echo "Index : chronologique, thématique, géographique, typologie, Onosmatique, Action, etc.";
          break;
          case "addIndex" : echo "Choisit la branche, la classe, clic ajouter ou ajouter et on charte la branche";
          break;
  }

  if($_GET['q'] = "tools" && $_GET['categ'] = 'thesaurus' && isset($_GET['sub'])){
    switch($_GET['sub']){ 
        case 'addTerm' : include 'views/tools/thesaurus/addTerm.views.php';
        break;
        case 'UpdateTerm' : include 'views/tools/thesaurus/updateTerm.views.php';
        break;
        case 'DeleteTerm' : include 'views/tools/thesaurus/deleteTerm.views.php';
        break;
        case 'viewsTerm' : include 'views/tools/thesaurus/viewsOrganization.views.php';
        break;
        case 'addBranch' : include 'views/tools/thesaurus/addBranch.views.php';
        break;
        case 'viewsBranch' : include 'views/tools/thesaurus/viewsBranch.views.php';
        break;
    }
}}
?>