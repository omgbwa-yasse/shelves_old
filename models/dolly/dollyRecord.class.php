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
    $stmt = $this->getCnx()->prepare("SELECT dolly_records.dolly_id FROM dolly_records WHERE dolly_records.dolly_id = :dolly_id");
    $stmt->execute([':dolly_id' => $this->getDollyRecordId()]);
    if ($stmt->rowCount() > 0) {
        $status = TRUE;
    }
    return $status;
}


public function deleteDollyRecord(){
    $stmt = $this->getCnx()->prepare("DELETE FROM dolly WHERE dolly.dolly_id = :dolly_id");
    $stmt->execute([':dolly_id' => $this->getDollyRecordId()]);
    if($this->verificationDollyRecordIsUse()){
        $stmt = $this->getCnx()->prepare("DELETE FROM dolly_records WHERE dolly_records.dolly_id = :dolly_id");
        $stmt->execute([':dolly_id' => $this->getDollyRecordId()]);
    }
}

public function saveDollyRecord(){ 
    $stmt = $this->getCnx()->prepare("INSERT INTO dolly(dolly_title, dolly_observation) VALUES (:title, :observation)");
    $stmt->execute([':title' => $this->getDollyRecordTitle(), ':observation' => $this->getDollyRecordObservation()]);
}


public function linkDollyRecordToRecord($recordId, $dollyRecordId){
    $stmt = $this->getCnx()->prepare("INSERT INTO dolly_records(dolly_id, id_records, user_id) VALUES (:recordId, :dollyRecordId, :userId)");
    $stmt->execute([':recordId' => $recordId, ':dollyRecordId' => $dollyRecordId, ':userId' => 1]);
}

public function countRecords(){
    $recordCount = NULL;
    $stmt = $this->getCnx()->prepare("SELECT COUNT(*) FROM dolly_records WHERE dolly_records.dolly_id = :dolly_id");
    $stmt->execute([':dolly_id' => $this->getDollyRecordId()]);
    $recordCount = $stmt->fetchColumn();
    return $recordCount;
}

}?>