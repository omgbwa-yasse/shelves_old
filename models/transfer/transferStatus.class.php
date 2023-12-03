
<?php
require_once 'models/transfer/transferManager.class.php';
class TransferStatus extends transferManager{
    public $_record_transfer_id;
    public $_record_transfer_title;
    public $_record_transfer_observation;

public function __constructor(){
    $this->_record_transfer_id;
    $this->_record_transfer_title ;
    $this->_record_transfer_observation;
}
    
public function getRecordTransferStatusId(){
    return $this->_record_transfer_id;
}
public function setRecordTransferStatusId(int $id){
    $this->_record_transfer_id = $id;
}

// title
public function getRecordTransferStatusTile(){
    return $this->_record_transfer_title;
}

public function setRecordTransferStatusTile(string $title){
    $this->_record_transfer_title = $title;
}

// observation
public function getRecordTransferStatusObservation(){
    return $this->_record_transfer_observation;
}
public function setRecordTransferStatusObservation(string $observation){
    $this->_record_transfer_observation = $observation;
}

// hydratation

public function hydrateTransfertStatusById(int $id)
{
    $stmt = $this->getCnx()->prepare("SELECT record_transfer_status_id as id, record_transfer_status_title as title,	
        record_transfer_status_observation as observation FROM record_transfer_status WHERE record_transfer_status_id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    foreach($stmt as $status){
        $this->setRecordTransferStatusId($status['id']);
        $this->setRecordTransferStatusTile($status['title']);
        if(is_string($status['observation'])){
            $this->setRecordTransferStatusObservation($status['observation']);
        }
    }
}

}?>