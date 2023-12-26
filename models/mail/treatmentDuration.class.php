<?php
require_once 'models/connexion.class.php';
require_once 'models/mail/mail.class.php';


class TreatmentDuration extends mail {
    // Variables
    private $treatment_duration_id;
    private $treatment_duration_time;
    private $treatment_duration_observation;

    public function __construct() {
        $this->treatment_duration_id = NULL;
        $this->treatment_duration_time = NULL;
        $this->treatment_duration_observation = NULL;
    }

    // Setters
    public function setTreatmentDurationId($treatment_duration_id) {
        $this->treatment_duration_id = $treatment_duration_id;
    }

    public function setTreatmentDurationTime($treatment_duration_time) {
        $this->treatment_duration_time = $treatment_duration_time;
    }

    public function setTreatmentDurationObservation($treatment_duration_observation) {
        $this->treatment_duration_observation = $treatment_duration_observation;
    }

    // Getters
    public function getTreatmentDurationId() {
        return $this->treatment_duration_id;
    }

    public function getTreatmentDurationTime() {
        return $this->treatment_duration_time;
    }

    public function getTreatmentDurationObservation() {
        return $this->treatment_duration_observation;
    }

    // Database operations
    public function createTreatmentDuration($treatment_duration_id, $treatment_duration_time, $treatment_duration_observation) {
        $treatment_duration = $this->getCnx()->prepare("INSERT INTO treatment_duration (treatment_duration_id, treatment_duration_time, treatment_duration_observation) VALUES (:treatment_duration_id, :treatment_duration_time, :treatment_duration_observation)");
        $treatment_duration->execute(["treatment_duration_id" => $treatment_duration_id, "treatment_duration_time" => $treatment_duration_time, "treatment_duration_observation" => $treatment_duration_observation]);
    }

    public function deleteTreatmentDuration($treatment_duration_id) {
        $treatment_duration = $this->getCnx()->prepare('DELETE FROM treatment_duration WHERE treatment_duration_id = :id');
        $treatment_duration->execute(['id' => $treatment_duration_id]);
    }

    public function updateTreatmentDuration($treatment_duration_id, $treatment_duration_time, $treatment_duration_observation) {
        $treatment_duration = $this->getCnx()->prepare('UPDATE treatment_duration SET treatment_duration_time = :treatment_duration_time, treatment_duration_observation = :treatment_duration_observation WHERE treatment_duration_id = :treatment_duration_id');
        $treatment_duration->execute([':treatment_duration_id' => $treatment_duration_id, ':treatment_duration_time' => $treatment_duration_time, 'treatment_duration_observation' => $treatment_duration_observation]);
    }

    public function searchById($treatment_duration_id) {
        $treatment_duration = $this->getCnx()->prepare('SELECT * FROM treatment_duration WHERE treatment_duration_id = :treatment_duration_id');
        $treatment_duration->execute([':treatment_duration_id' => $treatment_duration_id]);
        return $treatment_duration->fetchAll();
    }

  
}
?>
