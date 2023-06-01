<?php
require_once 'models/deposit/containerManager.class.php';
class container extends containerManager{
private $_container_id;
private $_container_reference;	
private $_shelve_id;
private $_container_state_id;	
private $_container_property_id;

public function __construct(){
    $this->_container_id = NULL;
    $this->_container_reference = NULL;	
    $this->_shelve_id = NULL ;
    $this->_container_state_id = NULL;	
    $this->_container_property_id = NULL;
}

// Container id
public function setContainerId($id){  $this->_container_id = $id; }

public function getContainerId(){ return $this->_container_id ;}


// Container reference
public function setContainerReference($reference){ $this->_container_reference = $reference;}
public function getContainerReference(){ return $this->_container_reference;}

// Shelve id
public function setShelveId($shelve_id){  $this->_shelve_id = $shelve_id; }

public function getShelveId(){ return $this->_shelve_id; }

// Container state
public function setContainerStatusId($container_state){ $this->_container_state_id = $container_state;}

public function getContainerStatusId(){ return $this->_container_state_id;}


// Container property id
public function setContainerPropertyId($property_id){ $this->_container_property_id = $property_id;}

public function getContainerPropertyId(){ return $this->_container_property_id;}


// Container shelve
public function setContainerShelveId($shelve_id){ $this->_shelve_id =  $shelve_id;}
public function getContainerShelveId(){return $this->_shelve_id;}



// Recupérer une boite à travers son id

public function setContainerById($id){
    $stmt = $this->getCnx() ->prepare("SELECT * FROM container WHERE container.container_id = :id");
    $stmt ->execute([':id' => $id]);
    $stmt = $stmt -> fetchALL();
    foreach($stmt as $container){
        $this->setContainerId($container['container_id']);
        $this->setContainerReference($container['container_reference']); 
        $this->setContainerShelveId($container['container_shelve_id']);
        $this->setContainerStatusId($container['container_status_id']);
        $this->setContainerPropertyId($container['container_property_id']);
    }
}

public function updateContainer($id, $reference, $shelve_id, $state_id, $property_id){
    // vérifier si l'id existe dans la table
    $stmt = $this->getCnx() ->prepare("SELECT * FROM container WHERE container_id = :id");
    $stmt -> execute([':id' => $id]);
    $container = $stmt -> fetch();
    if(isset($container)){
        $stmt = $this->getCnx() ->prepare("UPDATE container 
        SET container_id = :id, container_reference = :reference,container_shelve_id = :shelve_id,
        container_state_id = :state_id, container_property_id = :property_id WHERE container_id = :id");
        $stmt -> execute([
            ':id' => $id , ':reference' => $reference, 'shelve_id' => $shelve_id, 
            'state_id' => $state_id, 'property_id' => $property_id ]);
        if($stmt->rowCount()>0)
        { return true; } 
        else {  return false; }
    } else{
        return false;
    }
}

public function setContainerByReference($reference){
    $stmt = $this->getCnx() ->prepare("SELECT * FROM container WHERE container_reference = :reference");
    $stmt ->execute([':reference' => $reference]);
    $stmt = $stmt -> fetchALL();
    foreach($stmt as $container){
        $this->setContainerId($container['container_id']);
        $this->setContainerReference($container['container_reference']); 
        $this->setContainerShelveId($container['container_shelve_id']);
        $this->setContainerStatusId($container['container_status_id']);
        $this->setContainerPropertyId($container['container_property_id']);
    }
}

public function saveContainer(){
    $stmt = $this->getCnx() ->prepare("INSERT INTO container(container_reference, container_status_id, container_property_id,container_shelve_id) 
    VALUES (:reference, :state_id, :property_id, :shelve_id)");
    $stmt -> execute([ 
        ':reference' => $this->getContainerReference(),
        ':state_id' => $this->getContainerStatusId(), 
        ':property_id' => $this->getContainerPropertyId(), 
        ':shelve_id' => $this->getContainerShelveId()
    ]);
    if($stmt->rowCount()>0){
        return true;
    } else {
        return false;
    }
}


public function containerUsedNumber(){
    $stmt = $this->getCnx() ->prepare("SELECT COUNT(*) FROM container WHERE container_id = :id");
    $stmt -> execute([':id' => $this->getContainerId()]);
    $stmt = $stmt -> fetch();
    return $stmt;
}


public function deleteContainer(){
    if($this->containerUsed($this->getContainerId()) == false){
        $stmt = $this-> getCnx() ->prepare("DELETE FROM container WHERE container_id = :id");
        $stmt ->execute([':id' => $this->getContainerId()]);
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