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
public function organizationChildById($id){ 
    $stmt = $this->getCnx()->prepare("SELECT organization_id as id FROM organization WHERE organization_parent_id = :id ORDER BY organization_code ASC");
    $stmt-> execute(['id' => $id]);
    return $stmt;
  }

  public function checkOrganizationChildById($id){ 
    $stmt = $this->getCnx()->prepare("SELECT COUNT(*) FROM organization WHERE organization_parent_id = :id ORDER BY organization_code ASC");
    $stmt-> execute(['id' => $id]);
    foreach($stmt as $value){
            if($value>0){
                return true;
            }else{
                return false;
            }
    }
  }

// Organization All Organization
public function getAllOrganization(){ 
    $stmt = "SELECT organization_id as id FROM organization ORDER BY organization.organization_title ASC";
    $stmt = $this->getCnx()->prepare($stmt);
    $stmt-> execute();
    return $stmt;
}


public function AllMainOrganization(){ 
    $query = "SELECT organization_id as id FROM organization WHERE organization_parent_id = 0   ORDER BY organization.organization_title ASC";
    $organizations = $this->getCnx()->query($query);
    $ids = $organizations->fetchAll();
    return $ids;
}




public function OrganizationByCode($code){
    $stmt = "SELECT organization_id as id FROM organization 
    WHERE organization.organization_code = '". $code ."'";
    $stmt = $this->getCnx()->prepare($stmt);
    $stmt->execute();
    return $stmt;    
}

public function OrganizationById($id){
    $stmt = "SELECT organization_id as id FROM organization 
    WHERE organization.organization_id = '".$id."'";
    $stmt = $this->getCnx()->prepare($stmt);
    $stmt->execute();
    return $stmt;    
}


}?>



