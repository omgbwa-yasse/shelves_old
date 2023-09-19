<?php
require_once 'models/connexion.class.php';
require_once 'models/deposit/room.class.php';
class shelveManager extends roomManager{


public function allShelve(){
    $stmt = $this->getCnx() ->prepare("SELECT * FROM shelve ORDER BY shelve_reference ASC");
    $stmt ->execute();
    $shelve = $stmt -> fetchAll();
    return $shelve;
}

public function allSlevesInRoom(INT $id){
    $stmt = $this->getCnx() ->prepare("SELECT shelve_id as id, shelve_reference as reference, 
    shelve_observation as observation FROM shelve WHERE shelve_id =:id ORDER BY shelve_reference DESC");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt ->execute();
    $shelve = $stmt -> fetchAll();
    return $shelve;
}

public function shelveUsed($id){
    $stmt = $this->getCnx() -> prepare("SELECT COUNT(*) FROM container WHERE shelve_id = :id");
    $stmt->execute([':id' => $id]);
    $count = $stmt->fetch();
    foreach($count as $value){
        if($value > 0){
            return true ;
        } else {
            return false;
        }
    }
}













}?>