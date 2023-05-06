<?php 
    require_once 'models/repository/recordsManager.class.php';
    require_once 'models/repository/records.class.php';
    require_once 'models/tools/organization/organizationManager.class.php';
    require_once 'models/tools/organization/organization.class.php';
    require_once 'models/repository/records.class.php';
    

    $records = new recordsManager();

    $allClasse = $records -> getAllClasse();
    $allStatut = $records -> getAllStatutTitle();
    $allContainer = $records ->getAllContainer();
    $allSupport = $records -> getAllSupportTitle();
    $sqlLastNui = $records -> getLastNui();

    $organisation = new organizationManager();
    $allOrganization = $organisation -> getAllOrganization();

    

    foreach($sqlLastNui as $Nui){
        echo "<div class=\"section\"> <h2>Description archivistique</h2></div>";
        echo "<div id=\"notice\">Le dernier enregistrement est : ". $Nui['nui'];
    }
    $recordsP = new records();
    $recordsP -> setRecordId($_GET['id']);
    $recordsP -> getRecordById();
    echo "<br> sous dossier de : <a href=\"index.php?q=repository&categ=create&sub=display&id=". $recordsP -> getRecordId()."\">";
    echo "(". $recordsP->controlNui().") ".$recordsP -> getRecordTitle(). "</a>";
    echo "</div><form method=\"POST\" action=\"index.php?q=repository&categ=create&sub=newSave&id_parent=" . $recordsP -> getRecordId() . "\">";
    include 'views/repository/records/displayRecordFormulaire.inc.php';
    echo "</form>";
?>
