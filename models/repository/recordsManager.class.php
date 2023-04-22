<?php
require_once 'models/connexion.class.php';
class recordsManager extends connexion{

public function getAllrecordsId(){
        $allrecords = "SELECT id_records FROM records";
        $allrecords = $this->getCnx()->prepare($allrecords);
        $allrecords -> execute();
        return $allrecords;
}
public function MggetRecordById($id){
        // à completer
}
public function MgDeleteRecordById($id){
        // à completer
}
public function MgGetRecordsByDates($date_start, $date_end){

        // à completer
        $recordsId = 1;
        return $recordsId;
}
}
?>