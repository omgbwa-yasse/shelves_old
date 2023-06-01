<?php
require_once 'models/setting/containerStatusManager.class.php';

class ContainerStatus extends ContainerStatusManager{
    
    private $_container_status_id;
    private $_container_status_title;
    private $_container_status_observation;
public function __construct(){
    $this->_container_status_id = NULL;
    $this->_container_status_title = NULL;
    $this->_container_status_observation = NULL;
;
}

public function setContainerStatusId($state_id){ $this->_container_status_id = $state_id;}

public function getContainerStatusId(){ return $this->_container_status_id;}
    
// Container state title
public function setContainerStatusTitle($state_title){ $this->_container_status_title = $state_title;}

public function getContainerStatusTitle(){ return $this->_container_status_title;}
 
// Container status observtaion

public function setContainerStatusObservation($observation){ $this->_container_status_observation = $observation;}

public function getContainerStatusObservation(){ return $this->_container_status_observation;}



public function updateContainerStatus($id, $title, $observation){
    $stmt = $this->getCnx() ->prepare("SELECT * FROM container_status WHERE container_status_id = :id");
    $stmt -> execute([':id' => $id]);
    $container = $stmt -> fetch();
    if(isset($container)){
        $stmt = $this->getCnx() ->prepare("UPDATE container_status SET container_status_id = :id, container_status_title = :title, container_status_observation = :observation");
        $stmt -> execute([':id' => $id , ':title' => $title, ':observation' => $observation ]);
        if($stmt->rowCount()>0)
        { return true; } 
        else {  return false; }
    } else{
        return false;
    }
}

public function setContainerStatusByTitle($title){
    $stmt = $this->getCnx() ->prepare("SELECT container_status_id as id, container_status_title as title, container_status_observation as observation
    FROM container_status WHERE container_status_title = :$title");
    $stmt ->execute([':title' => $title]);
    $stmt = $stmt -> fetchALL();
    foreach($stmt as $container){
        $this->setContainerStatusId($container['id']);
        $this->setContainerStatusTitle($container['title']);
        $this->setContainerStatusObservation($container['observation']);  
    }
}

public function setContainerStatusById($id){
    $stmt = $this->getCnx() ->prepare("SELECT container_status_id as id, container_status_title as title, container_status_observation as observation
    FROM container_status WHERE container_status_id = :id");
    $stmt ->execute([':id' => $id]);
    $stmt = $stmt -> fetchALL();
    foreach($stmt as $container){
        $this->setContainerStatusId($container['id']);
        $this->setContainerStatusTitle($container['title']);
        $this->setContainerStatusObservation($container['observation']);   
    }
}



public function saveContainerStatus(){
    $stmt = $this->getCnx() ->prepare("INSERT INTO container_status(container_status_title,container_status_observation)
    VALUES (:title, :observation)");
    $stmt -> execute([
        ':title' => $this-> getContainerStatusTitle(), 
        ':observation' => $this->getContainerStatusObservation()]);
    if($stmt->rowCount()>0){
        return true;
    } else {
        return false;
    }
}
public function containerStatusUsedNumber(){
    $stmt = $this->getCnx() ->prepare("SELECT COUNT(*) FROM container WHERE container_status_id = :id");
    $stmt -> execute([':id' => $this->getContainerStatusId()]);
    $stmt = $stmt -> fetch();
    return $stmt;
}


public function deleteContainerStatus(){
    if($this->containerStatusUsed($this->getContainerStatusId()) == false){
        $stmt = $this-> getCnx() ->prepare("DELETE FROM container_status WHERE container_status_id = :id");
        $stmt ->execute([':id' => $this->getContainerStatusId()]);
        if($stmt->rowCount()>0){
            return true;
        } else {
            return false;
        }
    } else{
        return false;
    }
}

    












}?>











