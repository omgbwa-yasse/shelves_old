<?php
require_once 'models/repository/recordsManager.class.php';
class record extends recordsManager{
public $_record_id = NULL;
public $_record_nui;
public $_record_title;
public $_record_date_start;
public $_record_date_end;
public $_record_observation;
public $_record_status_title;
public $_record_status_id;
public $_record_classe_title;
public $_record_classe_code;
public $_record_classe_id;
public $_record_support_id;
public $_record_support_title;
public $_record_keyword_id;
public $_record_link_id ;
public $_record_container_id;
public $_record_container_title;
public $_record_volume;
public $_record_level;
public $_record_classe;
public $_controlStatus;
public $_organization_id;
public $_organization_title;


public function __construct(){
    $this->_record_id;
    $this->_record_nui;
    $this->_record_title;
    $this->_record_date_start;
    $this->_record_date_end;
    $this->_record_observation;
    $this->_record_status_title;
    $this->_record_classe_id;
    $this->_record_support_title;
    $this->_record_link_id ;
    $this->_record_container_title ;
    $this->_organization_title;
    $this->_organization_id;
    $this->_record_classe_code;
    $this->_record_classe_title;
    $this->_record_volume;
    $this->_record_level = 1;
}

// Les Setters et les Getters

// niveau de description
public function setRecordLevel($level){ $this->_record_level = $level; }
public function getRecordLevel(){ return $this->_record_level;}

// Les Identifiants de la notices
public function setRecordId($id){ $this->_record_id = $id;}
public function getRecordId(){ return $this->_record_id;}

// Numéro d'identifiaction Unique
public function setRecordNui($nui){ $this->_record_nui = $nui;}
public function getRecordNui(){ return $this->_record_nui;}

public function setRecordIdByNui(){
    $idRecords = "SELECT records.record_id FROM records WHERE record_nui = '".$this->getRecordNui()."' " ;
    $idRecords =$this->getCnx()->prepare($idRecords);
    $idRecords->execute();
    foreach($idRecords as $id) {
            $this->setRecordId($id['record_id']) ;
            }

}
public function controlNui(){
    $control = "SELECT record_nui FROM records WHERE records.record_nui = '".$this->getRecordNui()."' " ;
    $control = $this->getCnx()->prepare($control);
    $control ->execute();
    foreach($control as $crtl){
        if($crtl['record_nui'] == $this->_record_nui)
        { $this->_controlStatus = TRUE; } else{ $this->_controlStatus = FALSE;}
        }
        return $this->_controlStatus ;
}
public function setRecordTempNui(){
    $id = NULL;
    $lastId = "SELECT records.record_id FROM records ORDER BY records.record_id DESC LIMIT 1 ";
    $lastId = $this->getCnx() -> prepare($lastId);
    $lastId -> execute();
    foreach($lastId as $ref){
        $id = $ref['record_id'] + 1 . rand(0,21);
        $this->_record_nui = "temp_". $id ;
    }
    
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
    $statutId = "SELECT record_status_id FROM record_status WHERE record_status_title = '".$this->getRecordStatusTitle()."' " ;
    $statutId =$this->getCnx()->prepare($statutId);
    $statutId->execute();
    foreach($statutId as $id){
    $this->_record_status_id = $id['record_status_id'];
    }
}

public function getRecordStatusId(){ return $this->_record_status_id;}

// Classe de la classification

public function setRecordClasseCode($classe_code){ $this->_record_classe_code = $classe_code;}
public function getRecordClasseCode(){ return $this->_record_classe_code;}

public function setRecordClasseTitle($classe_title){ $this->_record_classe_title = $classe_title;}
public function getRecordClasseTitle(){ return $this->_record_classe_title;}


public function setRecordClasseByCode(){
    $classeId = "SELECT * FROM classification WHERE classification_code = '". $this->getRecordClasseCode()."' " ;
    $classeId=$this->getCnx()->prepare($classeId);
    $classeId->execute();
    foreach($classeId as $id){
        $this->_record_classe_id = $id['classification_id'];
        $this->_record_classe_code = $id['classification_code'];
        $this->_record_classe_title = $id['classification_title'];

    }}

public function setRecordClasseByTitle(){
    $classeId = "SELECT * FROM classification WHERE classification_title = '". $this->getRecordClasseTitle()."' " ;
    $classeId=$this->getCnx()->prepare($classeId);
    $classeId->execute();
    foreach($classeId as $id){
        $this->_record_classe_id = $id['classification_id'];
         $this->_record_classe_code = $id['classification_code'];
        $this->_record_classe_title = $id['classification_title'];
    }
}
public function setRecordClasseById(){
    $classeId = "SELECT * FROM classification WHERE classification_id = '". $this->getRecordClasseId()."' " ;
    $classeId=$this->getCnx()->prepare($classeId);
    $classeId->execute();
    foreach($classeId as $id){
        $this->_record_classe_id = $id['classification_id'];
        $this->_record_classe_code = $id['classification_code'];
        $this->_record_classe_title = $id['classification_title'];
    }
}




public function setRecordClasseId($id){ $this->_record_classe_id = $id;}
public function getRecordClasseId(){return $this->_record_classe_id;}

// Support

public function setRecordSupportTitle($support_title){ $this->_record_support_title = $support_title;}
public function getRecordSupportTitle(){ return $this->_record_support_title;}

public function setRecordSupportId(){
    $supportId = "SELECT record_support_id FROM record_support WHERE record_support_title = '".$this->getRecordSupportTitle()."' " ;
    $supportId = $this->getCnx()->prepare($supportId);
    $supportId ->execute();
    foreach($supportId as $id){
        $this->_record_support_id = $id['record_support_id'];
    }
}
public function getRecordSupportId(){return $this->_record_support_id; }

// Lien decription parent
public function setRecordLinkId($link_id){ $this->_record_link_id = $link_id;}
public function getRecordLinkId(){ return $this->_record_link_id;}

public function verificationRecordsChild(){ 
    $statut = FALSE; 
    $sql = "SELECT COUNT(*) FROM Records WHERE records.record_link_id = '".$this->getRecordId()."'"; 
    $rqt = $this->getCnx()->prepare($sql); 
    $rqt ->execute(); 
    $occurence = $rqt->fetchColumn(); 
    if($occurence > 0){ $statut = TRUE; } else{ $statut = FALSE; } 
return $statut; 
}
public function verificationRecordsParent(){ 
    $statut = NULL; 
    $sql = "SELECT records.record_link_id as id_parent FROM Records WHERE records.record_id = '".$this->getRecordId()."'"; 
    $rqt = $this->getCnx()->prepare($sql); 
    $rqt ->execute(); 
    $rqt = $rqt->fetchAll(); 
    foreach($rqt as $value){
        if($value['id_parent'] == NULL){ $statut = FALSE;} else{ $statut = TRUE; }
    }
    return $statut; 
}
// Organization
public function setRecordOrganizationIdByTitle(){
    $rqt= "SELECT organization_id FROM organization WHERE organization_title = '". $this->getRecordOrganizationTitle() ."'" ;
    $rqt=$this->getCnx()->prepare($rqt);
    $rqt->execute();
    foreach($rqt as $id){
        $this->_organization_id = $id['organization_id'];
    }
}
public function setRecordOrganizationTitleById(){
    $rqt= "SELECT organization_title FROM organization WHERE organization_id = '". $this->getRecordOrganizationId() ."'" ;
    $rqt=$this->getCnx()->prepare($rqt);
    $rqt->execute();
    foreach($rqt as $title){
        $this->_organization_title = $title['organization_title'];
    }
}


public function getRecordOrganizationTitle(){
   return $this->_organization_title;
}
public function getRecordOrganizationId(){
    return $this->_organization_id;
 }
public function setRecordOrganizationId($id){
    $this->_organization_id = $id;
}
public function setRecordOrganizationTitle($title){
    $this->_organization_title = $title;
}


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
        $this->setRecordClasseById();
        $this->setRecordOrganizationIdByTitle();

        // J'enregistre les données
        $rqt = " INSERT INTO records (record_id,record_nui, record_title, 
        record_date_start,record_date_end, record_observation, 
        record_status_id, record_support_id, record_link_id, 
        container_id, classification_id, organization_id ) 
        values ('".$this->getRecordId()."','".$this->getRecordNui()."','". $this->getRecordTitle()."','".$this->getRecordDateStart()."',
        '". $this->getRecordDateEnd()."', '".$this->getRecordObservation()."','".$this->getRecordStatusId()."',
        '".$this->getRecordSupportId()."', '".$this->getRecordLinkId()."','".$this->getRecordContainerId()."',
        '".$this->getRecordClasseId()."', '".$this->getRecordOrganizationId()."' )";

        $rqt = $this->getCnx()->prepare($rqt);
        $rqt ->execute();
}
public function getAllKeywordsIdByRecordId(){
    $rqt = "SELECT record_keywords.keyword_id FROM record_keywords WHERE record_keywords.record_id = '". $this->getRecordId()."' ";
    $rqt = $this->getCnx()-> prepare($rqt);
    $rqt -> execute();
    return $rqt;
}

public function getRecordById(){
    // Je recupère les donnée avec condition sur ID
    $record = "SELECT records.record_id as id, 
            records.record_title as title, 
            records.record_nui as nui, 
            records.record_date_start as date_start, 
            records.record_date_end as date_end,
            records.record_observation as observation,
            records.record_link_id as id_parent,
            classification.classification_title as classe_title,
            record_support.record_support_title as support,
            record_status.record_status_title as statut,
            container.container_reference as boite,
            records.organization_id
            FROM records
            LEFT JOIN record_support 
            ON record_support.record_support_id = records.record_support_id
            LEFT JOIN classification 
            ON classification.classification_id = records.classification_id
            LEFT JOIN record_status 
            ON record_status.record_status_id = records.record_status_id
            LEFT JOIN container 
            ON container.container_id = records.container_id
            WHERE records.record_id = '".$this->getRecordId()."'";

    $record = $this->getCnx() -> prepare($record);
    $record ->execute();

    // Je set toute les propriétés de la classe courante
    foreach ($record as $current) {
       $this->setRecordId($current['id']);
       $this->setRecordTitle($current['title']);
       $this->setRecordNui($current['nui']);
       $this->setRecordDateStart($current['date_start']);
       $this->setRecordDateEnd($current['date_end']);
       $this->setRecordObservation($current['observation']);
       $this->setRecordClasseTitle($current['classe_title']);
       $this->setRecordClasseByTitle();
       $this->setRecordSupportTitle($current['support']);
       $this->setRecordLinkId($current['id_parent']);
       $this->setRecordContainerTitle($current['boite']);
       $this->setRecordOrganizationId($current['organization_id']);
       $this->setRecordOrganizationTitleById();
    }
}
public function deleteRecord($id){
    $rqt ="DELETE FROM records WHERE records.record_id = '". $id ."'";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt -> execute();
}



}?>