<?php
require_once 'models/transfer/transferManager.class.php';
require_once 'models/global/userGlobalSetting.class.php';
class transfer extends transferManager{
use userGlobalSetting;
public $_record_transfer_id;
public $_record_transfer_reference;
public $_record_transfer_title;
public $_record_transfer_observation;
public $_record_transfer_date_creation;
public $_record_transfer_date_authorize;
public $_record_transfer_status_id;
public $_organization_id;
public $_record_transfer_user_id;

// id
public function setTransferId(int $transferId)
{
    if (!is_int($transferId) || $transferId < 1) {
        throw new \InvalidArgumentException("L'identifiant du transfert doit être un entier positif.");
    }

    $this->_record_transfer_id = $transferId;
}

public function getTransferId()
{
    return $this->_record_transfer_id;
}


// reference
public function setTransferReference($transferReference)
{
    $this->_record_transfer_reference = htmlspecialchars($transferReference);
}
public function getTransferReference()
{
    return $this->_record_transfer_reference;
}


// User
public function setTransferUserId($transfer_user_id)
{
    $this->_user_id = htmlspecialchars($transfer_user_id);
}
public function getTransferUserId() : int
{
    /* 
    if (!is_int($this->_record_transfer_user_id) || $this->_record_transfer_user_id < 0) {
        $this->hydrateByPseudo($_COOKIE['pseudo']);
        $this->_record_transfer_user_id = $this->getUserId();} 
    */
    return $this->_record_transfer_user_id = 1;
}

// title 
public function setTransferTitle($transferTitle){
    $this->_record_transfer_title = htmlspecialchars($transferTitle);
}
public function getTransferTitle(){
    return $this->_record_transfer_title;
}

// Observation


public function setTransferObservation($transferObservation){
    $this->_record_transfer_observation = htmlspecialchars($transferObservation);
}
public function getTransferObservation(){
    return $this->_record_transfer_observation;
}


// Date creation
public function setTransfertDateCreation($date = null) {
    if ($date === null) {
        $this->_record_transfer_date_creation = date('d-m-Y');
    } else {
        $this->_record_transfer_date_creation = $date;
    }
}
public function getTransferDateCreation(){
    if(is_null($this->_record_transfer_date_creation)){
        $this->setTransfertDateCreation();
    }
    return $this->_record_transfer_date_creation;
}


// Date authorize
public function setTransferDateAuthorize($transferDateAuthorize){
    if(!is_null($transferDateAuthorize)){
        $this->_record_transfer_date_authorize = htmlspecialchars($transferDateAuthorize);
    }
}
public function getTransferDateAuthorize(){
    return $this->_record_transfer_date_authorize;
}

// Organization

public function setTransferOrganizationId(INT $id){
    $this->_organization_id = $id;
}
public function getTransferOrganizationId(){
    return $this->_organization_id;
}



// Date status
public function setTransferStatusId(INT $transferStatusId){
    if (!is_int($transferStatusId) || $transferStatusId < 1) {
        throw new \InvalidArgumentException("L'identifiant du statut du transfert doit être un entier positif.");
    }
    $this->_record_transfer_status_id = $transferStatusId;
}

public function getTransferStatusId(){
    return $this->_record_transfer_status_id;
}

public function transfertLastRecordNui(){
    $stmt = $this->getCnx()->prepare("SELECT record_nui as nui FROM record WHERE record_transfer_id =:id ORDER BY record_id DESC LIMIT 1");
    $stmt -> execute([':id' => $this->getTransferId()]);
    $stmt = $stmt -> fetch(PDO::FETCH_ASSOC);
}

// Recupération des données de la base, fonction secondaire
public function hydrateById(INT $id){
    $stmt = $this->getCnx()->prepare("SELECT * FROM record_transfer WHERE record_transfer_id =:id ");
    $stmt -> execute([':id' => $id]);
    $stmt = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    foreach($stmt as $status){
        $this->setTransferId($status['record_transfer_id']);
        $this->setTransferReference($status['record_transfer_reference']);
        $this->setTransferTitle($status['record_transfer_title']);
        $this->setTransferObservation($status['record_transfer_observation']);
        $this->setTransfertDateCreation($status['record_transfer_date_creation']);
        $this->setTransferDateAuthorize($status['record_transfer_date_authorize']);
        $this->setTransferOrganizationId($status['organization_id']);
        $this->setTransferStatusId($status['record_transfer_status_id']);
    }
}
public function hydrateByReference($reference){
    $reference = htmlspecialchars($reference);
    $stmt = $this->getCnx()->prepare("SELECT * FROM record_transfer WHERE record_transfer_reference =:id ");
    $stmt -> execute([':id' => $reference]);
    $stmt = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    foreach($stmt as $status){
        $this->setTransferId($status['record_transfer_id']);
        $this->setTransferReference($status['record_transfer_reference']);
        $this->setTransferTitle($status['record_transfer_title']);
        $this->setTransferObservation($status['record_transfer_observation']);
        $this->setTransfertDateCreation($status['record_transfer_date_creation']);
        $this->setTransferDateAuthorize($status['record_transfer_date_authorize']);
        $this->setTransferOrganizationId($status['organization_id']);
        $this->setTransferStatusId($status['record_transfer_status_id']);
    }
    
}

// creation des versements

public function createTransfer()
{
    $stmt = $this->getCnx()->prepare('INSERT INTO record_transfer (
        record_transfer_reference,
        record_transfer_title,
        record_transfer_date_creation,
        record_transfer_date_authorize,
        record_transfer_observation,
        record_transfer_status_id,
        organization_id
      )
      VALUES (
        :transferReference,
        :transferTitle,
        :transferDateCreation,
        :recordTransferDateAuthorize,
        :transferObservation,
        :recordTransferStatusId,
        :organizationId
      )');
      
      $stmt->bindValue(':transferReference', $this->getTransferReference());
      $stmt->bindValue(':transferTitle', $this->getTransferTitle());
      $stmt->bindValue(':transferDateCreation', $this->getTransferDateCreation());
      $stmt->bindValue(':recordTransferDateAuthorize', $this->getTransferDateAuthorize());
      $stmt->bindValue(':transferObservation', $this->getTransferObservation());
      $stmt->bindValue(':recordTransferStatusId', $this->getTransferStatusId());
      $stmt->bindValue(':organizationId', $this->getTransferOrganizationId());
      
      $stmt->execute();
}

// Mise à jour du versement
public function updateTransfer(): bool 
{
    $stmt = $this->getCnx()->prepare(
        "UPDATE transfer
SET
    record_transfer_reference = :transferRef,
    record_transfer_title = :transferTitle,
    record_transfer_observation = :transferObservation,
    record_transfer_date_creation = :transferDateCreation,
    record_transfer_date_authorize = :transferDateAuthorize,
    record_transfer_status_id = :transferStatusId,
    organization_id = :organizationId,
    user_id =:userId
WHERE id = :transferId;"
    );

    $stmt->bindValue(':transferId', $this->getTransferId());
    $stmt->bindValue(':transferRef', $this->getTransferReference());
    $stmt->bindValue(':transferTitle', $this->getTransferTitle());
    $stmt->bindValue(':transferObservation', $this->getTransferObservation());
    $stmt->bindValue(':transferDateCreation', $this->getTransferDateCreation());
    $stmt->bindValue(':transferDateAuthorize', $this->getTransferDateAuthorize());
    $stmt->bindValue(':transferStatusId', $this->getTransferStatusId());
    $stmt->bindValue(':organizationId', $this->getTransferOrganizationId());
    $stmt->bindValue(':userId', $this->getTransferUserId());
    $stmt->execute();
    return $stmt->rowCount() == 1;
}


// Supprimer les versements
public function deleteTransfer(int $transferId): bool {
    $stmt = $this->getCnx()->prepare(
        "DELETE FROM record_transfer WHERE id = :transferId;"
    );
    $stmt->bindValue(':transferId', $transferId);
    $stmt->execute();
    return $stmt->rowCount() == 1;
}

}?>