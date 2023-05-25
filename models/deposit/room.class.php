<?php
require_once 'models/deposit/roomManager.class.php';
class room extends roomManager{
private $_room_id;
private $_room_reference;	
private $_room_title;	
private $_room_observation;

public function __construct(){
    $this->_room_id = NULL;
    $this->_room_reference = NULL;	
    $this->_room_title = NULL;	
    $this->_room_observation = NULL;
}

// Room id
public function setRoomId($id){  $this->_room_id = $id; }

public function getRoomId(){ return $this->_room_id ;}


// Room reference
public function setRoomReference($reference){ $this->_room_reference = $reference;}
public function getRoomReference(){ return $this->_room_reference;}

// Room title
public function setRoomTitle($title){ $this->_room_title =  $title;}
public function getRoomTitle(){return $this->_room_title;}

// Room observation
public function setRoomObservation($observation){$this->_room_observation = $observation;}
public function getRoomObservation(){ return $this->_room_observation; }


public function setRoomById($id){
    $stmt = $this->getCnx() ->prepare("SELECT room_id as id, room_reference as reference, 
        room_title as title, room_observation as observation 
        FROM room WHERE room_id = :id");
    $stmt ->execute([':id' => $id]);
    $stmt = $stmt -> fetchALL();
    foreach($stmt as $room){
        $this->setRoomId($room['id']);
        $this->setRoomReference($room['reference']);
        $this->setRoomTitle($room['title']);
        $this->setRoomObservation($room['observation']);
    }
}

public function updateRoom($id, $reference, $title, $observation){
    // vérifier si l'id existe dans la table
    $stmt = $this->getCnx() ->prepare("SELECT * FROM room WHERE room_id = :id");
    $stmt -> execute([':id' => $id]);
    $room = $stmt -> fetch();
    if(isset($room)){
        $stmt = $this->getCnx() ->prepare("UPDATE room SET room_reference = :reference, room_title = :title, room_observation = :observation WHERE room_id = :id");
        $stmt -> execute([':reference' => $reference,':title' => $title, ':observation' => $observation, ':id' => $id]);
        if($stmt->rowCount()>0)
        { return true; } 
        else {  return false; }
    } else{
        return false;
    }
}

public function setRoomByTitle($title){
    $stmt = $this->getCnx() ->prepare("SELECT room_id as id, room_reference as reference, 
    room_title as title, room_observation as observation FROM room WHERE room_title = :title");
    $stmt -> execute([':title' => $title]);
    $room = $stmt -> fetch();
    if($room){
        $this->setRoomId($room['id']);
        $this->setRoomReference($room['reference']);
        $this->setRoomTitle($room['title']);
        $this->setRoomObservation($room['observation']);
    }
}

public function saveRoom(){
    $stmt = $this->getCnx() ->prepare("INSERT INTO room (room_reference, room_title, room_observation) VALUES (:reference,:title,:observation)");
    $stmt -> execute([':reference' => $this->getRoomReference(), ':title' => $this->getRoomTitle(),':observation' => $this->getRoomObservation()]);
    if($stmt->rowCount()>0){
        return true;
    } else {
        return false;
    }
}
public function roomUsedNumber(){
    $stmt = $this->getCnx() ->prepare("SELECT COUNT(*) FROM shelve WHERE room_id = :id");
    $stmt -> execute([':id' => $this->getRoomId()]);
    $stmt = $stmt -> fetch();
    return $stmt;
}


public function deleteRoom(){
    if($this->roomUsed($this->getRoomId()) == false){
        $stmt = $this-> getCnx() ->prepare("DELETE FROM room WHERE room_id = :id");
        $stmt ->execute([':id' => $this->getRoomId()]);
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