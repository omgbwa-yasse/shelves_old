<?php
require_once 'models/connexion.class.php';

class dollyRecordManager extends connexion{

public function getAllDollyRecord(){
    $stmt ="SELECT * FROM dolly";
    $stmt = $this->getCnx()->prepare($stmt);
    $stmt ->execute();
    return $stmt;
}

public function getAllRecordsByDolly($dollyId){
    $stmt = $this->getCnx()->prepare("SELECT * FROM record RIGHT JOIN dolly_record ON dolly_record.dolly_id =:dollyId");
    $stmt ->execute([':dollyId' => $dollyId]);
    return $stmt;
}









}?>