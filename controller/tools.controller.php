<?php






// Charte d'archivage
if($_GET['q'] = "tools" && $_GET['categ'] = 'chart' && isset($_GET['sub'])){
    switch($_GET['sub']){
        case 'viewCharter' : include 'views/tools/ArchivingCharter/viewCharter.inc.php';
        break;
        case 'export' : include 'views/tools/ArchivingCharter/exportCharter.inc.php';
        break;
    }
}

//Regle de conservation
if($_GET['q'] = "tools" && $_GET['categ'] = 'retention' && isset($_GET['sub'])){
    switch($_GET['sub']){ 
        case 'add' : include 'views/tools/retention/addretentionRule.inc.php';
        break;
        case 'update' : include 'views/tools/retention/UpdateRetentionRule.inc.php';
        break;
        case 'delete' : include 'views/tools/retention/DeleteRetentionRule.inc.php';
        break;
        case 'view' : include 'views/tools/retention/viewretentionRule.inc.php';
        break;
        case 'all' : include 'views/tools/retention/DisplayAllRetentionRule.inc.php';
        break;
    }
}
//Retention retentonsort
if($_GET['q'] = "tools" && $_GET['categ'] = 'retentonsort' && isset($_GET['sub'])){
    switch($_GET['sub']){ 
        case 'addretentionsort' : include 'views/tools/retention/AddRetentionSort.inc.php';
        break;
        case 'updaterententionsort' : include 'views/tools/retention/UpdateRetentionSort.inc.php';
        break;
        case 'deleteretentionsort' : include 'views/tools/retention/DeleteRetentionSort.inc.php';
        break;
        case 'viewretentionsort' : include 'views/tools/retention/ViewRetentionSort.inc.php';
        break;
        case 'allretentionsort' : include 'views/tools/retention/DisplayAllRetentionSort.inc.php';
        break;
    }
}

// Communicabilité
if($_GET['q'] = "tools" && $_GET['categ'] = 'communicability' && isset($_GET['sub'])){
    switch($_GET['sub']){ 
        case 'addrule' : include 'views/tools/communicability/addrule.inc.php';
        break;
        case 'updaterule' : include 'views/tools/communicability/updaterule.inc.php';
        break;
        case 'deleterule' : include 'views/tools/communicability/delrule.inc.php';
        break;
        case 'allrule' : include 'views/tools/communicability/allrule.inc.php';
        break;
        case 'viewrule' : include 'views/tools/communicability/viewrule.inc.php';
        break;
    }
}

// Classe d'accès
if($_GET['q'] = "tools" && $_GET['categ'] = 'accessRule' && isset($_GET['sub'])){
    switch($_GET['sub']){ 
        case 'allAccess' : include 'views/tools/access_class/allaccessclass.inc.php';
        break;
        case 'UpdateAccessclass' : include 'views/tools/access_class/updateAccessclass.inc.php';
        break;
        case 'DeleteAccessclass' : include 'views/tools/access_class/deleteAccess_class.inc.php';
        break;
        case 'viewsAccessclass' : include 'views/tools/access_class/viewaccessclass.inc.php';
        break;
        case 'addAccessclass' :  include 'views/tools/access_class/addaccesclass.inc.php';
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
         case "addOrganizationUnit" : include "views/tools/organization/addOrganizationUnit.inc.php";
          break;
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
if($_GET['q'] == "tools" && $_GET['categ'] == "thesaurus" && !empty($_GET['sub'])){
        switch($_GET['sub']){
          case "allIndex" : echo "Index : chronologique, thématique, géographique, typologie, Onosmatique, Action, etc.";
          include "views/tools/thesaurus/viewthesaurus.inc.php";
          break;
          case "addIndex" : echo "Choisit la branche, la classe, clic ajouter ou ajouter et on charte la branche";
          include "views/tools/thesaurus/addindex.inc.php";
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