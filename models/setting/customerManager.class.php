<?php
require_once 'models/connexion.class.php';

class customerManager extends connexion{


    public function allOrganizationByCustomerId($id) {
        $stmt = $this->getCnx()->prepare("SELECT organization_id as id  FROM customer_organization WHERE customer_id =:id");
        $stmt ->execute([":id"=> $id]);
        $stmt = $stmt ->fetchAll(PDO::FETCH_ASSOC);
        return $stmt;
    }
    public function allCustomer(){
        $stmt = $this->getCnx()->prepare("SELECT customer_id as id  FROM customer ORDER BY customer_name ASC");
        $stmt ->execute();
        $stmt = $stmt ->fetchAll(PDO::FETCH_ASSOC);
        return $stmt;
    }
}
?>