<?php
require_once 'models/connexion.class.php';

class dollyRecordManager extends connexion{

public function getAllDollyRecord(){
    $rqt ="SELECT * FROM dolly";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt ->execute();
    return $rqt;
}

public function getAllRecordsByDolly($dollyId){
    $rqt ="SELECT * FROM records 
        RIGHT JOIN dolly_records
        ON dolly_records.dolly_id = '".$dollyId ."'";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt ->execute();
    return $rqt;
}









}?>