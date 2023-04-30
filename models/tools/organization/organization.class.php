<?php
require_once "models/connexion.class.php";
require_once "models/tools/organization/organizationManager.inc.php";
class organization extends organizationManager{
    private $organization_id;
    private $organization_code;	
    private $organization_title; 	
    private $organization_observation; 	
    private $organization_parent;	
    private $user_id;
private function __construct($id, $code, $title, $observation, $parent, $user){
    $this->organization_id = $id;
    $this->organization_code = $code;
    $this->organization_title = $title;
    $this->organization_observation = $observation;
    $this->organization_parent = $parent;
    $this->user_id = $id;
}

// Organization id
public function setOrganizationId($id){ $this->organization_id = $id;}
public function setOrganizationIdByTitle($title){ 
    $this->organization_id = $title; // Requete
}
public function getOrganizationId(){ return $this->organization_id;}


// Organization title
public function setOrganizationTitle($title){ $this->organization_title = $title;}
public function setOrganizationTitleById($title){ $this->organization_title = $title;}
public function getOrganizationTitle(){ return $this->organization_title;}

// Organisation code
public function setOrganizationCode($code){ $this->organization_code = $code;}
public function getOrganizationCode(){ return $this->organization_code;}

// Organisation observation
public function setOrganizationObservation($observation){ $this->organization_observation = $observation;}
public function getOrganizationObservation(){ return $this->organization_observation;}

// Organization delete
public function deleteOrganization(){ }


// Organization update
public function updateOrganization(){ }
}?>