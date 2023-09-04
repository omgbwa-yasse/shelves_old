<?php
require_once 'models/connexion.class.php';

class dollyRecordManager extends connexion{

public function getAllDollyRecord(){
    $stmt ="SELECT * FROM dolly";
    $stmt = $this->getCnx()->prepare($stmt);
    $stmt ->execute();
    return $stmt;
}

public function getAllRecordsByDolly($id){
    $stmt = $this->getCnx()->prepare("SELECT record_id FROM dolly_record WHERE dolly_id =:id");
    $stmt ->execute([':id' => $id]);
    $stmt = $stmt -> fetchAll();
    return $stmt;
}










}?>