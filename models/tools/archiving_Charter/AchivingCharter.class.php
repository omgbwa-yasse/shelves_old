<?php
require_once 'models/tools/classification/classesManager.class.php';

class ArchivingCharter extends activityClassesManager{

    public function makecharterhead(){
         
    }
    public function makeCharterChild($code) {
        $stmt = $this->getCnx()->prepare(
            "SELECT * FROM classification AS C
            LEFT JOIN access_classe AS AC ON AC.classification_id = C.classification_id 
            LEFT JOIN communicability AS COM ON COM.classification_id = C.classification_id
            LEFT JOIN retention_classification AS RC ON RC.classification_id = C.classification_id
            LEFT JOIN retention AS R ON R.retention_id = RC.retention_id
            LEFT JOIN retention_sort AS RS ON R.retention_sort_id = RS.retention_sort_id


            WHERE C.classification_code = :code"
        );
        $stmt->execute([':code' => $code]);
        return $stmt->fetchAll();
    }
    



}?>