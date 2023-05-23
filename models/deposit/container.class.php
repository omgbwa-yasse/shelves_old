<?php
require_once 'models/deposit/containerManager.class.php';
class container extends containerManager{
private $_container_id;
private $_container_reference;	
private $_shelve_id;
private $_container_state_id;
private $_container_state_title;	
private $_container_property_id;
private $_container_property_title;
private $_container_property_width;
private $_container_property_lengh;
private $_container_property_thinkness;
public function __construct(){
    $this->_container_id = NULL;
    $this->_container_reference = NULL;	
    $this->_shelve_id = NULL ;
    $this->_container_state_id = NULL;
    $this->_container_state_title = NULL;	
    $this->_container_property_id = NULL;
    $this->_container_property_title = NULL;
    $this->_container_property_width = NULL;
    $this->_container_property_lengh = NULL;
    $this->_container_property_thinkness = NULL;
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
public function setContainerStateId($container_state){ $this->_container_state_id = $container_state;}

public function getContainerStateId(){ return $this->_container_state_id;}

// Container title
public function setContainerTitle($container_title){ $this->_container_state_title = $container_title;}

public function getContainerState(){ return $this->_container_state_title;}

// Container property id
public function setContainerPropertyId($property_id){ $this->_container_property_id = $property_id;}

public function getContainerPropertyId(){ return $this->_container_property_id;}
    
// Container property title
public function setContainerPropertyTitle($property_title){ $this->_container_property_title = $property_title;}

public function getContainerPropertyTitle(){ return $this->_container_property_title;}
    
// Container property width
public function setContainerPropertyWidth($property_width){ $this->_container_property_width = $property_width;}

public function getContainerPropertyWith(){ return $this->_container_property_width;}

// Container property lengh
public function setContainerPropertyLengh($property_lengh){ $this->_container_property_lengh = $property_lengh;}

public function getContainerPropertyLengh(){ return $this->_container_property_lengh;}

// Container property thinkness
public function setContainerPropertyThinkness($property_thinkness){ $this->_container_property_thinkness = $property_thinkness;}

public function getContainerPropertyThinkness(){ return $this->_container_property_thinkness;}








// Container room
public function setContainerShelveId($shelve_id){ $this->_shelve_id =  $$shelve_id;}
public function getContainerShelveId(){return $this->_shelve_id;}



// Recupérer toute une étagière à travers id
public function setContainerById($id){
    $stmt = $this->getCnx() ->prepare("SELECT * FROM container WHERE container_id = :id");
    $stmt ->execute([':id' => $id]);
    $stmt = $stmt -> fetchALL();
    foreach($stmt as $container){
        $this->setContainerId($container['container_id']);
        $this->setContainerReference($container['container_reference']);
    
        




        
    }
}

public function updateContainer($id, $reference, $observation, $ear, $colonne, $tablette, $roomId){
    // vérifier si l'id existe dans la table
    $stmt = $this->getCnx() ->prepare("SELECT * FROM container WHERE container_id = :id");
    $stmt -> execute([':id' => $id]);
    $container = $stmt -> fetch();
    if(isset($container)){
        $stmt = $this->getCnx() ->prepare("UPDATE container 
        SET container_reference = :reference, container_observation = :observation,  container_ear = :ear,
        container_colonne = :colonne, container_table = :tablette, room_id = :roomId WHERE container_id = :id");
        $stmt -> execute([':id' => $id, ':reference' => $reference, ':observation' => $observation, ':ear' => $ear, 
        ':colonne' => $colonne, ':tablette' => $tablette, ':roomId' => $roomId]);
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
        $this->setContainerObservation($container['container_observation']);
        $this->setContainerEar($container['container_ear']);
        $this->setContainerColonne($container['container_colonne']);
        $this->setContainerTable($container['container_table']);
        $this->setContainerRoomId($container['room_id']);
    }
}

public function saveContainer(){
    $stmt = $this->getCnx() ->prepare("INSERT INTO container ( container_reference, container_observation, container_ear, container_colonne, container_table, room_id) 
    VALUES ( :reference, :observation, :ear, :colonne, :tablette, :roomId)");
    $stmt -> execute([
        ':reference' => $this->getContainerReference(), 
        ':observation' => $this->getContainerObservation(), 
        ':ear' => $this->getContainerEar(), 
        ':colonne' => $this->getContainerColonne(), 
        ':tablette' => $this->getContainerTable(), 
        ':roomId' => $this->getContainerRoomId()
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