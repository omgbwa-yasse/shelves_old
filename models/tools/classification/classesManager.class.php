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

///
public function displayClassificationHierarchy($id = 0, $level = 0) {
  if ($id === 0) {
      $query = "SELECT * FROM classification WHERE classification_parent_id =0";
      $stmt = $this->getCnx()->prepare($query);
      $stmt->execute();
  } else {
      $query = "SELECT * FROM classification WHERE classification_parent_id = :classification_parent_id";
      $stmt = $this->getCnx()->prepare($query);
      $stmt->execute([':classification_parent_id' => $id]);
  }

  $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($classes as $class) {
      echo "<div style='margin-left: " . ($level * 20) . "px'>";
      echo "<details>";
      echo "<summary>" . htmlspecialchars($class['classification_title']) . "</summary>";
      echo "<ul>";
      echo "<li>ID: " . htmlspecialchars($class['classification_id']) . "</li>";
      echo "<li>Code: " . htmlspecialchars($class['classification_code']) . "</li>";
      echo "<li>Title: " . htmlspecialchars($class['classification_title']) . "</li>";
      echo "<li>Code Title: " . htmlspecialchars($class['classification_code_title']) . "</li>";
      echo "<li>Type ID: " . htmlspecialchars($class['classification_type_id']) . "</li>";
      echo "<li>Observation: " . htmlspecialchars($class['classification_observation']) . "</li>";
      echo "</ul>";
      // utilisation de liens au lieu de boutons ( j'evite le javascrip )
      echo "<a href='views/tools/planClassement/crudclassification.inc.php?id=" . $class['classification_id'] . "&f='D''>Delete</a> ";
      echo "<a href='views/tools/planClassement/crudclassification.inc.php?id=" . $class['classification_id'] . "&f='U''>Update</a>";
      $this->displayClassificationHierarchy($class['classification_id'], $level + 1);
      echo "</details>";
      echo "</div>";
  }
}



public function deleteClassificationById($id) {
  $query = "DELETE FROM classification WHERE classification_id = :classification_id";
  $stmt = $this->getCnx()->prepare($query);
  $stmt->execute([':classification_id' => $id]);
}

public function updateClassificationById($id, $data) {
  $query = "UPDATE classification SET classification_code = :classification_code, classification_title = :classification_title, classification_code_title = :classification_code_title, classification_parent_id = :classification_parent_id, classification_type_id = :classification_type_id, classification_observation = :classification_observation WHERE classification_id = :classification_id";
  $stmt = $this->getCnx()->prepare($query);
  $stmt->execute([
      ':classification_code' => $data['classification_code'],
      ':classification_title' => $data['classification_title'],
      ':classification_code_title' => $data['classification_code_title'],
      ':classification_parent_id' => $data['classification_parent_id'],
      ':classification_type_id' => $data['classification_type_id'],
      ':classification_observation' => $data['classification_observation'],
      ':classification_id' => $id
  ]);
}

}





?>