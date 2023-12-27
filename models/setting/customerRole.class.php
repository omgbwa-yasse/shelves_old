<?php

require_once 'models/userRole/userRoleManager.class.php';
class customerRole extends connexion{
    public $_repository;
    public $_transfer;
    public $_audit;
    public $_communication;
    public $_dolly;
    public $_deposit;
    public $_tools;
    public $_setting;
    public $_customer_role_id;
    public $_customer_id;




    public function setRepositoryRole($repository){
        if($repository == NULL){
            $this->_repository = FALSE;
        } else{
            $this->_repository = TRUE;
        }
    }
    public function getRepositoryRole(){
        return $this->_repository;
    }

    public function setTransferRole($transfer){
        if($transfer == NULL){
            $this->_transfer = FALSE;
        } else{
            $this->_transfer = TRUE;
        }
    }
    public function getTransferRole(){
        return $this->_transfer;
    }

    public function setAuditRole($audit){
        if($audit == NULL){
            $this->_audit = FALSE;
        } else{
            $this->_audit = TRUE;
        }
    }
    public function getAuditRole(){
        return $this->_audit;
    }

    public function setCommunicationRole($communication){
        if($communication == NULL){
            $this->_communication = FALSE;
        } else{
            $this->_communication = TRUE;
        }
    }
    public function getCommunicationRole(){
        return $this->_communication;
    }

    public function setDollyRole($dolly){
        if($dolly == NULL){
            $this->_dolly = FALSE;
        } else{
            $this->_dolly = TRUE;
        }
    }
    public function getDollyRole(){
        return $this->_dolly;
    }

    public function setDepositRole($deposit){
        $this->_deposit = $deposit;
        if($deposit == NULL){
            $this->_deposit = FALSE;
        } else{
            $this->_deposit = TRUE;
        }
    }
    public function getDepositRole(){
        return $this->_deposit;
    }
    
    public function setSettingRole($setting){
        if($setting == NULL){
            $this->_setting = FALSE;
        } else{
            $this->_setting = TRUE;
        }
    }
    public function getSettingRole(){
        return $this->_setting;
    }

    public function setToolsRole($tools){
        if($tools == NULL){
            $this->_tools = FALSE;
        } else{
            $this->_tools = TRUE;
        }
    }
    public function getToolsRole(){
        return $this->_tools;
    }
    
    public function setRoleId($role){
        $this->_customer_role_id = $role;
    }
    public function getRoleId(){
        return $this->_customer_role_id;
    }

    public function setUserId(INT $userId){
        $this->_customer_id = $userId;
    }
    public function getUserId(){
        return $this->_customer_id;
    }

    public function getUserRoles(){ 
        $stmt = $this->getCnx()->prepare("SELECT * FROM customer_role_id WHERE customer_id =:id");
        $stmt->execute(['id' => $this->getUserId()]); 
        $stmt = $stmt->fetchAll(PDO::FETCH_OBJ); 
        return $stmt; 
    }

    public function updateRole($repository,$transfert,$audit,$communication,$dolly,$deposit, $setting,$tools,$customer_id){
        $stmt = $this->getCnx()->prepare("UPDATE customer_role_id SET 
            customer_role_repository = ?, 
            customer_role_transfert = ?,
            customer_role_audit = ?,
            customer_role_communication = ?,
            customer_role_dolly = ?, 
            customer_role_room = ?, 
            customer_role_setting = ? 
            customer_role_tools = ? 
        WHERE customer_id =?");
            $stmt->bindValue(1, $repository,PDO::PARAM_BOOL);
            $stmt->bindValue(2, $transfert,PDO::PARAM_BOOL);
            $stmt->bindValue(3, $audit,PDO::PARAM_BOOL);
            $stmt->bindValue(4, $communication,PDO::PARAM_BOOL);
            $stmt->bindValue(5, $dolly,PDO::PARAM_BOOL);
            $stmt->bindValue(6, $deposit,PDO::PARAM_BOOL);
            $stmt->bindValue(7, $setting,PDO::PARAM_BOOL);
            $stmt->bindValue(8, $tools,PDO::PARAM_BOOL);
            $stmt->bindValue(9, $customer_id,PDO::PARAM_INT);
    }

    public function saveRole(){
        $stmt = $this->getCnx()->prepare("INSERT INTO customer_role_id(
            customer_role_repository, 
            customer_role_transfer, 
            customer_role_audit,
            customer_role_communication, 
            customer_role_dolly, 
            customer_role_room, 
            customer_role_setting, 
            customer_role_tools 
        ) VALUES (?,?,?,?,?,?,?,?) WHERE customer_id =?");
        $stmt->bindValue(1,$this->getRepositoryRole(),PDO::PARAM_BOOL);
        $stmt->bindValue(2,$this->getTransferRole(),PDO::PARAM_BOOL);
        $stmt->bindValue(3,$this->getAuditRole(),PDO::PARAM_BOOL);
        $stmt->bindValue(4,$this->getCommunicationRole(),PDO::PARAM_BOOL);
        $stmt->bindValue(5,$this->getDollyRole(),PDO::PARAM_BOOL);
        $stmt->bindValue(6,$this->getDepositRole(),PDO::PARAM_BOOL);
        $stmt->bindValue(7,$this->getSettingRole(),PDO::PARAM_BOOL);
        $stmt->bindValue(8,$this->getToolsRole(),PDO::PARAM_BOOL);
        $stmt->bindValue(9,$this->getUserId(), PDO::PARAM_INT);
    }


}
    

?>