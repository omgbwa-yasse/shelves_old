<?php
require_once 'models/connexion.class.php';
require_once 'models/mail/mail.class.php';

class MailTypology extends mail {
    // Variables
    private $mail_typology_id;
    private $mail_typology_title;
    private $mail_typology_observation;
    private $activity_id;
    private $treatment_duration_id;

    public function __construct() {
        $this->mail_typology_id = NULL;
        $this->mail_typology_title = NULL;
        $this->mail_typology_observation = NULL;
        $this->activity_id = NULL;
        $this->treatment_duration_id = NULL;
    }

    // Setters
    public function setMailTypologyId($mail_typology_id) {
        $this->mail_typology_id = $mail_typology_id;
    }

    public function setMailTypologyTitle($mail_typology_title) {
        $this->mail_typology_title = $mail_typology_title;
    }

    public function setMailTypologyObservation($mail_typology_observation) {
        $this->mail_typology_observation = $mail_typology_observation;
    }

    public function setActivityId($activity_id) {
        $this->activity_id = $activity_id;
    }

    public function setTreatmentDurationId($treatment_duration_id) {
        $this->treatment_duration_id = $treatment_duration_id;
    }

    // Getters
    public function getMailTypologyId() {
        return $this->mail_typology_id;
    }

    public function getMailTypologyTitle() {
        return $this->mail_typology_title;
    }

    public function getMailTypologyObservation() {
        return $this->mail_typology_observation;
    }

    public function getActivityId() {
        return $this->activity_id;
    }

    public function getTreatmentDurationId() {
        return $this->treatment_duration_id;
    }

    // Database operations
    public function createMailTypology($mail_typology_id, $mail_typology_title, $mail_typology_observation, $activity_id, $treatment_duration_id) {
        $mail_typology = $this->getCnx()->prepare("INSERT INTO mail_typology (mail_typology_id, mail_typology_title, mail_typology_observation, activity_id, treatment_duration_id) VALUES (:mail_typology_id, :mail_typology_title, :mail_typology_observation, :activity_id, :treatment_duration_id)");
        $mail_typology->execute(["mail_typology_id" => $mail_typology_id, "mail_typology_title" => $mail_typology_title, "mail_typology_observation" => $mail_typology_observation, "activity_id" => $activity_id, "treatment_duration_id" => $treatment_duration_id]);
    }

    public function deleteMailTypology($mail_typology_id) {
        $mail_typology = $this->getCnx()->prepare('DELETE FROM mail_typology WHERE mail_typology_id = :id');
        $mail_typology->execute(['id' => $mail_typology_id]);
    }

    public function updateMailTypology($mail_typology_id, $mail_typology_title, $mail_typology_observation, $activity_id, $treatment_duration_id) {
        $mail_typology = $this->getCnx()->prepare('UPDATE mail_typology SET mail_typology_title = :mail_typology_title, mail_typology_observation = :mail_typology_observation, activity_id = :activity_id, treatment_duration_id = :treatment_duration_id WHERE mail_typology_id = :mail_typology_id');
        $mail_typology->execute([':mail_typology_id' => $mail_typology_id, ':mail_typology_title' => $mail_typology_title, 'mail_typology_observation' => $mail_typology_observation, ':activity_id' => $activity_id, 'treatment_duration_id' => $treatment_duration_id]);
    }


}
?>
