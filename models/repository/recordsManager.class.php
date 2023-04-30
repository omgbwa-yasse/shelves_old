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
public function MgGetLastRecords(){
        $records = "SELECT records.id_records as id FROM records ORDER  BY id DESC LIMIT 5";
        $ecords = $this->getCnx()->prepare($records);
        $ecords -> execute();
        return $ecords;
}

}
?>