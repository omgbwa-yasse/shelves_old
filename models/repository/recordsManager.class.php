<?php
require_once 'models/connexion.class.php';
class recordsManager extends connexion{
public $_organization_id;
public $_parent_id;
public $_organization_title;

public $_list = array();

public function recordsIdsByClassId($classe_id){
        $stmt = $this->getCnx()->prepare("SELECT record_id as id FROM record WHERE record.classification_id = :id");
        $stmt -> execute([':id' => $classe_id]);
        $stmt -> fetchColumn();
        return $stmt;
    }

public function getstmtLevel(){
        $recordsId = "SELECT level.level_id, level.level_title FROM level";
        $recordsId = $this->getCnx()->prepare($recordsId);
        $recordsId -> execute();
        return $recordsId;
    }

public function getstmtId(){
        $stmt = $this->getCnx()->prepare("SELECT * FROM record");
        $stmt -> execute();
        $stmt = $stmt-> fetchAll();
        return $stmt;
}

public function getAllrecordsId(){
        $stmt = $this->getCnx()->prepare("SELECT record.record_id as id FROM record");
        $stmt -> execute();
        $stmt = $stmt-> fetchAll();
        return $stmt;
}
public function getAllrecordsIdWithoutContainer(){
        $stmt = $this->getCnx()->prepare("SELECT record_id as id FROM record WHERE container_id = 0");
        $stmt -> execute();
        $stmt = $stmt-> fetchAll();
        return $stmt;
}
public function getAllDesciptionLevels(){
        $stmt = $this->getCnx()->prepare("SELECT record_level_id as id, record_level_title as title FROM record_level");
        $stmt -> execute();
        $stmt = $stmt-> fetchAll();
        return $stmt;
}
public function getstmtIdWithoutContainer(){
        $stmt = $this->getCnx()->prepare("SELECT * FROM record WHERE record.container_id = 0 ");
        $stmt -> execute();
        $stmt = $stmt-> fetchAll();
        return $stmt;
}
public function MggetRecordById($id){
        // à completer
}
public function MgDeleteRecordById($id){
        // à completer
}
public function MgGetRecordsByDates($date_start, $date_end){
        if($date_end == null || $date_end == 0){
                $stmt = $this->getCnx()->prepare("SELECT record.record_id FROM record WHERE   record.record_date_start = :date_start");
                $stmt -> execute([':date_start' => $date_start]);
                $stmt = $stmt ->fetchAll();
                return $stmt;
        } else if($date_start > $date_end){
                $stmt = $this->getCnx()->prepare("SELECT record.record_id FROM record WHERE   record.record_date_start >= :date_start OR record.record_date_end <= :date_end");
                $stmt -> execute([':date_start' => $date_end, ':date_end' => $date_start]);
                $stmt = $stmt ->fetchAll();
                return $stmt;
        }
        else{
                $stmt = $this->getCnx()->prepare("SELECT record.record_id FROM record WHERE   record.record_date_start >= :date_start OR record.record_date_end <= :date_end");
                $stmt -> execute([':date_start' => $date_start, ':date_end' => $date_end]);
                $stmt = $stmt ->fetchAll();
                return $stmt;
        }
}
public function MgGetLastRecords(){
        $stmt =  "SELECT record.record_id as id FROM record ORDER  BY id DESC LIMIT 5";
        $stmt =  $this->getCnx()->prepare($stmt);
        $stmt ->  execute();
        return $stmt; 
}
public function getAllSubRecordsIdById($record_id){
        $stmt =  "SELECT record.record_id as id FROM record WHERE record.record_link_id ='".$record_id."'";
        $stmt =  $this->getCnx()->prepare($stmt);
        $stmt ->  execute();
        return $stmt; 
}
public function getAllClasses(){
        $stmt = "SELECT classification_observation as observation, classification_parent_id as parent_id, classification_id as id, classification_title as title, classification_code as code FROM classification";
        $stmt = $this->getCnx()->prepare($stmt);
        $stmt -> execute();
        $stmt -> fetchAll();
        return $stmt;
}
public function getAllStatutTitle(){
        $sqlStatut = "SELECT record_status.record_status_title as statut FROM record_status";
        $allStatut = $this->getCnx()->prepare($sqlStatut);
        $allStatut ->execute();
        return $allStatut;
}
public function getAllSupportTitle(){
        $sqlSupport = "SELECT record_support.record_support_title as support FROM record_support";
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
        $sqlLastNui = "SELECT record.record_nui as nui FROM record ORDER BY record.record_id DESC LIMIT 1";
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

public function getRecordsByDollyId($id){
        $stmt = $this->getCnx()->prepare("SELECT record_id as id FROM dolly_record WHERE dolly_id =?");
        $stmt -> execute([$id]);
        $stmt = $stmt -> fetchAll();
        return $stmt;
}

public function isDollyRecordEmpty($id){
        $stmt = $this->getCnx()->prepare("SELECT count(*) FROM dolly_record WHERE dolly_id =:id");
        $stmt -> execute([':id' => $id]);
        $stmt = $stmt -> fetch();
        if($stmt>0){
                return true;
        } else{
                return false;
        }
}

public function setOrganizationById(){
        $stmt = "SELECT organization_id as id,
        organization_code as code, 
        organization_title as title,	
        organization_observation as observation, 
        organization_parent_id as parent_id, 
        user_id as user
        FROM organization 
        WHERE organization.organization_id = :id";
        $stmt = $this->getCnx()->prepare($stmt);
        $stmt->bindValue(':id', $this->getOrganizationId());
        $stmt->execute();

        foreach($stmt as $organization){
        $this->setOrganizationId($organization['id']);
        $this->setOrganizationTitle($organization['title']);
        }; 
}

public function recordsByOrganizationId($id_organization){
        $stmt = $this->getCnx()->prepare("SELECT record.record_id as id FROM record WHERE record.organization_id = :id");
        $stmt -> execute([':id' => $id_organization]);
        $stmt =  $stmt -> fetchAll();
        return $stmt;
}

public function recordsWithoutContainer(){
        $stmt = $this->getCnx()->prepare("SELECT record_id as id FROM record WHERE container_id = 0");
        $stmt -> execute ();
        $stmt =  $stmt -> fetchAll();
        return $stmt;
}

public function recordsInContainer($container_id){
        $stmt = $this->getCnx()->prepare("SELECT record_id as id FROM record WHERE container_id = :containerId");
        $stmt -> execute ([':containerId' => $container_id]);
        $stmt =  $stmt -> fetchAll();
        return $stmt;
}


public function countContainerUsed($container_id){
        $stmt = $this->getCnx()->prepare("SELECT COUNT(*) FROM record WHERE record.container_id = :container_id");
        $stmt-> execute([':container_id' => $container_id]);
        $stmt = $stmt ->fetch();
        foreach($stmt as $number){
                return $number;
        }   
}

/* Research Module Debut */


function search($word)
{
        $words = preg_split("/\s+|\p{P}/", $word, -1, PREG_SPLIT_NO_EMPTY);
        $tempResult = [];
        $results = [];
        foreach ($words as $word) {
                $results = [];
                $stmt = $this->getCnx()->prepare("SELECT record_id AS id FROM record WHERE record_title LIKE '%$word%'");
                $stmt->execute();
                foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $result) {
                        $tempResult[] = $result['id'];
                }
        $results += array_unique($tempResult);
        }
        return  $results;
}









}
?>