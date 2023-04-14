<?php
require_once 'models/connexion.class.php';
class recordsManager extends connexion{

public function getAllrecordsId(){
        $allrecords = "SELECT id_records FROM records";
        $allrecords = $this->getCnx()->prepare($allrecords);
        $allrecords -> execute();
        return $allrecords;
}


}
?>