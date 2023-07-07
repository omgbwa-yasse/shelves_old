<?php
require_once 'models/connexion.class.php';

class AccessClasse extends Connexion {
  private $_access_classe_id;
  private $_access_classe_code;
  private $_access_classe_description;
  private $_classification_id;

  public function __construct() {
    $this->_access_classe_id = NULL;
    $this->_access_classe_code = NULL;
    $this->_access_classe_description = NULL;
    $this->_classification_id = NULL;
  }

  public function getAccessClasseId() { return $this->_access_classe_id; }
  public function getAccessClasseCode() { return $this->_access_classe_code; }
  public function getAccessClasseDescription() { return $this->_access_classe_description; }
  public function getClassificationId() { return $this->_classification_id; }

  public function setAccessClasseId($id) { $this->_access_classe_id = $id; }
  public function setAccessClasseCode($code) { $this->_access_classe_code = $code; }
  public function setAccessClasseDescription($description) { $this->_access_classe_description = $description; }
  public function setClassificationId($id) { $this->_classification_id = $id; }

  public function setAccessClasseById($id) {
    $stmt = $this->getCnx()->prepare("SELECT * FROM access_classe WHERE access_classe_id = :id");
    $stmt->execute([':id' => $id]);
    $stmt->fetchAll();
    foreach ($stmt as $accessClasse) {
      $this->setAccessClasseId($accessClasse['access_classe_id']);
      $this->setAccessClasseCode($accessClasse['access_classe_code']);
      $this->setAccessClasseDescription($accessClasse['access_classe_description']);
      $this->setClassificationId($accessClasse['classification_id']);
    }
  }

  public function updateAccessClasse() {
    $stmt = $this->getCnx()->prepare("UPDATE access_classe SET access_classe_code=:code, access_classe_description=:description, classification_id=:class_id WHERE access_classe_id=:id");
    // Execute the statement with the values from the form fields
    $stmt->execute([
      ":code" => $_POST['access_classe_code'],
      ":description" => $_POST['access_classe_description'],
      ":class_id" => $_POST['classification_id'],
      ":id" => $_POST['access_classe_id']
    ]);
  }

  public function addAccessClasse() {
    $stmt = $this->getCnx()->prepare("INSERT INTO access_classe (access_classe_code, access_classe_description, classification_id) VALUES (:code, :description, :class_id)");
    $stmt->execute([
      ":code" => $_POST['access_classe_code'],
      ":description" => $_POST['access_classe_description'],
      ":class_id" => $_POST['classification_id']
    ]);
  }

  public function delAccessClasse($id) {
    $stmt = $this->getCnx()->prepare("DELETE FROM access_classe WHERE access_classe_id = :id");
    $stmt->execute([":id" => $id]);
  }

  public function allAccessClasses() {
    $stmt = $this->getCnx()->prepare("SELECT * FROM access_classe");
    $allClasses = $stmt->execute();
    $allClasses = $stmt->fetchAll();$stmt->fetchAll();
    return $allClasses;
  }
}
?>