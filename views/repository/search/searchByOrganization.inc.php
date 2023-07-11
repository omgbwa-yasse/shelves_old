<?php
require_once 'models/tools/organization/organizationManager.class.php';
require_once 'models/tools/organization/organization.class.php';
require_once 'views/repository/search/searchFuntion.inc.php';

$allOrganization = new organizationManager();
$list = $allOrganization -> AllMainOrganization();
echo "<div style=\"margin:30px 0px 0px 30px;padding:20px 20px 20px 20px;;border:solid 2px red;width:900px\">";


echo "<ol>";
foreach ($list as $id) {
    displayOrganization($id[0]);
}
echo "<ol/>";


function displayOrganization($id){
    $organization = new organization();
    $organization -> setOrganizationById($id);
    echo "<li><img  class=\"service\" src=\"template/images/moins.png\" width=\"20px\" height=\"20px\">";
    echo $organization ->getOrganizationCode(). " - " .$organization ->getOrganizationTitle();
    if($organization->checkOrganizationChildById($id)){
        searchOrganizationChild($id);
    }
}
function searchOrganizationChild($id){
    $organizations = new organizationManager();
    $organizations = $organizations -> organizationChildById($id);
    echo "<ol class=\"subService\">";
    foreach($organizations as $id){
        echo "<li>". displayOrganization($id['id']);
    }
    echo "</ol>";
}
?>