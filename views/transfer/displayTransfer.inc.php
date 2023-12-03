<?php


function displayTransfer(INT $id)
{
    require_once "models/transfer/transfer.class.php";
    require_once "models/tools/organization/organization.class.php";
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
}
?>


















