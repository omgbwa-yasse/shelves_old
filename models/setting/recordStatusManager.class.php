<?php
require_once 'models/connexion.class.php';
class recordStatusManager extends connexion{
    public function allRecordStatus(){
        $stmt = $this->getCnx()->prepare("SELECT record_status_id as id, record_status_title as title,
        record_status_observation as observation FROM record_status ORDER BY record_status_title ASC");
        $stmt ->execute();
        return $stmt ->fetchAll();
    }
    public function recordStatusUsed($id){
        $stmt = $this->getCnx() -> prepare("SELECT COUNT(*) FROM record WHERE record_status_id =:id");
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