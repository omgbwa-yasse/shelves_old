<?php


function displayTransfer(INT $id)
{
    require_once "models/transfer/transfer.class.php";
    require_once "models/tools/organization/organization.class.php";
    require_once "models/repository/recordsManager.class.php";

    $listRecord = new recordsManager();
    $transfer = new transfer();
    $transfer ->hydrateById($id);
    $organization = new organization();
    

    $organization->setOrganizationById($transfer->getTransferOrganizationId());
    echo "<a href=\"index.php?q=transfer&categ=search&sub=transfer&id=".$transfer->getTransferId()."\">";
    echo $transfer->getTransferReference();
    echo "<br/>"; 
    echo $transfer->getTransferTitle();
    echo "<br/>";
    echo $transfer->getTransferDateCreation(); 
    echo "<br/>";
    echo $organization ->getOrganizationTitle();
    echo "<br/>";
    echo $organization ->getOrganizationcode();
    echo "<br/>";
    echo "</a>";
    echo "<a href=\"index.php?q=transfer&categ=create&sub=addRecord&id=".$transfer->getTransferId()."\">";
    echo "Enregistrer des documents...</a>";


    include_once 'models/repository/keyword.class.php';
    include_once 'models/repository/record.class.php';
    include_once 'models/repository/recordsManager.class.php';
    require_once 'views/repository/records/display.inc.php';

    $listRecord = $listRecord -> recordsByTransferId($id);
    foreach($listRecord as $id){
        $record = new record();
        $record -> setRecordId($id['id']);
        $record -> getRecordById();
        displayRecordDefault($record);
    }

}
?>


















