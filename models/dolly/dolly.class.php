<?php
require_once 'models/dolly/dollyManager.class.php';
class dollyRecord extends dollyManager{
private $_dolly_id;
private $_dolly_title;
private $_dolly_observation;

private function __construct(){
    $this->_dolly_id;
    $this->_dolly_title;
    $this->_dolly_observation;
}
public function getDollyRecordId(){  return $this->_dolly_id; }
public function setDollyRecordId($id){  $this->_dolly_id = $id; }

public function getDollyRecordTitle(){  return $this->_dolly_title; }
public function setDollyRecordTitle($title){  $this->_dolly_id = $title; }

public function getDollyRecordObservation(){ return $this->_dolly_observation; }
public function setDollyRecordObservation($observation){ $this->_dolly_observation = $observation; }

public function setDollyRecordById(){
    $rqt = "SELECT * FROM dolly WHERE dolly.dolly_id = '". $this->getDollyRecordId() ."'";
    $rqt = $this->getCnx() ->prepare($rqt);
    $rqt -> execute();
    foreach($rqt as $dolly){
        $this->setDollyRecordId($dolly['dolly_id']);
        $this->setDollyRecordTitle($dolly['dolly_title']);
        $this->setDollyRecordTitle($dolly['dolly_observation']);
    }
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
    $status = NULL;
    $rqt = "SELECT dolly_records.dolly_id FROM dolly_records WHERE dolly_records.dolly_id = '". $this->getDollyRecordTitle() ."'";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt ->execute();
    foreach($rqt as $dolly){
     if($dolly['dolly_id'] ==  $this->getDollyRecordId()){ $status = TRUE; }else{ $status = FALSE; }
    }
    return $status;
}


public function deleteDollyRecord(){
    $rqt = "DELETE FROM dolly WHERE dolly.dolly_id = '". $this->getDollyRecordId() ."'";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt ->execute();
    if($this->verificationDollyRecordIsUse()){
        $rqt = "DELETE FROM dolly_records WHERE dolly-records.dolly_id = '". $this->getDollyRecordId() ."'";
        $rqt = $this->getCnx()->prepare($rqt);
        $rqt ->execute();
    }
}
public function saveDollyRecord(){ 
    $rqt="INSERT INTO dolly(dolly_id, dolly_title, dolly_observation) VALUES (NULL,'". $this->getDollyRecordTitle()."';'". $this->getDollyRecordObservation() ."')";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt ->execute();
}

public function linkDollyRecordToRecord($recordId, $dollyRecordId){
    $rqt="INSERT INTO dolly_records(dolly_id, id_records, user_id) VALUES ('". $recordId ."';'". $dollyRecordId."', 1 )";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt ->execute();
}


}?>