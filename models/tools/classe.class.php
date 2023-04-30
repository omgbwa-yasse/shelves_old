<?php
require 'models/connexion.class.php';
class classification extends connexion{
public    $AllClassCodeTitle ;
public function __construct(){
  echo "";
}
public function getAllClassTitle(){
    $allClassTitle = "SELECT classification.classification_id as id,classification.classification_code_title as code_title  FROM classification";
    $allClassTitle = $this->getCnx()->prepare($allClassTitle);
    $allClassTitle->execute();
    return $allClassTitle;
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
  JOIN dbms.classification ON classification_type.classification_type_id = classification.classification_type_id
  JOIN dbms.access_classe ON classification.classification_id = access_classe.classification_id;";
  $allClasse = $this->getCnx()->prepare($sql);
  $allClasse->execute();
  $result = $allClasse->setFetchMode(PDO::FETCH_ASSOC);

  echo "<table border=1>";
  echo "<tr><th>classification_type_id </th><th>classification_type_title</th><th>classification_id</th><th>classification_code</th><th>access_classe_id</th><th>access_classe_code</th></tr>";
  foreach($allClasse->fetchAll() as $row) {
    echo "<tr>";
    echo "<td>" . $row["classification_type_id"] . "</td>";
    echo "<td>" . $row["classification_type_title"] . "</td>";
    echo "<td>" . $row["classification_id"] . "</td>";
    echo "<td>" . $row["classification_code"] . "</td>";
    echo "<td>" . $row["access_classe_id"] . "</td>";
    echo "<td>" . $row["access_classe_code"] . "</td>";
    echo "</tr>";
}
echo "</table>";
  }
}





?>