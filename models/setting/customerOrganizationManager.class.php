<?php
require_once 'models/connexion.class.php';
class customerOrganizationManager extends connexion {



    public function allOrganizationByCustomerId($custimerId) {
        $sql = "SELECT organization_id FROM customer_organization WHERE customer_id = :customer_id";
        $stmt = $this->getCnx()->prepare($sql);
        $stmt->bindParam(":customer_id", $custimerId);
        if($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }





}?>