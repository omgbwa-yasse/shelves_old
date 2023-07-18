<?php
require_once 'models/connexion.class.php';

class retention_sort_sort extends Connexion {
  private $_retention_sort_id;
  private $_retention_sort_code;
  private $_retention_sort_title;
  private $_retention_sort_comment;


  public function __construct() {
    $this->_retention_sort_id = NULL;
    $this->_retention_sort_code = NULL;
    $this->_retention_sort_title = NULL;
    $this->_retention_sort_comment = NULL;
  }

  public function getretention_sortId() { return $this->_retention_sort_id; }
  public function getretention_sortcode() { return $this->_retention_sort_code; }
  public function getretention_sortSort() { return $this->_retention_sort_title; }
  public function getretention_sortcomment() { return $this->_retention_sort_comment; }
  
  public function setretention_sortId($id) { $this->_retention_sort_id = $id; }
  public function setretention_sortcode($code) { $this->_retention_sort_code = $code; }
  public function setretention_sortSort($title) { $this->_retention_sort_sort = $title; }
  public function setretention_sortcomment($comment) { $this->_retention_sort_comment = $comment; }
 

  public function setretention_sortById($id) {
    $stmt = $this->getCnx()->prepare("SELECT * FROM retention_sort WHERE retention_sort_id = :id");
    $stmt->execute([':id' => $id]);
    foreach ($stmt as $retention_sort) {
      $this->setretention_sortId($retention_sort['retention_sort_id']);
      $this->setretention_sortcode($retention_sort['retention_sort_code']);
      $this->setretention_sortSort($retention_sort['retention_sort_title']);
      $this->setretention_sortcomment($retention_sort['retention_sort_comment']);
      
    }
  }
  public function addretention_sort() {
    $stmt = $this->getCnx()->prepare("INSERT INTO retention_sort (retention_sort_code, retention_sort_sort, retention_sort_comment, retention_sort_sort_id) VALUES (:code, :title, :comment, :sort_id)");
    $stmt->execute([
      ":code" => $_POST['retention_sort_code'],
      ":title" => $_POST['retention_sort_title'],
      ":comment" => $_POST['retention_sort_comment'],
    ]);
  }

  public function delretention_sort($id) {
    $stmt = $this->getCnx()->prepare("DELETE FROM retention_sort WHERE retention_sort_id = :id");
    $stmt->execute([":id" => $id]);
  }

  public function allretention_sorts() {
    $stmt = $this->getCnx()->prepare("SELECT * FROM retention_sort");
    $allretention_sorts = $stmt->execute();
    $allretention_sorts = $stmt->fetchAll();
    return $allretention_sorts;
  }
  public function updateretention_sort() {
    $stmt = $this->getCnx()->prepare("UPDATE retention_sort SET retention_sort_code=:code, retention_sort_title=:title, retention_sort_comment=:comment WHERE retention_sort_id=:id");
   
    $stmt->execute([
      ":code" => $_POST['retention_sort_code'],
      ":title" => $_POST['retention_sort_title'],
      ":comment" => $_POST['retention_sort_comment'],
      
    ]);
  }
}
?>