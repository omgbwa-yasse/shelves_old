<?php
require_once 'models/connexion.class.php';
class recordStatusManager extends connexion{
    public function allRecordStatus(){
        $stmt = $this->getCnx()->prepare("SELECT * FROM record_status ORDER BY record_status_title ASC");
        $stmt ->execute();
        return $stmt ->fetchAll();;
    }
}
?>