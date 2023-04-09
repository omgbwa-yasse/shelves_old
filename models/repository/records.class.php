<?php
require 'models/connexion.class.php';
class records extends connexion{
public $_id_record = NULL;
public $_record_nui;
public $_record_title;
public $_record_date_start;
public $_record_date_end;
public $_record_observation;
public $_record_status_title;
public $_record_status_id;
public $_record_classe_title;
public $_record_classe_code_title;
public $_record_classe_id;
public $_record_support_id;
public $_record_support_title;
public $_record_keyword_id;
public $_record_link_id ;
public $_record_container_id;
public $_record_container_title;
public $_record_classe;
public $_controlStatus;

public function __construct($id,$nui,$title,$date_start,$date_end,$observation,$status_title,$code_title,$support_title,$link,$container_title){
    $this->_id_record = $id ;
    $this->_record_nui = $nui;
    $this->_record_title = $title ;
    $this->_record_date_start = $date_start ;
    $this->_record_date_end = $date_end ;
    $this->_record_observation = $observation ;
    $this->_record_status_title = $status_title;
    $this->_record_classe_code_title = $code_title;
    $this->_record_support_title = $support_title ;
    $this->_record_link_id = $link;
    $this->_record_container_title = $container_title ;
}
public function saveRecord(){
    // je recupère les ID des container, support, status, classe
    $this->setStatusId();
    $this->setSupportId();
    $this->setContainerId();
    $this->setClasseId();

    // Je contrôle si le numéro unique existe dans la base
    if($this->controlNui() == TRUE){
        echo "Enreistrement annuler, le numéro existe déjà ...";
    } else {
        // J'enregistre les données
        $rqt = " INSERT INTO records (id_records,records_nui, records_title, 
        records_date_start,records_date_end, records_observation, 
        records_status_id, records_support_id, records_link_id, 
        container_id, classification_id ) 
        values ('".NULL."','".$this->_record_nui."','". $this->_record_title."','".$this->_record_date_start."',
        '". $this->_record_date_start."', '".$this->_record_observation."','".$this->_record_status_id."',
        '".$this->_record_support_id."', '".$this->_record_link_id."','".$this->_record_container_id."',
        '".$this->_record_classe_id."' )";

        $rqt = $this->getCnx()->prepare($rqt);
        if($rqt ->execute()){
        echo "Enregistrement effectué par la classe records...";
        };
    }
    
}
public function controlNui(){
    $control = "SELECT records_nui FROM records WHERE records.records_nui = '".$this->_record_nui."' " ;
    $control = $this->getCnx()->prepare($control);
    $control ->execute();
    foreach($control as $crtl){
        if($crtl['records_nui'] == $this->_record_nui)
        { $this->_controlStatus = TRUE; } else{ $this->_controlStatus = FALSE;}
        }
        return $this->_controlStatus ;
}
public function setClasseId(){
    $classeId = "SELECT classification_id FROM classification WHERE classification_code_title = '".$this->_record_classe_title."' " ;
    $classeId=$this->getCnx()->prepare($classeId);
    $classeId->execute();
    foreach($classeId as $id){
        $this->_record_classe_id = $id['classification_id'];
    }
}

public function setSupportId(){
    $supportId = "SELECT records_support_id FROM records_support WHERE records_support_title = '".$this->_record_support_title."' " ;
    $supportId = $this->getCnx()->prepare($supportId);
    $supportId ->execute();
    foreach($supportId as $id){
        $this->_record_support_id = $id['records_support_id'];
    }
}
public function setStatusId(){
    $statutId = "SELECT records_status_id FROM records_status WHERE records_status_title = '".$this->_record_status_title."' " ;
    $statutId =$this->getCnx()->prepare($statutId);
    $statutId->execute();
    foreach($statutId as $id){
        echo "<br> id du statut est :".$id['records_status_id'];
    $this->_record_status_id = $id['records_status_id'];
    }
}

public function setContainerId(){
    $containerId = "SELECT container_id FROM container WHERE container_reference = '".$this->_record_container_title."' " ;
    $containerId = $this->getCnx()->prepare($containerId);
    $containerId ->execute();
    foreach($containerId as $id){
        $this->_record_container_id = $id['container_id'];
    }
}

public function setIdRecords($id){
    $this->_id_record = $id ;
}
public function getRecordById(){
    // Je recupère les donnée avec condition sur ID
    $record = "SELECT records.id_records as id, 
            records.records_title as title, 
            records.records_nui as nui, 
            records.records_date_start as date_start, 
            records.records_date_end as date_end,
            records.records_observation as observation,
            classification.classification_code_title as code_title,
            records_support.records_support_title as support,
            records_status.records_status_title as statut,
            container.container_reference as boite
            FROM records
            LEFT JOIN records_support 
            ON records_support.records_support_id = records.records_support_id
            LEFT JOIN classification 
            ON classification.classification_id = records.classification_id
            LEFT JOIN records_status 
            ON records_status.records_status_id = records.records_status_id
            LEFT JOIN container 
            ON container.container_id = records.container_id
            WHERE records.id_records = '".$this->_id_record."'";

    $record = $this->getCnx() -> prepare($record);
    $record ->execute();
    $record->fetchAll($record);
    
    // Je set toute les propriétés de la classe courante
    foreach ($record as $current) {
       $this->_id_record = $current['id'];
       $this->_record_title = $current['title'];
       $this->_record_nui = $current['nui'];
       $this->_record_date_start = $current['date_start'];
       $this->_record_date_end = $current['date_end'];
       $this->_record_observation = $current['observation'];
       $this->_record_classe_code_title = $current['code_title'];
       $this->_record_support_title = $current['support'];
       $this->_record_container_title = $current['boite'];
    }
}


}?>