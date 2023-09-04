<?php
require_once 'models/dolly/dollyRecordManager.class.php';
class dollyRecord extends dollyRecordManager{
private $_dolly_id;
private $_dolly_title;
private $_dolly_observation;

public function __construct(){
    $this->_dolly_id;
    $this->_dolly_title;
    $this->_dolly_observation;
}
public function getDollyRecordId(){  return $this->_dolly_id; }
public function setDollyRecordId($id){  $this->_dolly_id = $id; }

public function getDollyRecordTitle(){  return $this->_dolly_title; }
public function setDollyRecordTitle($title){  $this->_dolly_title = $title; }

public function getDollyRecordObservation(){ return $this->_dolly_observation; }
public function setDollyRecordObservation($observation){ $this->_dolly_observation = $observation; }

public function setDollyRecordById(){
    $stmt = $this->getCnx()->prepare("SELECT * FROM dolly WHERE dolly.dolly_id = :dolly_id");
    $stmt->execute([':dolly_id' => $this->getDollyRecordId()]);
    $dollyRecord = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->setDollyRecordId($dollyRecord['dolly_id']);
    $this->setDollyRecordTitle($dollyRecord['dolly_title']);
    $this->setDollyRecordObservation($dollyRecord['dolly_observation']);
}
public function setDollyRecordByTitle(){
    $rqt = "SELECT * FROM dolly WHERE dolly.dolly_title = '". $this->getDollyRecordTitle() ."'";
    $rqt = $this->getCnx() ->prepare($rqt);
    $rqt -> execute();
    foreach($rqt as $dolly){
        $this->setDollyRecordId($dolly['dolly_id']);
        $this->setDollyRecordTitle($dolly['dolly_title']);
        $this->setDollyRecordTitle($dolly['dolly_observation']);
    }
}
public function verificationDollyRecordTitle(){
    $status = FALSE;
    $rqt = "SELECT dolly.dolly_title FROM dolly WHERE dolly.dolly_title = '". $this->getDollyRecordTitle() ."'";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt ->execute();
    foreach($rqt as $title){
        if($title['dolly_title'] ==  $this->getDollyRecordTitle()){
            $status = TRUE;
        }else{
            $status = FALSE;
        }
    }
    return $status;
}

public function verificationDollyRecordIsUse(){
    $status = FALSE;
    $stmt = $this->getCnx()->prepare("SELECT dolly_record.dolly_id FROM dolly_record WHERE dolly_record.dolly_id = :dolly_id");
    $stmt->execute([':dolly_id' => $this->getDollyRecordId()]);
    if ($stmt->rowCount() > 0) {
        $status = TRUE;
    }
    return $status;
}

public function getAllRecords(){
    $stmt = $this->getCnx()->prepare("SELECT record_id as id FROM dolly_record WHERE dolly_id =:id");
    $stmt->execute(['id' => $this->getDollyRecordId()]);
    $stmt = $stmt ->fetchAll();
    return $stmt;
}


public function deleteDollyRecord(){
    $stmt = $this->getCnx()->prepare("DELETE FROM dolly WHERE dolly.dolly_id = :dolly_id");
    $stmt->execute([':dolly_id' => $this->getDollyRecordId()]);
    if($this->verificationDollyRecordIsUse()){
        $stmt = $this->getCnx()->prepare("DELETE FROM dolly_record WHERE dolly_record.dolly_id = :dolly_id");
        $stmt->execute([':dolly_id' => $this->getDollyRecordId()]);
    }
}

public function saveDollyRecord(){ 
    $stmt = $this->getCnx()->prepare("INSERT INTO dolly(dolly_title, dolly_observation) VALUES (:title, :observation)");
    $stmt->execute([':title' => $this->getDollyRecordTitle(), ':observation' => $this->getDollyRecordObservation()]);
    return true;
}


public function linkDollyRecordToRecord($recordId, $dollyRecordId){
    if($this->verificationDollyUseRecord($dollyRecordId,$recordId)){
        return false;
    }else{
        $stmt = $this->getCnx()->prepare("INSERT INTO dolly_record(dolly_id, record_id, user_id) VALUES (:record_Id, :dollyRecordId, :userId)");
        $stmt->execute([':record_Id' => $recordId, ':dollyRecordId' => $dollyRecordId, ':userId' => 2]);
        return true;
    } 
    }


public function verificationDollyUseRecord($dollyId, $recordId){
    $stmt = $this->getCnx()->prepare("SELECT dolly_id FROM dolly_record 
        WHERE dolly_id = :dolly_id AND record_id =:record_id");
    $stmt->execute([':dolly_id' => $dollyId, ':record_id' => $recordId]);
    if ($stmt->rowCount() > 0) {
        return TRUE;
    }else{
        return FALSE;
    }
}

public function countRecords(){
    $stmt = $this->getCnx()->prepare("SELECT COUNT(*) FROM dolly_record WHERE dolly_record.dolly_id =:dolly_id");
    $stmt->execute([':dolly_id' => $this->getDollyRecordId()]);
    $value = $stmt->fetchColumn();
    return $value;
}

/* les actions */

public function updateRecordClass(int $record_id, int $classe_id){
    $stmt = $this->getcnx()->prepare("UPDATE record SET classification_id=? WHERE record_id =:?");
    if($stmt ->execute([$classe_id, $record_id])){ return true; }else{ return false; }
}


public function updateRecordObservation(  int $record_id, string $observation){
    $stmt = $this->getcnx()->prepare("UPDATE record SET record_observation=? WHERE record_id =:?");
    if($stmt ->execute([$observation, $record_id])){ return true; }else{ return false; }
}


public function deleteRecord($id){
    $stmt = $this->getCnx()->prepare("DELETE FROM record WHERE record.record_id =:?");
    $stmt -> execute([$id]);
}


public function updateRecordDolly($record_id, $dolly_id){
    $stmt = $this->getCnx()->prepare("UPDATE dolly_record SET dolly_id=:? WHERE record_id =:?");
    $stmt -> execute([$dolly_id, $record_id]);
}

public function updateRecordOrganization($organization_id, $record_id){
    $stmt = $this->getCnx()->prepare("UPDATE record SET organization_id=:? WHERE record_id =:?");
    $stmt -> execute([$organization_id, $record_id]);
}





}?>