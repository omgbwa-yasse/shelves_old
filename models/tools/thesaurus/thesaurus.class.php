<?php
require_once 'models/connexion.class.php';

class Thesaurus extends Connexion {
  private $_term_id;
  private $_term_cote;
  private $_term_title;
  private $_term_reference;
  private $_microthesaurus_id;
  private $_term_broader_id;
  private $_term_scope_note;

  public function __construct() {
    $this->_term_id = NULL;
    $this->_term_cote = NULL;
    $this->_term_title = NULL;
    $this->_term_reference = NULL;
    $this->_microthesaurus_id = NULL;
    $this->_term_broader_id = NULL;
    $this->_term_scope_note = NULL;
  }

  public function getTermId() { return $this->_term_id; }
  public function getTermCote() { return $this->_term_cote; }
  public function getTermTitle() { return $this->_term_title; }
  public function getTermReference() { return $this->_term_reference; }
  public function getMicrothesaurusId() { return $this->_microthesaurus_id; }
  public function getTermBroaderId() { return $this->_term_broader_id; }
  public function getTermScopeNote() { return $this->_term_scope_note; }

  public function setTermId($id) { $this->_term_id = $id; }
  public function setTermCote($cote) { $this->_term_cote = $cote; }
  public function setTermTitle($title) { $this->_term_title = $title; }
  public function setTermReference($reference) { $this->_term_reference = $reference; }
  public function setMicrothesaurusId($id) { $this->_microthesaurus_id = $id; }
  public function setTermBroaderId($id) { $this->_term_broader_id = $id; }
  public function setTermScopeNote($note) { $this->_term_scope_note = $note; }

  public function setThesaurusById($id) {
    $stmt = $this->getCnx()->prepare("SELECT * FROM thesaurus WHERE term_id = :id");
    $stmt->execute([':id' => $id]);
    foreach ($stmt as $thesaurus) {
      $this->setTermId($thesaurus['term_id']);
      $this->setTermCote($thesaurus['term_cote']);
      $this->setTermTitle($thesaurus['term_title']);
      $this->setTermReference($thesaurus['term_reference']);
      $this->setMicrothesaurusId($thesaurus['microthesaurus_id']);
      $this->setTermBroaderId($thesaurus['term_broader_id']);
      $this->setTermScopeNote($thesaurus['term_scope_note']);
    }
  }

  public function updateThesaurus() {
    $stmt = $this->getCnx()->prepare("UPDATE thesaurus SET term_cote=:cote, term_title=:title, term_reference=:reference, microthesaurus_id=:micro_id, term_broader_id=:broader_id, term_scope_note=:note WHERE term_id=:id");
    // Execute the statement with the values from the form fields
    $stmt->execute([
      ":cote" => $_POST['term_cote'],
      ":title" => $_POST['term_title'],
      ":reference" => $_POST['term_reference'],
      ":micro_id" => $_POST['microthesaurus_id'],
      ":broader_id" => $_POST['term_broader_id'],
      ":note" => $_POST['term_scope_note'],
      ":id" => $_POST['term_id']
    ]);
  }

  public function addindex() {
    $stmt = $this->getCnx()->prepare("INSERT INTO thesaurus (term_cote, term_title, term_reference, microthesaurus_id, term_broader_id, term_scope_note) VALUES (:cote, :title, :reference, :micro_id, :broader_id, :note)");
    $stmt->execute([
      ":cote" => $_POST['term_cote'],
      ":title" => $_POST['term_title'],
      ":reference" => $_POST['term_reference'],
      ":micro_id" => $_POST['microthesaurus_id'],
      ":broader_id" => $_POST['term_broader_id'],
      ":note" => $_POST['term_scope_note']
    ]);
  }

  public function delindex($id) {
    $stmt = $this->getCnx()->prepare("DELETE FROM thesaurus WHERE term_id = :id");
    $stmt->execute([":id" => $id]);
  }

  public function Thesaurus() {
    $stmt = $this->getCnx()->prepare("SELECT * FROM thesaurus");
    $allThesauruses = $stmt->execute();
    $allThesauruses = $stmt->fetchAll();
    return $allThesauruses;
  }
  public function allmainterm(){
    $stmt = $this->getCnx()->prepare("SELECT * FROM thesaurus WHERE term_broader_id is null");
    $allmainterm = $stmt->execute();
    $allmainterm = $stmt->fetchAll();
    return $allmainterm;
  }
  public function childterm($id) {
    $stmt = $this->getCnx()->prepare("SELECT * FROM thesaurus WHERE term_broader_id=?");
    $stmt->execute(array($id));
    $allchild = $stmt->fetchAll();
    return $allchild;
}
  public function numberofchildterm($id){
    $stmt = $this->getCnx()->prepare("SELECT COUNT(*) FROM thesaurus WHERE term_broader_id=?");
    $allchild = $stmt->execute($id);
    $allchild = $stmt->fetchAll();
    return $allchild;
  }
  
  public function SelectRecordIdAssociated($id){
    $stmt = $this->getCnx()->prepare("SELECT * FROM thesaurus_records LEFT JOIN record ON thesaurus_records.record_id=record.record_id WHERE thesaurus_records.term_id= ? ");
    $recordassociated = $stmt->execute(array($id));
    $recordassociated = $stmt->fetchAll();
    return $recordassociated;

  }
}?>