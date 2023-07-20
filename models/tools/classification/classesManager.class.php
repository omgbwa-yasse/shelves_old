<?php
require_once 'models/connexion.class.php';

class activityClassesManager extends connexion{

public function __construct(){

}
 public function allMainClasses(){
    $allclasseId = "SELECT * FROM classification WHERE classification_parent_id ='0' ";
    $allclasseId = $this->getCnx()->prepare($allclasseId);
    $allclasseId->execute();
    $allclasseId = $allclasseId->fetchAll();
    return $allclasseId;
   }


   public function allClasses(){
    $stmt = $this->getCnx()->prepare("SELECT classification_id as id, classification_code as code, classification_title as title
    FROM classification ORDER BY id ASC");
    $stmt ->execute();
    $stmt = $stmt->fetchAll();
    return $stmt;
   }

  public function ClassesChildById($id){
    $child_class = $this->getCnx()->prepare("SELECT classification_id as id FROM classification WHERE classification_parent_id = :parent_id");
    $child_class ->execute([':parent_id' => (int) $id]);
    $child_class = $child_class -> fetchAll();
    return $child_class;
  }
  public function ClassesChildBycode($id){
    $child_class = $this->getCnx()->prepare("SELECT classification_code as id FROM classification WHERE classification_parent_id = :parent_id");
    $child_class ->execute([':parent_id' => $id]);
    $child_class = $child_class -> fetchAll();
    return $child_class;
  }


public function deleteClassificationById($id) {
  $query = "DELETE FROM classification WHERE classification_id = :classification_id";
  $stmt = $this->getCnx()->prepare($query);
  $stmt->execute([':classification_id' => $id]);
}


public function deleteClassificationBycode($code) {
  $query = "DELETE FROM classification WHERE classification_code = :classification_code";
  $stmt = $this->getCnx()->prepare($query);
  $stmt->execute([':classification_code' => $code]);
  echo " <br>";
   echo $code; 
}

public function updateClassById($id, $code, $title, $observation, $parent_id) {
  $stmt = $this->getCnx()->prepare("UPDATE classification SET 
          classification_code = :classification_code, 
          classification_title = :classification_title, 
          classification_parent_id = :classification_parent_id, 
          classification_observation = :classification_observation 
          WHERE classification_id = :classification_id");
  $stmt->execute([
      '::classification_id' => $id,
      ':classification_code' => $code,
      ':classification_title' => $title,
      ':classification_parent_id' => $parent_id,
      ':classification_observation' => $observation]); 
    }
}?>