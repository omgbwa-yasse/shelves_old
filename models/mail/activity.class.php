<?php
require_once 'models/connexion.class.php';

class Activity extends Connexion {
    // Variables
    private $activity_id;
    private $activity_title;
    private $activity_parent_id;

    public function __construct() {
        $this->activity_id = NULL;
        $this->activity_title = NULL;
        $this->activity_parent_id = NULL;
    }

    // Setters
    public function setActivityId($activity_id) {
        $this->activity_id = $activity_id;
    }

    public function setActivityTitle($activity_title) {
        $this->activity_title = $activity_title;
    }

    public function setActivityParentId($activity_parent_id) {
        $this->activity_parent_id = $activity_parent_id;
    }

    // Getters
    public function getActivityId() {
        return $this->activity_id;
    }

    public function getActivityTitle() {
        return $this->activity_title;
    }

    public function getActivityParentId() {
        return $this->activity_parent_id;
    }
    
    // Database operations
    public function createActivity($activity_id, $activity_title, $activity_parent_id) {
        $activity = $this->getCnx()->prepare("INSERT INTO activity (activity_id, activity_title, activity_parent_id) VALUES (:activity_id, :activity_title, :activity_parent_id)");
        $activity->execute(["activity_id" => $activity_id, "activity_title" => $activity_title, "activity_parent_id" => $activity_parent_id]);
    }

    public function deleteActivity($activity_id) {
        $activity = $this->getCnx()->prepare('DELETE FROM activity WHERE activity_id = :id');
        $activity->execute(['id' => $activity_id]);
    }

    public function updateActivity($activity_id, $activity_title, $activity_parent_id) {
        $activity = $this->getCnx()->prepare('UPDATE activity SET activity_title = :activity_title, activity_parent_id = :activity_parent_id WHERE activity_id = :activity_id');
        $activity->execute([':activity_id' => $activity_id, ':activity_title' => $activity_title, 'activity_parent_id' => $activity_parent_id]);
    }
   
    
}
?>
