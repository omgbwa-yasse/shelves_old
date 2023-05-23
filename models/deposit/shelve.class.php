<?php
require_once 'models/deposit/shelveManager.class.php';
class shelve extends shelveManager{
private $_shelve_id;
private $_shelve_reference;	
private $_shelve_observation;	
private $_shelve_ear;	
private $_shelve_colonne;	
private $_shelve_table;	
private $_shelve_room_id;

public function __construct(){
    $this->_shelve_id = NULL;
    $this->_shelve_reference = NULL;	
    $this->_shelve_observation = NULL;
    $this->_shelve_ear = NULL;	
    $this->_shelve_colonne = NULL;	
    $this->_shelve_table = NULL;	
    $this->_shelve_room_id = NULL;
}

// Shelve id
public function setShelveId($id){  $this->_shelve_id = $id; }

public function getShelveId(){ return $this->_shelve_id ;}


// Shelve reference
public function setShelveReference($reference){ $this->_shelve_reference = $reference;}
public function getShelveReference(){ return $this->_shelve_reference;}

// Shelve observation
public function setShelveObservation($observation){$this->_shelve_observation = $observation;}
public function getShelveObservation(){ return $this->_shelve_observation; }

// Shelve Epis
public function setShelveEar($ear){ $this->_shelve_ear =  $ear;}
public function getShelveEar(){return $this->_shelve_ear;}

// Shelve travée (colonne)
public function setShelveColonne($colonne){ $this->_shelve_colonne =  $colonne;}
public function getShelveColonne(){return $this->_shelve_colonne;}

// Shelve tablette
public function setShelveTable($table){ $this->_shelve_table =  $table;}
public function getShelveTable(){return $this->_shelve_table;}

// Shelve room
public function setShelveRoomId($room_id){ $this->_shelve_room_id =  $room_id;}
public function getShelveRoomId(){return $this->_shelve_room_id;}



// Recupérer toute une étagière à travers id
public function setShelveById($id){
    $stmt = $this->getCnx() ->prepare("SELECT * FROM shelve WHERE shelve_id = :id");
    $stmt ->execute([':id' => $id]);
    $stmt = $stmt -> fetchALL();
    foreach($stmt as $shelve){
        $this->setShelveId($shelve['shelve_id']);
        $this->setShelveReference($shelve['shelve_reference']);
        $this->setShelveObservation($shelve['shelve_observation']);
        $this->setShelveEar($shelve['shelve_ear']);
        $this->setShelveColonne($shelve['shelve_colonne']);
        $this->setShelveTable($shelve['shelve_table']);
        $this->setShelveRoomId($shelve['room_id']);
    }
}

public function updateShelve($id, $reference, $observation, $ear, $colonne, $tablette, $roomId){
    // vérifier si l'id existe dans la table
    $stmt = $this->getCnx() ->prepare("SELECT * FROM shelve WHERE shelve_id = :id");
    $stmt -> execute([':id' => $id]);
    $shelve = $stmt -> fetch();
    if(isset($shelve)){
        $stmt = $this->getCnx() ->prepare("UPDATE shelve 
        SET shelve_reference = :reference, shelve_observation = :observation,  shelve_ear = :ear,
        shelve_colonne = :colonne, shelve_table = :tablette, room_id = :roomId WHERE shelve_id = :id");
        $stmt -> execute([':id' => $id, ':reference' => $reference, ':observation' => $observation, ':ear' => $ear, 
        ':colonne' => $colonne, ':tablette' => $tablette, ':roomId' => $roomId]);
        if($stmt->rowCount()>0)
        { return true; } 
        else {  return false; }
    } else{
        return false;
    }
}

public function setShelveByReference($reference){
    $stmt = $this->getCnx() ->prepare("SELECT * FROM shelve WHERE shelve_reference = :reference");
    $stmt ->execute([':reference' => $reference]);
    $stmt = $stmt -> fetchALL();
    foreach($stmt as $shelve){
        $this->setShelveId($shelve['shelve_id']);
        $this->setShelveReference($shelve['shelve_reference']);
        $this->setShelveObservation($shelve['shelve_observation']);
        $this->setShelveEar($shelve['shelve_ear']);
        $this->setShelveColonne($shelve['shelve_colonne']);
        $this->setShelveTable($shelve['shelve_table']);
        $this->setShelveRoomId($shelve['room_id']);
    }
}

public function saveShelve(){
    $stmt = $this->getCnx() ->prepare("INSERT INTO shelve ( shelve_reference, shelve_observation, shelve_ear, shelve_colonne, shelve_table, room_id) 
    VALUES ( :reference, :observation, :ear, :colonne, :tablette, :roomId)");
    $stmt -> execute([
        ':reference' => $this->getShelveReference(), 
        ':observation' => $this->getShelveObservation(), 
        ':ear' => $this->getShelveEar(), 
        ':colonne' => $this->getShelveColonne(), 
        ':tablette' => $this->getShelveTable(), 
        ':roomId' => $this->getShelveRoomId()
    ]);
    if($stmt->rowCount()>0){
        return true;
    } else {
        return false;
    }
}
public function shelveUsedNumber(){
    $stmt = $this->getCnx() ->prepare("SELECT COUNT(*) FROM shelve WHERE shelve_id = :id");
    $stmt -> execute([':id' => $this->getShelveId()]);
    $stmt = $stmt -> fetch();
    return $stmt;
}


public function deleteShelve(){
    if($this->shelveUsed($this->getShelveId()) == false){
        $stmt = $this-> getCnx() ->prepare("DELETE FROM shelve WHERE shelve_id = :id");
        $stmt ->execute([':id' => $this->getShelveId()]);
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