<?php

require_once "models/setting/customer.class.php";
class customerOrganisation extends customer {

    public $_organization_id;
    public $_customer_id;
    public function __construct() {
        $this->_organization_id;
        $this->_customer_id;
    }


    // Customer organization 
    public function setCustomerOrganizationId($id) {
        $this->_organization_id = $id;
    }
    public function getCustomerOrganizationId(){
        return $this->_customer_id;
    }

    // Customer
    public function setCustomerId($id) {
        $this->_customer_id = $id;
    }
    public function getCustomer(){
        return $this->_customer_id;
    }

    // CRUD
        public function save() {
            $sql = "INSERT INTO customer_organization (customer_id, organization_id) VALUES (:customer_id, :organization_id)";
            $stmt = $this->getCnx()->prepare($sql);
            $stmt->bindParam(":customer_id", $this->_customer_id);
            $stmt->bindParam(":organization_id", $this->_organization_id);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    
        public function delete() {
            $sql = "DELETE FROM customer_organization WHERE customer_id = :customer_id AND organization_id = :organization_id";
            $stmt = $this->getCnx()->prepare($sql);
            $stmt->bindParam(":customer_id", $this->_customer_id);
            $stmt->bindParam(":organization_id", $this->_organization_id);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    
        public function update($new_customer_id, $new_organization_id) {
            $sql = "UPDATE customer_organization SET customer_id = :new_customer_id, organization_id = :new_organization_id WHERE customer_id = :customer_id AND organization_id = :organization_id";
            $stmt = $this->getCnx()->prepare($sql);
            $stmt->bindParam(":new_customer_id", $new_customer_id);
            $stmt->bindParam(":new_organization_id", $new_organization_id);
            $stmt->bindParam(":customer_id", $this->_customer_id);
            $stmt->bindParam(":organization_id", $this->_organization_id);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    
        public function hydrate() {
            $sql = "SELECT * FROM customer_organization WHERE customer_id = :customer_id AND organization_id = :organization_id";
            $stmt = $this->getCnx()->prepare($sql);
            $stmt->bindParam(":customer_id", $this->_customer_id);
            $stmt->bindParam(":organization_id", $this->_organization_id);

            if($stmt->execute()) {
                return $stmt->fetchObject();
            } else {
                return null;
            }
        }
    }
    ?>













}?>