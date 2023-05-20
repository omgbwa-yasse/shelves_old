<?php
require_once 'models/connexion.class.php';
class recordSupportManager extends connexion {


public function allRecordSupport(){
    $stmt = $this->getCnx()->prepare("SELECT * FROM record_support ORDER BY record_support_title ASC");
    $stmt->execute();
    return $stmt->fetchAll();
}


}
?>