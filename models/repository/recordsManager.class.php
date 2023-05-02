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
        $recordsId = "SELECT records.id_records FROM records WHERE   records.records_date_start < '".$date_start."' OR records.records_date_end > '".$date_start."'";
        $recordsId = $this->getCnx()->prepare($recordsId);
        $recordsId -> execute();
        return $recordsId;
}
public function MgGetLastRecords(){
        $records = "SELECT records.id_records as id FROM records ORDER  BY id DESC LIMIT 5";
        $ecords = $this->getCnx()->prepare($records);
        $ecords -> execute();
        return $ecords;
}
public function getAllSubRecordsIdById($id_records){
        $records = "SELECT records.records_parent_id as parent_id FROM records WHERE records.id_records ='".$id_records."'";
        $ecords = $this->getCnx()->prepare($records);
        $ecords -> execute();
        return $ecords;
}
}
?>