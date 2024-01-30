<?php
require_once "models/setting/customerOrganizationManager.class.php";
class customerOrganization extends customerOrganizationManager {

    public $_organization_id;
    public $_customer_id;
    public function __construct() {
        $this->_organization_id;
        $this->_customer_id;
    }

    // Verifie si usager est associé à une organisation
    public function customerOrganizationExist($id) {
            $stmt = $this->getCnx()->prepare("SELECT COUNT(*) FROM customer_organization WHERE customer_id = :customerId");
            $stmt->bindParam(':customerId', $id, PDO::PARAM_INT); 
            $stmt->execute();
            $existe = $stmt->fetchColumn(); 
            return $existe > 0; 
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
    public function getCustomerId(){
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
            $sql = "SELECT * FROM customer_organization WHERE customer_id = :customer_id";
            $stmt = $this->getCnx()->prepare($sql);
            $stmt->bindParam(":customer_id", $this->_customer_id);
            if($stmt->execute()) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return null;
            }
        }

        public function hydrateById(INT $id) {
            $sql = "SELECT * FROM customer_organization WHERE customer_id = :customer_id";
            $stmt = $this->getCnx()->prepare($sql);
            $stmt->bindParam(":customer_id", $id);
            if($stmt->execute()) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return null;
            }
        }
    }
    ?>













}?>