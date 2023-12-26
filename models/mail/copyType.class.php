<?php
require_once 'models/connexion.class.php';

class CopyType extends Connexion {
    // Variables
    private $copy_type_id;
    private $copy_type_title;
    private $copy_type_status;
    private $copy_type_observation;

    public function __construct() {
        $this->copy_type_id = NULL;
        $this->copy_type_title = NULL;
        $this->copy_type_status = NULL;
        $this->copy_type_observation = NULL;
    }

    // Setters
    public function setCopyTypeId($copy_type_id) {
        $this->copy_type_id = $copy_type_id;
    }

    public function setCopyTypeTitle($copy_type_title) {
        $this->copy_type_title = $copy_type_title;
    }

    public function setCopyTypeStatus($copy_type_status) {
        $this->copy_type_status = $copy_type_status;
    }

    public function setCopyTypeObservation($copy_type_observation) {
        $this->copy_type_observation = $copy_type_observation;
    }

    // Getters
    public function getCopyTypeId() {
        return $this->copy_type_id;
    }

    public function getCopyTypeTitle() {
        return $this->copy_type_title;
    }

    public function getCopyTypeStatus() {
        return $this->copy_type_status;
    }

    public function getCopyTypeObservation() {
        return $this->copy_type_observation;
    }

    // Database operations
    public function createCopyType($copy_type_id, $copy_type_title, $copy_type_status, $copy_type_observation) {
        $copy_type = $this->getCnx()->prepare("INSERT INTO copy_type (copy_type_id, copy_type_title, copy_type_status, copy_type_observation) VALUES (:copy_type_id, :copy_type_title, :copy_type_status, :copy_type_observation)");
        $copy_type->execute(["copy_type_id" => $copy_type_id, "copy_type_title" => $copy_type_title, "copy_type_status" => $copy_type_status, "copy_type_observation" => $copy_type_observation]);
    }

    public function deleteCopyType($copy_type_id) {
        $copy_type = $this->getCnx()->prepare('DELETE FROM copy_type WHERE copy_type_id = :id');
        $copy_type->execute(['id' => $copy_type_id]);
    }

    public function updateCopyType($copy_type_id, $copy_type_title, $copy_type_status, $copy_type_observation) {
        $copy_type = $this->getCnx()->prepare('UPDATE copy_type SET copy_type_title = :copy_type_title, copy_type_status = :copy_type_status, copy_type_observation = :copy_type_observation WHERE copy_type_id = :copy_type_id');
        $copy_type->execute([':copy_type_id' => $copy_type_id, ':copy_type_title' => $copy_type_title, 'copy_type_status' => $copy_type_status, 'copy_type_observation' => $copy_type_observation]);
    }

    public function searchById($copy_type_id) {
        $copy_type = $this->getCnx()->prepare('SELECT * FROM copy_type WHERE copy_type_id = :copy_type_id');
        $copy_type->execute([':copy_type_id' => $copy_type_id]);
        return $copy_type->fetchAll();
    }

    public function searchByTitle($copy_type_title) {
        $copy_type = $this->getCnx()->prepare('SELECT * FROM copy_type WHERE copy_type_title = :copy_type_title');
        $copy_type->execute([':copy_type_title' => $copy_type_title]);
        return $copy_type->fetchAll();
    }

    public function searchByStatus($copy_type_status) {
        $copy_type = $this->getCnx()->prepare('SELECT * FROM copy_type WHERE copy_type_status = :copy_type_status');
        $copy_type->execute([':copy_type_status' => $copy_type_status]);
        return $copy_type->fetchAll();
    }
}
?>
