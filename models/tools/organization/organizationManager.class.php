<?php
require_once "models/connexion.class.php";

class organizationManager extends connexion{
private $id;
private $title;

private $code;



// Organisation parent by id
public function getOrganizationParentByChildId($id){ 

// Organization child
}
public function getOrganizationChildById($id){ 


// Organization All Organization
}
public function getAllOrganization(){ 
    $rqt = "SELECT * FROM organization ORDER BY organization.organization_title ASC";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt-> execute();
    return $rqt;
}
public function DisplayOrganisationByCode($code){
    $rqt = "SELECT organization_id as id FROM organization 
    WHERE organization.organization_code = '". $code ."'";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt->execute();
    return $rqt;    
}

public function DisplayOrganisationById($id){
    $rqt = "SELECT organization_id as id FROM organization 
    WHERE organization.organization_id = '".$id."'";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt->execute();
    return $rqt;    
}



}?>