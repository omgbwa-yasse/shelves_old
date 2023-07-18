<?php
require_once 'models/connexion.class.php';

class Retention extends Connexion {
  private $_retention_id;
  private $_retention_duration;
  private $_retention_sort;
  private $_retention_reference;
  private $_retention_sort_id;

  public function __construct() {
    $this->_retention_id = NULL;
    $this->_retention_duration = NULL;
    $this->_retention_sort = NULL;
    $this->_retention_reference = NULL;
    $this->_retention_sort_id = NULL;
  }

  public function getRetentionId() { return $this->_retention_id; }
  public function getRetentionDuration() { return $this->_retention_duration; }
  public function getRetentionSort() { return $this->_retention_sort; }
  public function getRetentionReference() { return $this->_retention_reference; }
  public function getRetentionSortId() { return $this->_retention_sort_id; }

  public function setRetentionId($id) { $this->_retention_id = $id; }
  public function setRetentionDuration($duration) { $this->_retention_duration = $duration; }
  public function setRetentionSort($retentonsort) { $this->_retention_sort = $retentonsort; }
  public function setRetentionReference($reference) { $this->_retention_reference = $reference; }
  public function setRetentionSortId($id) { $this->_retention_sort_id = $id; }

  public function setRetentionById($id) {
    $stmt = $this->getCnx()->prepare("SELECT * FROM retention WHERE retention_id = :id");
    $stmt->execute([':id' => $id]);
    foreach ($stmt as $retention) {
      $this->setRetentionId($retention['retention_id']);
      $this->setRetentionDuration($retention['retention_duration']);
      $this->setRetentionSort($retention['retention_sort']);
      $this->setRetentionReference($retention['retention_reference']);
      $this->setRetentionSortId($retention['retention_sort_id']);
    }
  }
  public function addRetention() {
    $stmt = $this->getCnx()->prepare("INSERT INTO retention (retention_duration, retention_sort, retention_reference, retention_sort_id) VALUES (:duration, :retentonsort, :reference, :sort_id)");
    $stmt->execute([
      ":duration" => $_POST['retention_duration'],
      ":retentonsort" => $_POST['retention_sort'],
      ":reference" => $_POST['retention_reference'],
      ":sort_id" => $_POST['retention_sort_id']
    ]);
  }

  public function delRetention($id) {
    $stmt = $this->getCnx()->prepare("DELETE FROM retention WHERE retention_id = :id");
    $stmt->execute([":id" => $id]);
  }

  public function allRetentions() {
    $stmt = $this->getCnx()->prepare("SELECT * FROM retention");
    $allRetentions = $stmt->execute();
    $allRetentions = $stmt->fetchAll();
    return $allRetentions;
  }
  public function updateRetention() {
    $stmt = $this->getCnx()->prepare("UPDATE retention SET retention_duration=:duration, retention_sort=:retentonsort, retention_reference=:reference, retention_sort_id=:sort_id WHERE retention_id=:id");
   
    $stmt->execute([
      ":duration" => $_POST['retention_duration'],
      ":retentonsort" => $_POST['retention_sort'],
      ":reference" => $_POST['retention_reference'],
      ":sort_id" => $_POST['retention_sort_id'],
      ":id" => $_POST['retention_id']
    ]);
  }
}
?>