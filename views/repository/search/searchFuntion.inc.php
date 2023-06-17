<?php
require_once 'models/tools/organization/organizationManager.class.php';
require_once 'models/tools/organization/organization.class.php';


function displayOrganizationChild($parent_id){
    $organization = new organizationManager();
    $organization ->organizationChildsByIds($parent_id);
    




}

















?>