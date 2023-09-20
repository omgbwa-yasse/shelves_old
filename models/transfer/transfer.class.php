<?php
require_once 'models/transfer/transferManager.class.php';
class transfer extends transferManager{

public $_transfer_id;
public $_transfer_ref;
public $_transfer_title;
public $_transfer_observation;
public $_transfer_start_date;
public $_transfer_end_date;
public $_transfer_status_id;

// id
public function setTransferId($transferId)
{
    if (!is_int($transferId) || $transferId < 1) {
        throw new \InvalidArgumentException("L'identifiant du transfert doit être un entier positif.");
    }

    $this->_transfer_id = $transferId;
}

public function getTransferId()
{
    return $this->_transfer_id;
}


// reference
public function setTransferRef($transferRef)
{
    $this->_transfer_ref = $transferRef;
}
public function getTransferRef()
{
    return $this->_transfer_ref;
}


// title 
public function setTransferTitle($transferTitle)
{
    $this->_transfer_title = $transferTitle;
}
public function getTransferTitle()
{
    return $this->_transfer_title;
}

// Observation


public function setTransferObservation($transferObservation)
{
    $this->_transfer_observation = $transferObservation;
}
public function getTransferObservation()
{
    return $this->_transfer_observation;
}


// Date start
public function setTransferStartDate($transferStartDate)
{
    $this->_transfer_start_date = $transferStartDate;
}
public function getTransferStartDate()
{
    return $this->_transfer_start_date;
}


// date end
public function setTransferEndDate($transferEndDate)
{
    $this->_transfer_end_date = $transferEndDate;
}
public function getTransferEndDate()
{
    return $this->_transfer_end_date;
}


// Date status

public function setTransferStatusId($transferStatusId)
{
    if (!is_int($transferStatusId) || $transferStatusId < 1) {
        throw new \InvalidArgumentException("L'identifiant du statut du transfert doit être un entier positif.");
    }
    $this->_transfer_status_id = $transferStatusId;
}

public function getTransferStatusId()
{
    return $this->_transfer_status_id;
}

public function hydrate(array $data)
{
    foreach ($data as $key => $value) {
        $setter = 'set' . ucfirst($key);

        if (method_exists($this, $setter)) {
            $this->$setter($value);
        }
    }
}













}?>