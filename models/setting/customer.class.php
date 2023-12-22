<?php

require_once "models/setting/customerManager.class.php";
class customer extends customerManager{
    private $_customer_id;
    private $_customer_pseudo;
    private $_customer_password;
    private $_customer_name;
    private $_customer_surname;
    private $_customer_sand;
    private $_customer_birthday;
    private $_customer_gender;
    private $_organization_id ;
    private $_customer_address_id ;

    public function __construct(){
        $this->_customer_pseudo;
        $this->_customer_password;
        $this->_customer_name;
        $this->_customer_surname;
        $this->_customer_id;
        $this->_customer_sand;
        $this->_customer_birthday;
        $this->_customer_gender;
        $this->_organization_id;
        $this->_customer_address_id;
    }
    public function getCustomerSand(){ return $this->_customer_sand;}
    public function createCustomerSand(){
        $fullSand = sha1(rand(1,1000)."G2D".time().rand(1,1000));
        $this->_customer_sand = substr($fullSand,0,5);
    }

    public function setCustomerSand($sand){ $this->_customer_sand = $sand; }
    
    public function setCustomerName($name){ $this->_customer_name = $name;}
    public function getCustomerName(){ return $this->_customer_name;}
    public function setCustomerSurname($surname){ $this->_customer_surname = $surname;}
    public function getCustomerSurname(){ return $this->_customer_surname;}

    public function setCustomerBirthday($birthday){ $this->_customer_birthday = $birthday;}
    public function getCustomerBirthday(){ return $this->_customer_birthday;}

    public function setCustomerGender($gender){ $this->_customer_gender = $gender;}
    public function getCustomerGender(){ return $this->_customer_gender;}

    public function setCustomerOrganizationId($organizationId){ $this->_organization_id = $organizationId;}
    public function getCustomerOrganizationId(){ return $this->_organization_id;}

    public function setCustomerAddressId($addressId){ $this->_customer_address_id = $addressId;}
    public function getCustomerAddressId(){ return $this->_customer_address_id;}

    public function setPasswordByCrypt($password){ 
        $this->_customer_password = sha1(sha1($password).$this->getCustomerSand());
    }
 
    public function setCustomerSandByPseudo() {
        $stmt = $this->getCnx()->prepare('SELECT customer_sand FROM customer WHERE customer_pseudo = :pseudo');
        $stmt->execute([':pseudo' => $this->getCustomerPseudo()]);
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch();
            $this->setCustomerSand($row['customer_sand']);
            return true;
        } else {
            return false;
        }
    }
    public function hydrateById($id){
        $stmt = $this->getCnx()->prepare('SELECT * FROM customer WHERE customer_id = :customer_id');
        $stmt->execute([':customer_id' => $id]);
        if ($stmt->rowCount() > 0) {
            foreach ($stmt as $customer) {
                $this->setCustomerId($customer['customer_id']);
                $this->setCustomerName($customer['customer_name']);
                $this->setCustomerSurname($customer['customer_surname']);
                $this->setCustomerPseudo($customer['customer_pseudo']);
                $this->setCustomerPassword($customer['customer_password']);
                $this->setCustomerSand($customer['customer_sand']);
                $this->setCustomerBirthday($customer['customer_birthday']);
                $this->setCustomerGender($customer['customer_gender']);
                $this->setCustomerOrganizationId($customer['organization_id']);
                $this->setCustomerAddressId($customer['customer_address_id']);

            }
            return true;
        } else {
            return false;
        }
    }

    public function hydrateByPseudo($pseudo){
        $stmt = $this->getCnx()->prepare('SELECT * FROM customer WHERE customer_pseudo = :pseudo');
        $stmt->execute([':pseudo' => $pseudo]);
        if ($stmt->rowCount() > 0) {
            foreach ($stmt as $customer) {
                $this->setCustomerId($customer['customer_id']);
                $this->setCustomerName($customer['customer_name']);
                $this->setCustomerSurname($customer['customer_surname']);
                $this->setCustomerPseudo($customer['customer_pseudo']);
                $this->setCustomerPassword($customer['customer_password']);
                $this->setCustomerSand($customer['customer_sand']);
                $this->setCustomerBirthday($customer['customer_birthday']);
                $this->setCustomerGender($customer['customer_gender']);
                $this->setCustomerOrganizationId($customer['organization_id']);
                $this->setCustomerAddressId($customer['customer_address_id']);
            }
            return true;
        } else {
            return false;
        }
    }



    public function getCustomerId() { return $this->_customer_id; }

    public function setCustomerId($id) { $this->_customer_id = $id; }

    public function getCustomerPseudo() { return $this->_customer_pseudo; }

    public function setCustomerPseudo($Pseudo) {  $this->_customer_pseudo = $Pseudo; }

    public function getCustomerPassword() {  return $this->_customer_password;}

    public function setCustomerPassword($password) { $this->_customer_password = $password; }

public function passwordVerification() {
    $stmt = $this->getCnx()->prepare('SELECT customer_password FROM customer WHERE customer_pseudo = :customer_pseudo');
    $stmt->execute([':customer_pseudo' => $this->getCustomerPseudo()]);
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch();
        if($this->getCustomerPassword() == $row['customer_password']){ return true; } else { return false; };
    } else {
        return false;
    }
}


    public function customerExists() {
        $stmt = $this->getCnx()->prepare('SELECT * FROM customer WHERE customer_pseudo = :customer_pseudo');
        $stmt->execute([':customer_pseudo' => $this->getCustomerPseudo()]);
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function connect(){
        if($this->customerExists() && $this->passwordVerification()){
            $stmt = $this->getCnx()->prepare('SELECT * FROM customer WHERE customer_pseudo = :customer_pseudo AND customer_password = :customer_password');
            $stmt->execute([':customer_pseudo' => $this->getCustomerPseudo(), ':customer_password' => $this->getCustomerPassword()]);
            if ($stmt->rowCount() > 0) {
                foreach ($stmt as $customer) {
                    $this->setCustomerId($customer['customer_id']);
                    $this->setCustomerName($customer['customer_name']);
                    $this->setCustomerSurname($customer['customer_surname']);
                    $this->setCustomerPseudo($customer['customer_pseudo']);
                    $this->setCustomerPassword($customer['customer_password']);
                    $this->setCustomerSand($customer['customer_sand']);
                    $this->setCustomerBirthday($customer['customer_birthday']);
                    $this->setCustomerGender($customer['customer_gender']);
                    $this->setCustomerOrganizationId($customer['organization_id']);
                    $this->setCustomerAddressId($customer['customer_address_id']);
                }
                return true;
            } else {
                return false;
            }
        }
    }

    public function changePassword($customer_pseudo, $newPassword) {
        $stmt = $this->getCnx()->prepare('UPDATE customer SET customer_password = :newPassword WHERE customer_pseudo = :customer_pseudo');
        $stmt->execute([':newPassword' => $newPassword, ':customer_pseudo' => $customer_pseudo]);
    }

    public function changePseudo($customer_pseudo, $newPseudo) {
        $stmt = $this->getCnx()->prepare('UPDATE customer SET customer_pseudo = :newPseudo WHERE customer_pseudo = :customer_pseudo');
        $stmt->execute([':newPseudo' => $newPseudo, ':customer_pseudo' => $customer_pseudo]);
    }
    public function saveCustomer(){
        $stmt = $this->getCnx()->prepare("INSERT INTO customer(customer_pseudo,customer_name,customer_surname,customer_password, customer_sand, customer_birthday) VALUES(:customer_pseudo,:customer_name,:customer_surname,:customer_password,:customer_sand,:customer_birthday)");
        $stmt->execute([
            ':customer_pseudo' => $this->getCustomerPseudo(),
            ':customer_name' => $this->getCustomerName(),
            ':customer_surname' => $this->getCustomerSurname(),
            ':customer_password' => $this->getCustomerPassword(),
            ':customer_sand' => $this->getCustomerSand(),
            ':customer_birthday' => $this->getCustomerBirthday()
        ]);
        return $stmt->rowCount() > 0;
    }
    public function deleteCustomer($customer_pseudo, $customer_password) {
        $stmt = $this->getCnx()->prepare('SELECT * FROM customer WHERE customer_pseudo = :customer_pseudo AND customer_password = :customer_password');
        $stmt->execute([':customer_pseudo' => $customer_pseudo, ':customer_password' => $customer_password]);
        if ($stmt->rowCount() > 0) {
            $stmt = $this->getCnx()->prepare('DELETE FROM customer WHERE customer_pseudo = :customer_pseudo AND customer_password = :customer_password');
            $stmt->execute([':customer_pseudo' => $customer_pseudo, ':customer_password' => $customer_password]);
            return true;
        } else {
            return false;
        }
    }

}
?>