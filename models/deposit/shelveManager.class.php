<?php
require_once 'models/connexion.class.php';
class shelveManager extends connexion{


public function allShelve(){
    $stmt = $this->getCnx() ->prepare("SELECT * FROM shelve ORDER BY shelve_reference ASC");
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