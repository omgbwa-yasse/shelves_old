<?php
require_once 'models/setting/RecordSupportManager.class.php';

class RecordSupport extends recordSupportManager{
private $_record_support_id;
private $_record_support_title;
private $_record_support_observation;

public function __construct(){
    $this->_record_support_id = NULL;
    $this->_record_support_title = NULL;
    $this->_record_support_observation = NULL;
}
public function setRecordSupportId($id){ $this->_record_support_id = $id;}
public function getRecordSupportId(){ return $this->_record_support_id ;}
public function setRecordSupportTitle($title){ $this->_record_support_title = $title;}
public function getRecordSupportTitle(){ return $this->_record_support_title;}
public function setRecordSupportObservation($observation){ $this->_record_support_observation = $observation;}
public function getRecordSupportObservation(){ return $this->_record_support_observation;}

public function setRecordSupportById($id){
    $stmt = $this->getCnx() ->prepare("SELECT * FROM record_support WHERE record_support_id = :id");
    $stmt -> execute([':id' => $id]);
    $support = $stmt -> fetch();
    if($support){
        $this->setRecordSupportId($support['record_support_id']);
        $this->setRecordSupportTitle($support['record_support_title']);
        $this->setRecordSupportObservation($support['record_support_observation']);
    }
}
public function saveRecordSupport(){
    $stmt = $this->getCnx() ->prepare("INSERT INTO record_support (record_support_title, record_support_observation) VALUES (:support_title, :support_observation)");
    $stmt -> execute([':support_title' => $this->getRecordSupportTitle(),':support_observation' => $this->getRecordSupportObservation()]);
    if($stmt->rowCount()>0){
        return true;
    } else {
        return false;
    }
}

public function deleteRecordSupport(){
    $stmt = $this-> getCnx() ->prepare("DELETE FROM record_support WHERE record_support_id = :id");
    $stmt ->execute([':id' => $this->getRecordSupportId()]);
    if($stmt->rowCount()>0){
        return true;
    } else {
        return false;
    }

}

public function setRecordSupportByTitle($title){
    $stmt = $this->getCnx() ->prepare("SELECT * FROM record_support WHERE record_support_title = :title");
    $stmt -> execute([':title' => $title]);
    $status = $stmt -> fetch();
    if($status){
        $this->setRecordSupportId($status['record_support_id']);
        $this->setRecordSupportTitle($status['record_support_title']);
        $this->setRecordSupportObservation($status['record_support_observation']);
    }
}




public function updateRecordSupport(){
    // vérifier si l'id existe dans la table
    $stmt = $this->getCnx() ->prepare("SELECT * FROM record_support WHERE record_support_id = :id");
    $stmt -> execute([':id' => $this->getRecordSupportId()]);
    $support = $stmt -> fetch();
    if($support){
        // vérifier si le titre est différent de celui existant
        if($this->getRecordSupportTitle() != $support['record_support_title']){
            // mettre à jour le titre et l'observation
            $stmt = $this->getCnx() ->prepare("UPDATE record_support SET record_support_title = :title, record_support_observation = :observation WHERE record_support_id = :id");
            $stmt -> execute([':title' => $this->getRecordSupportTitle(), ':observation' => $this->getRecordSupportObservation(), ':id' => $this->getRecordSupportId()]);
            if($stmt->rowCount()>0){
                return true;
            } else {
                return false;
            }
        } else {
            // le titre est le même, pas besoin de modifier
            return false;
        }
    } else {
        // l'id n'existe pas, pas possible de modifier
        return false;
    }
}

}?>