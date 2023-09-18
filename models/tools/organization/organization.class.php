<?php
require_once "models/tools/organization/organizationManager.class.php";
class organization extends organizationManager{
    private $_organization_id;
    private $_organization_code;	
    private $_organization_title; 	
    private $_organization_observation; 	
    private $_organization_parent_id;	
    private $_user_id;
public function __construct(){
    $this->_organization_code = NULL;
    $this->_organization_code = NULL;
    $this->_organization_title = NULL;
    $this->_organization_observation = NULL;
    $this->_organization_parent_id = NULL;
    $this->_user_id = 1 ;
}


// Organization id
public function setOrganizationId($id){ $this->_organization_id = $id;}
public function setOrganizationIdByTitle($title){ 
    $this->_organization_id = $title; // Requete
}
public function getOrganizationId(){ return $this->_organization_id;}


// Organization title
public function setOrganizationTitle($title){ $this->_organization_title = $title;}
public function setOrganizationTitleById($id){ $this->_organization_title = $id /* A completer ...*/;}
public function getOrganizationTitle(){ return $this->_organization_title;}

// Organisation code
public function setOrganizationCode($code){ $this->_organization_code = $code;}
public function getOrganizationCode(){ return $this->_organization_code;}

// Organisation observation
public function setOrganizationObservation($observation){ $this->_organization_observation = $observation;}
public function getOrganizationObservation(){ return $this->_organization_observation;}

// Organisation parent id
public function setOrganizationParentId($parent_id){ $this->_organization_parent_id = $parent_id;}
public function getOrganizationParentId(){ return $this->_organization_parent_id;}

// Organization user id
public function getOrganizationCreator(){ return $this->_user_id ; }
public function setOrganizationCreator($id){ $this->_user_id  = $id ; }


// Organization
public function saveOrganization(){
    $resultat = NULL ;
    $rqt ="INSERT INTO organization (organization_code, organization_title,	organization_observation, organization_parent_id, user_id)
        VALUES(?,?,?,?,1)";
    $rqt =$this->getCnx()->prepare($rqt);
    if($rqt->execute(array($this->getOrganizationCode(),$this->getOrganizationTitle(),$this->getOrganizationObservation(),$this->getOrganizationParentId())))
    { 
        $resultat = "Enregistrement effectuée";
    }
    return $resultat;
    }
// Set organisation By Code
public function setOrganizationByCode($code){
    $rqt = "SELECT organization_id as id,
            organization_code as code, 
            organization_title as title,	
            organization_observation, 
            organization_parent_id as parent_id, 
            user_id as user
    FROM organization 
    WHERE organization.organization_code = :code";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt -> bindValue(':code', $code);
    $rqt ->execute();
    
    foreach($rqt as $organization){
    $this->setOrganizationId($organization['id']);
    $this->setOrganizationCode($organization['code']);
    $this->setOrganizationTitle($organization['title']);
    $this->setOrganizationParentId($organization['parent_id']);
    $this->setOrganizationCreator($organization['user']);
    }; 
}
// Organisation set Id
public function setOrganizationById($id){
    $rqt = "SELECT organization_id as id,
            organization_code as code, 
            organization_title as title,	
            organization_observation as observation, 
            organization_parent_id as parent_id, 
            user_id as user
    FROM organization 
    WHERE organization.organization_id = '". $id ."'";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt->execute();
    
    foreach($rqt as $organization){
    $this->setOrganizationId($organization['id']);
    $this->setOrganizationCode($organization['code']);
    $this->setOrganizationTitle($organization['title']);
    $this->setOrganizationObservation($organization['observation']);
    $this->setOrganizationParentId($organization['parent_id']);
    $this->setOrganizationCreator($organization['user']);
    }; 
}

// Organization delete
public function deleteOrganization($id){ 
    $rqt = "DELETE FROM organization WHERE organization.organization_id = '".$id."'";
    $rqt = $this->getCnx()->prepare($rqt);
    if($rqt -> execute ()){
        $rqt = " Unité a été Supprimé ...";
    };
    return $rqt;
}


// Organization update
public function updateOrganization(){ }
}?>