<?php
require 'models/connexion.class.php';
class classification extends connexion{
public    $AllClassCodeTitle ;
public function __construct(){
  echo "";
}
public function getAllClassTitle(){
    $allClassTitle = "SELECT classification_type.classification_type_id as id,classification_type.classification_type_title as code_title  FROM classification_type";
    $allClassTitle = $this->getCnx()->prepare($allClassTitle);
    $allClassTitle->execute();
    $result = $allClassTitle->setFetchMode(PDO::FETCH_ASSOC);
    return $allClassTitle;
   // foreach($allClassTitle->fetchAll() as $classe){ 
     // echo "<option value='" . $classe['id'] . "'>";
     // echo $classe['code_title'];
     // echo "</option>";
  // }
 }
    
 public function getAllClassid(){
  $allclassid = "SELECT classification.classification_id as id,classification.classification_code_title as code_title  FROM classification";
  $allclassid = $this->getCnx()->prepare($allclassid);
  $allclassid->execute();
  $result = $allclassid->setFetchMode(PDO::FETCH_ASSOC);

  foreach($allclassid->fetchAll() as $classe){ 
    echo "<option value='" . $classe['id'] . "'>";
    echo $classe['code_title'];

    echo "</option>";
 }
}


public function getAllrecordsIdClasse($id){
    $idClasse = "SELECT *  FROM records LEFT JOIN records_classification 
    ON records_classification.classification_id = ?";
    $idClasse = $this->getCnx()->prepare('$id');
    $idClasse->execute($id);
    foreach($idClasse as $classe_id){
       echo $classe_id['id_records'] ;
       echo $classe_id['records_title'] ;
       echo $classe_id['classification_id'] ;
    }
}
public function getAllClassification(){
  $sql = "SELECT *
  FROM dbms.classification_type
  JOIN dbms.classification ON classification_type.classification_type_id = classification.classification_type_id";
  $allClasse = $this->getCnx()->prepare($sql);
  $allClasse->execute();
  $result = $allClasse->setFetchMode(PDO::FETCH_ASSOC);

  echo "<table border=0>";
  echo "<tr><th> type de classification </th><th>code de classification</th><th>Titre de classification</th> <th>observation </th> <th> ID parent </th></tr>";
  foreach($allClasse->fetchAll() as $row) {
    echo "<tr>";
   
    echo "<td>" . $row["classification_type_title"] . "</td>";
    echo "<td>" . $row["classification_code"] . "</td>";
    echo "<td>" . $row["classification_title"] . "</td>";
    echo "<td>" . $row["classification_observation"] . "</td>";
    echo "<td>" . $row["classification_parent_id"] . "</td>";
    echo "</tr>";
}
echo "</table>";

  }
  public function addClassification(){
    $sql = "INSERT INTO dbms.classification (
      classification_id,
      classification_code,
      classification_title,
      classification_code_title,
      classification_type,
      classification_parent_id,
      classification_type_id,
      classification_observation
  ) VALUES (
      NULL,
      :classification_code,
      :classification_title,
      NULL,
      NULL,
      :classification_parent_id,
      3,
      :classification_observation
  )";
  
  $allClasse = $this->getCnx()->prepare($sql);
  $allClasse->execute([
      ':classification_code' => $_POST['classification_code'],
      ':classification_title' => $_POST['classification_title'],
      ':classification_parent_id' => $_POST['classification_parent_id'],
      ':classification_observation' => $_POST['classification_observation']
  ]);
    }
  

}





?>