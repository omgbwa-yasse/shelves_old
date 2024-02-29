<?php
require_once 'models/connexion.class.php';

class CopyType extends Connexion {
    // Variables
    private $copy_type_id;
    private $copy_type_title;

    public function __construct() {
        $this->copy_type_id = NULL;
        $this->copy_type_title = NULL;
    }

    // Setters
    public function setCopyTypeId($copy_type_id) {
        $this->copy_type_id = $copy_type_id;
    }

    public function setCopyTypeTitle($copy_type_title) {
        $this->copy_type_title = $copy_type_title;
    }

    // Getters
    public function getCopyTypeId() {
        return $this->copy_type_id;
    }

    public function getCopyTypeTitle() {
        return $this->copy_type_title;
    }

    // Database operations
    public function create($copy_type_id, $copy_type_title) {
        $copy_type = $this->getCnx()->prepare("INSERT INTO copy_type (copy_type_id, copy_type_title) VALUES (:copy_type_id, :copy_type_title)");
        $copy_type->execute(["copy_type_id" => $copy_type_id, "copy_type_title" => $copy_type_title]);
    }

    public function delete($copy_type_id) {
        $copy_type = $this->getCnx()->prepare('DELETE FROM copy_type WHERE copy_type_id = :id');
        $copy_type->execute(['id' => $copy_type_id]);
    }

    public function update($copy_type_id, $copy_type_title) {
        $copy_type = $this->getCnx()->prepare('UPDATE copy_type SET copy_type_title = :copy_type_title WHERE copy_type_id = :copy_type_id');
        $copy_type->execute([':copy_type_id' => $copy_type_id, ':copy_type_title' => $copy_type_title]);
    }

    // Method to fetch all copy types
    public function all() {
        $copy_type = $this->getCnx()->prepare('SELECT * FROM copy_type');
        $copy_type->execute();
        return $copy_type->fetchAll();
    }
    public function searchById($copy_type_id) {
        $copy_type = $this->getCnx()->prepare('SELECT * FROM copy_type WHERE copy_type_id = :copy_type_id');
        $copy_type->execute([':copy_type_id' => $copy_type_id]);
        return $copy_type->fetchAll();
    }
}
?>