<?php
require_once 'models/tools/organization/organizationManager.class.php';
require_once 'models/tools/organization/organization.class.php';


function displayOrganizationChild($parent_id){
    echo "<ul>";
    $organization = new organizationManager();
    $ids = $organization ->organizationChildsByIds($parent_id);
    foreach($ids as $id){
        $organization = new organization();
        $organization -> setOrganizationById($id['organization_id']);
        echo "<li><a href=\"index.php?q=repository&categ=search&sub=organization&id=" . $organization->getOrganizationId() ."\">" . $organization->getOrganizationCode() . " - " . $organization->getOrganizationTitle() . "</a>";
     }
    echo "</ul>";
}?>