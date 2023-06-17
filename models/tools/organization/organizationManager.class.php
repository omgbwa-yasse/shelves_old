<?php
require_once "models/connexion.class.php";

class organizationManager extends connexion{
private $id;
private $title;

private $code;



// Organisation parent by id
public function OrganizationParentByChildId($id){ 

// Organization child
}
public function organizationChildsByIds($id){ 
    $stmt = $this->getCnx()->prepare("SELECT * FROM organization WHERE organization.organization_id = :id ORDER BY organization_code ASC");
    $stmt-> execute(['id' => $id]);
    $stmt->fetchAll();
    return $stmt;
// Organization All Organization
}
public function getAllOrganization(){ 
    $stmt = "SELECT * FROM organization ORDER BY organization.organization_title ASC";
    $stmt = $this->getCnx()->prepare($stmt);
    $stmt-> execute();
    return $stmt;
}
public function DisplayOrganisationByCode($code){
    $stmt = "SELECT organization_id as id FROM organization 
    WHERE organization.organization_code = '". $code ."'";
    $stmt = $this->getCnx()->prepare($stmt);
    $stmt->execute();
    return $stmt;    
}

public function DisplayOrganisationById($id){
    $stmt = "SELECT organization_id as id FROM organization 
    WHERE organization.organization_id = '".$id."'";
    $stmt = $this->getCnx()->prepare($stmt);
    $stmt->execute();
    return $stmt;    
}



}?>