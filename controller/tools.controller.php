<?php

if($_GET['q'] = "tools" && $_GET['categ'] = 'charte' && isset($_GET['sub'])){
    switch($_GET['sub']){
        case 'views' : include 'views/tools/charte.views.php';
        break;
        case 'export' : include 'views/tools/exportCharte.views.php';
        break;
    }
}

if($_GET['q'] = "tools" && $_GET['categ'] = 'classification' && isset($_GET['sub'])){
    switch($_GET['sub']){
        case 'addClasse' : include 'views/tools/classification/addClasse.views.php';
        break;
        case 'UpdateClasse' : include 'views/tools/classification/updateClasse.views.php';
        break;
        case 'DeleteClasse' : include 'views/tools/classification/deleteClasse.views.php';
        break;
        case 'viewsClasse' : include 'views/tools/classification/viewsClasse.views.php';
        break;
    }
}
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
if($_GET['q'] = "tools" && $_GET['categ'] = 'organization' && isset($_GET['sub'])){
    switch($_GET['sub']){ 
        case 'addOrganization' : include 'views/tools/organization/addOrganization.views.php';
        break;
        case 'UpdateOrganization' : include 'views/tools/organization/updateOrganization.views.php';
        break;
        case 'DeleteOrganization' : include 'views/tools/organization/deleteOrganization.views.php';
        break;
        case 'viewsOrganization' : include 'views/tools/organization/viewsOrganization.views.php';
        break;
    }
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
}



























?>