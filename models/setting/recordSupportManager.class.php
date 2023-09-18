<?php
require_once 'models/connexion.class.php';
class recordSupportManager extends connexion {


public function allRecordSupport(){
    $stmt = $this->getCnx()->prepare("SELECT record_support_id as id, record_support_title as title, record_support_observation as observation 
    FROM record_support ORDER BY record_support_title ASC");
    $stmt->execute();
    return $stmt->fetchAll();
}

public function recordSupportUsed($id){
    $stmt = $this->getCnx() -> prepare("SELECT COUNT(*) FROM record WHERE record_support_id =:id");
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

}
?>