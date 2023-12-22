<?php
require_once "models/setting/customer.class.php";

class CustomerAddress extends customer{
    public $_customer_address_id;	
    public $_customer_address_phone1;	
    public $_customer_address_phone2;	
    public $_customer_address_email1;	
    public $_customer_address_email2;	
    public $_customer_address_location;
    public function __construct(){
        $this->_customer_address_id;
        $this->_customer_address_phone1;
        $this->_customer_address_phone2;
        $this->_customer_address_email1;
        $this->_customer_address_email2;
        $this->_customer_address_location;
    }

    // id de l'adresse
    
    public function getCustomerAddressId(){
        return $this->_customer_address_id ;
    }

    public function setCustomerAddressId($addressId){
        $this->_customer_address_id = $addressId;
    }
    // Numéro de téléphone n°1
    public function getCustomerAddressPhone1(){
        return $this->_customer_address_phone1 ;
    }
    public function setCustomerAddressPhone1($phone1){
        $this->_customer_address_phone1 = $phone1;
    }

    // Numéro de téléphone n°2
    public function getCustomerAddressPhone2(){
        return $this->_customer_address_phone2 ;
    }
    public function setCustomerAddressPhone2($phone2){
        $this->_customer_address_phone2 = $phone2;
    }
    // Adresse Email n°1
    public function getCustomerAddressEmail1(){
        return $this->_customer_address_email1 ;
    }
    public function setCustomerAddressEmail1($email1){
        $this->_customer_address_email1 = $email1;
    }

    // Adresse Email n°2
    public function getCustomerAddressEmail2(){
        $this->_customer_address_email2 ;
    }
    public function setCustomerAddressEmail2($email2){
        $this->_customer_address_email2 = $email2;
    }

    // Adresse localisation
    public function getCustomerAddressLocation(){
        return $this->_customer_address_location; 
    }
    public function setCustomerAddressLocation($location){
        $this->_customer_address_location = $location;
    }


// Create (INSERT)
public function createCustomerAddress($customer_address_id, $customer_address_phone1, 
    $customer_address_phone2, $customer_address_email1, 
    $customer_address_email2, $customer_address_location) {
    $sql = "INSERT INTO customer_address (customer_address_id, customer_address_phone1, 
    customer_address_phone2, customer_address_email1, 
    customer_address_email2, customer_address_location)
    VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->getCnx()->prepare($sql);
    $stmt->execute([$customer_address_id, $customer_address_phone1, 
    $customer_address_phone2, $customer_address_email1, 
    $customer_address_email2, $customer_address_location]);
}
        
// Read (SELECT)
        public function getCustomerAddressById($customerAddressId) {
            $sql = "SELECT * FROM customer_address WHERE customer_address_id = ?";
            $stmt = $this->getCnx()->prepare($sql);
            $stmt->execute([$customerAddressId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
    
        // Update (UPDATE)
        public function updateCustomerAddress($data) {
            $sql = "UPDATE customer_address
                    SET customer_address_phone1 = ?, customer_address_phone2 = ?, customer_address_email1 = ?, customer_address_email2 = ?, customer_address_location = ?
                    WHERE customer_address_id = ?";
            $stmt = $this->getCnx()->prepare($sql);
            $stmt->execute($data);
        }
    
        // Delete (DELETE)
        public function deleteCustomerAddress($customerAddressId) {
            $sql = "DELETE FROM customer_address WHERE customer_address_id = ?";
            $stmt = $this->getCnx()->prepare($sql);
            $stmt->execute([$customerAddressId]);
        }
    
}



?>