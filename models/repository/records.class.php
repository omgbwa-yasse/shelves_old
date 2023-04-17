<?php
require_once 'models/repository/recordsManager.class.php';
class records extends recordsManager{
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

public function __construct(){
    $this->_id_record;
    $this->_record_nui;
    $this->_record_title;
    $this->_record_date_start;
    $this->_record_date_end;
    $this->_record_observation;
    $this->_record_status_title;
    $this->_record_classe_code_title;
    $this->_record_support_title;
    $this->_record_link_id ;
    $this->_record_container_title ;
}

// Les Setters et les Getters
// Les Identifiants de la notices
public function setRecordId($id){ $this->_id_record = $id;}
public function getRecordId(){ return $this->_id_record;}

// Numéro d'identifiaction Unique
public function setRecordNui($nui){ $this->_record_nui = $nui;}
public function getRecordNui(){ return $this->_record_nui;}
public function controlNui(){
    $control = "SELECT records_nui FROM records WHERE records.records_nui = '".$this->getRecordNui()."' " ;
    $control = $this->getCnx()->prepare($control);
    $control ->execute();
    foreach($control as $crtl){
        if($crtl['records_nui'] == $this->_record_nui)
        { $this->_controlStatus = TRUE; } else{ $this->_controlStatus = FALSE;}
        }
        return $this->_controlStatus ;
}
public function setRecordTempNui(){
    $id = NULL;
    $lastId = "SELECT id_records FROM records LIMIT 1 ORDER BY id_records DESC";
    $lastId = $this->getCnx() -> prepare($lastId);
    $lastId -> execute();
    foreach($lastId as $ref){
        $id = $ref['id_records'] + 1 . rand(0,21);
    }
    $this->_record_nui = "temp_". $id ;
    return  $this->_record_nui;
}

// Intitulé de la ressource

public function setRecordTitle($title){ $this->_record_title = $title;}
public function getRecordTitle(){ return $this->_record_title;}

// date de début

public function setRecordDateStart($date_start){ $this->_record_date_start = $date_start;}
public function getRecordDateStart(){ return $this->_record_date_start;}

// date de fin

public function setRecordDateEnd($date_end){ $this->_record_date_end = $date_end;}
public function getRecordDateEnd(){ return $this->_record_date_end;}

// Les observations

public function setRecordObservation($observation){ $this->_record_observation = $observation;}
public function getRecordObservation(){ return $this->_record_observation;}

// Statut des documents
public function setRecordStatusTitle($tatus_title){ $this->_record_status_title = $tatus_title ;}
public function getRecordStatusTitle(){ return $this->_record_status_title;}
public function setRecordStatusId(){
    $statutId = "SELECT records_status_id FROM records_status WHERE records_status_title = '".$this->getRecordStatusTitle()."' " ;
    $statutId =$this->getCnx()->prepare($statutId);
    $statutId->execute();
    foreach($statutId as $id){
        echo "<br> id du statut est :".$id['records_status_id'];
    $this->_record_status_id = $id['records_status_id'];
    }
}

public function getRecordStatusId(){ return $this->_record_status_id;}

// Classe de la classification

public function setRecordClasseCodeTitle($classe_code_title){ $this->_record_classe_code_title = $classe_code_title;}
public function getRecordClasseCodeTitle(){ return $this->_record_classe_code_title;}
public function setRecordClasseId(){
    $classeId = "SELECT classification_id FROM classification WHERE classification_code_title = '".$this->getRecordStatusTitle()."' " ;
    $classeId=$this->getCnx()->prepare($classeId);
    $classeId->execute();
    foreach($classeId as $id){
        $this->_record_classe_id = $id['classification_id'];
    }
}
public function getRecordClasseId(){return $this->_record_classe_id;}
// Support

public function setRecordSupportTitle($support_title){ $this->_record_support_title = $support_title;}
public function getRecordSupportTitle(){ return $this->_record_support_title;}

public function setRecordSupportId(){
    $supportId = "SELECT records_support_id FROM records_support WHERE records_support_title = '".$this->getRecordSupportTitle()."' " ;
    $supportId = $this->getCnx()->prepare($supportId);
    $supportId ->execute();
    foreach($supportId as $id){
        $this->_record_support_id = $id['records_support_id'];
    }
}
public function getRecordSupportId(){return $this->_record_support_id; }

// Lien decription parent
public function setRecordLinkId($link_id){ $this->_record_link_id = $link_id;}
public function getRecordLinkId(){ return $this->_record_link_id;}

// Contenant (boite) archives
public function setRecordContainerTitle($container_title){ $this->_record_container_title = $container_title;}
public function getRecordContainerTitle(){ return $this->_record_container_title;}

public function setRecordContainerId(){
    $containerId = "SELECT container_id FROM container WHERE container_reference = '".$this->getRecordContainerTitle()."' " ;
    $containerId = $this->getCnx()->prepare($containerId);
    $containerId ->execute();
    foreach($containerId as $id){
        $this->_record_container_id = $id['container_id'];
    }
}
public function getRecordContainerId(){ return $this->_record_container_id;}
// Les fonctions 
public function saveRecord(){
        // je recupère les ID des container, support, status, classe
        $this->setRecordStatusId();
        $this->setRecordSupportId();
        $this->setRecordContainerId();
        $this->setRecordClasseId();

        // J'enregistre les données
        $rqt = " INSERT INTO records (id_records,records_nui, records_title, 
        records_date_start,records_date_end, records_observation, 
        records_status_id, records_support_id, records_link_id, 
        container_id, classification_id ) 
        values ('".$this->getRecordId()."','".$this->getRecordNui()."','". $this->getRecordTitle()."','".$this->getRecordDateStart()."',
        '". $this->getRecordDateEnd()."', '".$this->getRecordObservation()."','".$this->getRecordStatusId()."',
        '".$this->getRecordSupportId()."', '".$this->getRecordLinkId()."','".$this->getRecordContainerId()."',
        '".$this->getRecordClasseId()."' )";

        $rqt = $this->getCnx()->prepare($rqt);
        if($rqt ->execute()){
        echo "Enregistrement effectué par la classe records...";
        };
}
public function getAllKeywordsIdByRecordId(){
    $listwords = NULL;
    $rqt = "SELECT records_keywords.keyword_id FROM records_keywords WHERE records_keywords.records_id = '". $this->getRecordId()."' ";
    $rqt = $this->getCnx()-> prepare($rqt);
    $rqt -> execute();
    return $rqt;
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
            WHERE records.id_records = '".$this->getRecordId()."'";

    $record = $this->getCnx() -> prepare($record);
    $record ->execute();

    // Je set toute les propriétés de la classe courante
    foreach ($record as $current) {
       $this->setRecordId($current['id']);
       $this->setRecordTitle($current['title']);
       $this->setRecordNui($current['nui']);
       $this->setRecordDateStart($current['date_start']);
       $this->setRecordDateStart($current['date_end']);
       $this->setRecordObservation($current['observation']);
       $this->setRecordClasseCodeTitle($current['code_title']);
       $this->setRecordSupportTitle($current['support']);
       $this->setRecordContainerTitle($current['boite']);
    }
}
public function deleteRecord($id){
    $rqt ="DELETE FROM records WHERE records.id_records = '". $id ."'";
    $rqt = $this->getCnx()->prepare($rqt);
    if($rqt -> execute()){echo " Enregistrement supprimé ... ";};
}



}?>