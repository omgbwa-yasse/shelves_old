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
    $stmt = $this->getCnx() -> prepare("SELECT COUNT(*) FROM shelve WHERE room_id =:id");
    $stmt -> execute([':id' => $id]);
    $stmt = $stmt ->fetch();
    foreach($stmt as $value){
        if($value > 0){
            return true;
        } else{
            return false;
        }
    }
    
}












}?>