<?php
require_once 'models/tools/organization/organizationManager.class.php';
require_once 'models/tools/organization/organization.class.php';
require_once 'views/repository/search/searchFuntion.inc.php';

$allOrganization = new organizationManager();
$list = $allOrganization -> getAllMainOrganization();
echo "<div style=\"margin:30px 0px 0px 30px;padding:20px 20px 20px 20px;;border:solid 2px red;width:900px\">";
foreach($list as $id){
    $organization = new organization();
    $organization ->setOrganizationById($id['organization_id']);
    
    echo "<a href=\"index.php?q=repository&categ=search&sub=organization&id="
    . $organization->getOrganizationId() ."\">" . $organization->getOrganizationCode() . " - " . $organization->getOrganizationTitle() . "</a><br>";
    displayOrganizationChild($organization->getOrganizationId());
    }
echo "</div>";
?>