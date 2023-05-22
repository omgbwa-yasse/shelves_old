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
    $stmt = $this->getCnx() -> prepare("SELECT COUNT(*) FROM shelve WHERE shelve_id =:id");
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