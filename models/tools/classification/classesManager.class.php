<?php
require_once 'models/connexion.class.php';

class activityClassesManager extends connexion{

public function __construct(){

}
public function getAllClassesTitle(){
    $allClasseTitle = "SELECT classification.classification_id as id,classification.classification_title as title  FROM classification";
    $allClasseTitle = $this->getCnx()->prepare($allClasseTitle);
    $allClasseTitle->execute();
    $result = $allClasseTitle->setFetchMode(PDO::FETCH_ASSOC);
    return $allClasseTitle;
 }
 public function getAllClassesCode(){
    $allclasseId = "SELECT classification.classification_code as id,classification.classification_code as code  FROM classification";
    $allclasseId = $this->getCnx()->prepare($allclasseId);
    $allclasseId->execute();
    $allclasseId = $allclasseId->setFetchMode(PDO::FETCH_ASSOC);
    return $allclasseId;
   }
   public function getAllRecordsIdByClasseId($id){
    $classes_id = "SELECT *  FROM records WHERE records_classification.classification_id = '".$id."'";
    $classes_id = $this->getCnx()->prepare($classes_id);
    $classes_id -> execute();
   return $classes_id;
}
public function getAllClasseChildById($id){
    $child_class = "SELECT * FROM classification where classification_parent_id = :classification_parent_id";
    $child_class = $this->getCnx()->prepare($child_class);
    $child_class ->execute([':classification_parent_id'=>$id]);
    $child_class = $child_class -> setFetchMode(PDO::FETCH_ASSOC);
    return $child_class;
  }
public function getAllClasses(){
    $allClasses = "SELECT * FROM classification";
    $allClasses = $this->getCnx()->prepare($allClasses);
    $allClasses ->execute();
    return $allClasses;
}




}





?>