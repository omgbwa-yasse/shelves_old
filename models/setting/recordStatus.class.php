<?php
require_once 'models/setting/recordStatusManager.class.php';

class recordStatus extends recordStatusManager{
private $_record_status_id;
private $_record_status_title;
private $_record_status_observation;

public function __construct(){
    $this->_record_status_id = NULL;
    $this->_record_status_title = NULL;
    $this->_record_status_observation = NULL;
}
public function setRecordStatusId($id){ $this->_record_status_id = $id;}
public function getRecordStatusId(){ return $this->_record_status_id ;}
public function setRecordStatusTitle($title){ $this->_record_status_title = $title;}
public function getRecordStatusTitle(){ return $this->_record_status_title;}
public function setRecordStatusObservation($observation){ $this->_record_status_observation = $observation;}
public function getRecordStatusObservation(){ return $this->_record_status_observation;}

public function setRecordStatusById($id){
    $stmt = $this->getCnx() ->prepare("SELECT * FROM record_status WHERE record_status_id = :id");
    $stmt -> execute([':id' => $id]);
    $status = $stmt -> fetch();
    if($status){
        $this->setRecordStatusId($status['record_status_id']);
        $this->setRecordStatusTitle($status['record_status_title']);
        $this->setRecordStatusObservation($status['record_status_observation']);
    }
}
public function saveRecordStatus(){
    $stmt = $this->getCnx() ->prepare("INSERT INTO record_status (record_status_title, record_status_observation) VALUES (:status_title, :status_observation)");
    $stmt -> execute([':status_title' => $this->getRecordStatusTitle(),':status_observation' => $this->getRecordStatusObservation()]);
    if($stmt->rowCount()>0){
        return true;
    } else {
        return false;
    }
}

public function deleteRecordStatus(){
   if( $this->recordStatusUsed($this->getRecordStatusId()) == false){
        $stmt = $this-> getCnx() ->prepare("DELETE FROM record_status WHERE record_status_id = :id");
        $stmt ->execute([':id' => $this->getRecordStatusId()]);
        if($stmt->rowCount()>0){
        return true;
         } else {
        return false;
        }
    } else{
        return false;
    }

}
public function usedNumber(){
    $stmt = $this->getCnx() ->prepare("SELECT COUNT(*) FROM record WHERE record_status_id = :id");
    $stmt -> execute([':id' => $this->getRecordStatusId()]);
    $stmt = $stmt -> fetch();
    return $stmt;
}


public function setRecordStatusByTitle($title){
    $stmt = $this->getCnx() ->prepare("SELECT * FROM record_status WHERE record_status_title = :title");
    $stmt -> execute([':title' => $title]);
    $status = $stmt -> fetch();
    if($status){
        $this->setRecordStatusId($status['record_status_id']);
        $this->setRecordStatusTitle($status['record_status_title']);
        $this->setRecordStatusObservation($status['record_status_observation']);
    }
}



public function updateRecordStatus($id, $title, $observation){
    // vérifier si l'id existe dans la table
    $stmt = $this->getCnx() ->prepare("SELECT * FROM record_status WHERE record_status_id = :id");
    $stmt -> execute([':id' => $id]);
    $status = $stmt -> fetch();
    if($status){
            // mettre à jour le titre et l'observation
            $stmt = $this->getCnx() ->prepare("UPDATE record_status SET record_status_title = :title, record_status_observation = :observation WHERE record_status_id = :id");
            $stmt -> execute([':title' => $title, ':observation' => $observation, ':id' => $id]);
            if($stmt->rowCount()>0){
                return true;
            } else {
                return false;
            }
    } else {
        // l'id n'existe pas, pas possible de modifier
        return false;
    }
}

}?>