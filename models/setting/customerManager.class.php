<?php
require_once 'models/connexion.class.php';

class customerManager extends connexion{
    public function allCustomer(){
        $stmt = $this->getCnx()->prepare("SELECT customer_id as id  FROM customer ORDER BY customer_name ASC");
        $stmt ->execute();
        $stmt = $stmt ->fetchAll(PDO::FETCH_ASSOC);
        return $stmt;
    }
}
?>