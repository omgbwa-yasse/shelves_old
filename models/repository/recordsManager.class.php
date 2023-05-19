<?php
require_once 'models/connexion.class.php';
class recordsManager extends connexion{
public $_organization_id;
public $_parent_id;
public $_organization_title;

public function getAllrecordsIdByClasseId($classe_id){
        $recordsId = "SELECT id_records as id FROM records WHERE records.classification_id = '". $classe_id ."' " ;
        $recordsId = $this->getCnx()->prepare($recordsId);
        $recordsId -> execute();
        return $recordsId;
    }

public function getAllrecordsLevel(){
        $recordsId = "SELECT level.level_id, level.level_title FROM level";
        $recordsId = $this->getCnx()->prepare($recordsId);
        $recordsId -> execute();
        return $recordsId;
    }

public function getAllrecordsId(){
        $allrecords = "SELECT id_records FROM records";
        $allrecords = $this->getCnx()->prepare($allrecords);
        $allrecords -> execute();
        return $allrecords;
}
public function MggetRecordById($id){
        // à completer
}
public function MgDeleteRecordById($id){
        // à completer
}
public function MgGetRecordsByDates($date_start, $date_end){
        $recordsId = "SELECT records.id_records FROM records WHERE   records.records_date_start < '".$date_start."' OR records.records_date_end > '".$date_start."'";
        $recordsId = $this->getCnx()->prepare($recordsId);
        $recordsId -> execute();
        return $recordsId;
}
public function MgGetLastRecords(){
        $records = "SELECT records.id_records as id FROM records ORDER  BY id DESC LIMIT 5";
        $records = $this->getCnx()->prepare($records);
        $records -> execute();
        return $records;
}
public function getAllSubRecordsIdById($record_id){
        $records = "SELECT records.id_records as id FROM records WHERE records.records_link_id ='".$record_id."'";
        $records = $this->getCnx()->prepare($records);
        $records -> execute();
        return $records;
}
public function getAllClasse(){
        $sqlClasse = "SELECT classification.classification_code_title as code_title FROM classification";
        $allClasse = $this->getCnx()->prepare($sqlClasse);
        $allClasse ->execute();
        return $allClasse;
}
public function getAllStatutTitle(){
        $sqlStatut = "SELECT records_status.records_status_title as statut FROM records_status";
        $allStatut = $this->getCnx()->prepare($sqlStatut);
        $allStatut ->execute();
        return $allStatut;
}
public function getAllSupportTitle(){
        $sqlSupport = "SELECT records_support.records_support_title as support FROM records_support";
        $allSupport = $this->getCnx()->prepare($sqlSupport);
        $allSupport ->execute();
        return $allSupport;
}
public function getAllContainer(){
        $sqlContainer = "SELECT container.container_reference as container FROM container";
        $allContainer = $this->getCnx()->prepare($sqlContainer);
        $allContainer -> execute();
        return $allContainer;
}
public function getLastNui(){
        $sqlLastNui = "SELECT records.records_nui as nui FROM records ORDER BY records.id_records DESC LIMIT 1";
        $sqlLastNui = $this->getCnx()->prepare($sqlLastNui);
        $sqlLastNui -> execute();
        return $sqlLastNui;
}
public function getOrganizationId(){
        return $this->_organization_id; 
}
public function setOrganizationId($id){
        $this->_organization_id = $id; 
}
public function getOrganizationTitle(){
        return $this->_organization_title;
}
public function setOrganizationTitle($title){
        $this->_organization_title = $title;
}
public function setOrganizationById(){
        $rqt = "SELECT organization_id as id,
        organization_code as code, 
        organization_title as title,	
        organization_observation, 
        organization_parent as parent_id, 
        user_id as user
        FROM organization 
        WHERE organization.organization_id = '". $this->getOrganizationId() ."'";
        $rqt = $this->getCnx()->prepare($rqt);
        $rqt->execute();

        foreach($rqt as $organization){
        $this->setOrganizationId($organization['id']);
        $this->setOrganizationTitle($organization['title']);
        }; 
}

public function getAllRecordsByOrganizationId(){
        $rqt = "SELECT records.id_records as id FROM records WHERE records.organization_id ='".$this->getOrganizationId()."'";
        $rqt = $this->getCnx()->prepare($rqt);
        $rqt -> execute();
        return $rqt;
}































}
?>