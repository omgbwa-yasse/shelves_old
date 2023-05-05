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
        $records = $this->getCnx()->prepare($records);
        $records -> execute();
        return $records;
}
public function getAllSubRecordsIdById($id_records){
        $records = "SELECT records.id_records as id FROM records WHERE records.records_link_id ='".$id_records."'";
        $records = $this->getCnx()->prepare($records);
        $records -> execute();
        return $records;
}
public function getAllClasse(){
        $sqlClasse = "SELECT classification.classification_code_title as code_title FROM classification";
        $allClasse = $this->getCnx()->prepare($sqlClasse);
        $allClasse ->execute();
        return $allClasse;
}
public function getAllStatutTitle(){
        $sqlStatut = "SELECT records_status.records_status_title as statut FROM records_status";
        $allStatut = $this->getCnx()->prepare($sqlStatut);
        $allStatut ->execute();
        return $allStatut;
}
public function getAllSupportTitle(){
        $sqlSupport = "SELECT records_support.records_support_title as support FROM records_support";
        $allSupport = $this->getCnx()->prepare($sqlSupport);
        $allSupport ->execute();
        return $allSupport;
}
public function getAllContainer(){
        $sqlContainer = "SELECT container.container_reference as container FROM container";
        $allContainer = $this->getCnx()->prepare($sqlContainer);
        $allContainer -> execute();
        return $allContainer;
}
public function getLastNui(){
        $sqlLastNui = "SELECT records.records_nui as nui FROM records ORDER BY records.id_records DESC LIMIT 1";
        $sqlLastNui = $this->getCnx()->prepare($sqlLastNui);
        $sqlLastNui -> execute();
        return $sqlLastNui;
}
































}
?>