<?php
require_once 'models/tools/organization/organizationManager.class.php';

$allOrganization = new organizationManager();
$list = $allOrganization -> getAllOrganization();
echo "<div style=\"margin:30px 0px 0px 30px;padding:20px 20px 20px 20px;;border:solid 2px red;width:900px\">";
foreach($list as $organization){
    echo "<a href=\"index.php?q=tools&categ=organization&sub=unite&id="
    . $organization['organization_id'] ."\">" . $organization['organization_code'] . " - " . $organization['organization_title'] . "</a><br>";
    }
echo "</div>";
?>