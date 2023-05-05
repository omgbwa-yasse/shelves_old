<?php
require_once 'models/repository/records.class.php';
require_once 'models/repository/keyword.class.php';
require_once 'models/tools/organization/organization.class.php';


function displayRecordLight($record){
    // Aficher les enregistrement
    echo "<a href=\"index.php?q=repository&categ=search&sub=display&id=".$record->getRecordId() ."\">";
    $organization = new organization(); 
    $organization ->setOrganizationById($record->getOrganizationId());
    echo $record-> getRecordTitle() ." ( reférence : ". $record-> getRecordNui() ." ) ". $organization ->getOrganizationTitle() 
    ." : ". $record->getRecordDateStart()." au ". $record ->getRecordDateEnd() ."</a>";

}

function displayRecord($record){
    echo "<div class=\"records\" >";
    echo "<div style=\"float:right;width:200px;\">";
    optionNavigation($record);
    echo "</div>";

    // Aficher les enregistrement
    $record -> setRecordClasseIdByCodeTitle();
    $record -> setRecordContainerId();
    $organization = new organization();
    $organization -> setOrganizationById($record -> getRecordOrganizationId());


    echo "<table border=\"0\"> 
    <tr><th class=\"title\" colspan=\"2\">
    <a href=\"index.php?q=repository&categ=search&sub=display&id=".$record->getRecordId()."\">". $record-> getRecordTitle() ."</a></th></tr> 
    <tr><th class=\"element\"> Reférence <td class=\"element\">". $record-> getRecordNui() ."</td></tr>
    <tr><th class=\"element\"> Dates <td class=\"element\">". $record -> getRecordDateStart() ." au ". $record -> getRecordDateEnd()  ."</td></tr>
    <tr><th class=\"element\"> Détenteur <td class=\"element\">
    <a href=\"index.php?q=repository&categ=search&sub=organization&id=".$organization->getOrganizationId()."\">
    ". $record -> getRecordOrganizationTitle() ."(". $organization -> getOrganizationCode() .")</a> </td></tr>
    <tr><th class=\"element\"> Observation <td class=\"element\">". $record -> getRecordObservation()  ."</td></tr>
    <tr><th class=\"element\"> Contenant <td class=\"element\"><a href=\"index.php?q=repository&categ=search&sub=container&id=".$record -> getRecordContainerId() ."\">". $record -> getRecordContainerTitle() ."</a></td></tr>
    <tr><th class=\"element\"> Classe <td class=\"element\"><a href=\"index.php?q=repository&categ=search&sub=byClasseId&id=".$record ->getRecordClasseId()."\">". $record -> getRecordClasseCodeTitle() ."</a></td></tr>
    ". displayParentTitle($record) ."
    <tr><th class=\"element\"> Support <td class=\"element\">". $record -> getRecordSupportTitle() ."</td></tr>
    <tr><th class=\"element\"> Mots clés <td class=\"element\">";

    // Afficher les mots clés associés
    $KeywordsId = $record -> getAllKeywordsIdByRecordId();
    $KeywordsId = $KeywordsId->fetchAll(PDO::FETCH_ASSOC);
    if(isset($KeywordsId)){
            foreach($KeywordsId as $KeywordId){
                    $word = new keyword();
                    $word -> setKeywordId($KeywordId['keyword_id']); 
                    echo "<a href=\"index.php?q=repository&categ=search&sub=byKeywordId&id=".$KeywordId['keyword_id']."\">";
                    echo $word -> getKeywordById();
                    echo "</a> : " ;
            }}
    echo "</td></tr><tr><td colspan=\"2\">";
    RecordsSubList($record);
    echo "</td></tr></table>";
    echo "</div>";

}

// Affichage long

function displayRecordLong($record){
    displayRecord($record);
    echo "<div class=\"records\">";
    displayOption($record);
    echo "</div>";

}

function displayOption($record){
    echo "<div class=\"option\" >
            <a class=\"option element\" href=\"index.php?q=repository&categ=create&sub=child&id=". $record->getRecordId() ." \">Ajouter sous-dossier</a>
            <a class=\"option element\" href=\"index.php?q=repository&categ=create&sub=update&id=". $record->getRecordId() ." \">Modifier</a>
            <a class=\"option element\" href=\"index.php?q=repository&categ=create&sub=export&id=". $record->getRecordId() ." \">exporter</a>
            <a class=\"option element\" href=\"index.php?q=repository&categ=create&sub=delete&id=". $record->getRecordId() ." \">Supprimer</a>
        </div>";

}
function RecordsSubList($records){
    $records->verificationRecordsChild();
    if($records->verificationRecordsChild()){

        echo "<br/><a href=\"index.php?q=repository&categ=search&sub=recordChild&id=". $records->getRecordId() . "\"> Voir les sous élements</a>";
    } else{
        echo "";
    }
}
function optionNavigation($record){
    echo "<div class=\"navigation\">
            <a href=\"index.php?q=repository&categ=create&sub=print&id=". $record->getRecordId() ." \">Imprimer</a>
         </div>
         <div class=\"navigation\">
            <a href=\"index.php?q=repository&categ=create&sub=addDolly&id=". $record->getRecordId() ." \">Ajouter dans chariot</a>
         </div>
         <div class=\"navigation\">
            <a href=\"index.php?q=repository&categ=loan&sub=loan&id=". $record->getRecordId() ." \">Reserver</a>
         </div>
         <div class=\"navigation\">
            <a href=\"index.php?q=repository&categ=create&sub=export&id=". $record->getRecordId() ." \">Exporter</a>
         </div>
         ";
}

function displayParentTitle($record){
    $parentValue = NULL;
    
    if($record->verificationRecordsParent() == TRUE){
        $id_parent = $record -> getRecordLinkId();
        $parent = new records();
        $parent -> setRecordId($id_parent);
        $parent -> getRecordById();
        $parentValue = "<tr><th class=\"element\"> In <td class=\"element\"><a href=\"index.php?q=repository&categ=search&sub=display&id=". $parent -> getRecordId()."\">". $parent -> getRecordTitle() ."</a></td></tr>";
    }else{
        $parentValue = "";
    }
    
    return $parentValue;
}





?>