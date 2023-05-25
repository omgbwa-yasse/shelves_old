<?php
require_once 'models/connexion.class.php';
class roomManager extends connexion{


public function allRoom(){
    $stmt = $this->getCnx() ->prepare("SELECT room_id as id, room_reference as reference, 
        room_title as title, room_observation as observation 
        FROM room ORDER BY room_reference ASC");
    $stmt ->execute();
    $room = $stmt -> fetchAll();
    return $room;
}

public function roomUsed($id){ 
    $stmt = $this->getCnx() -> prepare("SELECT COUNT(*) FROM shelve WHERE room_id = :id"); 
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    $stmt->execute(); 
    $count = $stmt->fetchColumn(); 
    return $count > 0; 
}


public function roomShelvesId($room_id){ 
    $stmt = $this->getCnx()->prepare("SELECT shelve_id FROM shelve WHERE room_id = :id"); 
    $stmt->bindParam(':id', $room_id, PDO::PARAM_INT); 
    $stmt->execute(); 
    $result = $stmt->fetchAll(PDO::FETCH_COLUMN); 
    return $result; }
}?>