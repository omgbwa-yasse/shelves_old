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
public $_record_classe_code;
public $_record_classe_id;
public $_record_support_id;
public $_record_support_title;
public $_record_keyword_id;
public $_record_link_id ;
public $_record_container_id;
public $_record_container_title;
public $_record_classe;
public $_controlStatus;

public $_organization_id;
public $_organization_title;

public function __construct(){
    $this->_id_record;
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
}

// Les Setters et les Getters
// Les Identifiants de la notices
public function setRecordId($id){ $this->_id_record = $id;}
public function getRecordId(){ return $this->_id_record;}

// Numéro d'identifiaction Unique
public function setRecordNui($nui){ $this->_record_nui = $nui;}
public function getRecordNui(){ return $this->_record_nui;}

public function setRecordIdByNui(){
    $idRecords = "SELECT records.id_records FROM records WHERE records_nui = '".$this->getRecordNui()."' " ;
    $idRecords =$this->getCnx()->prepare($idRecords);
    $idRecords->execute();
    foreach($idRecords as $id) {
            $this->setRecordId($id['id_records']) ;
            }

}
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
    $lastId = "SELECT records.id_records FROM records ORDER BY records.id_records DESC LIMIT 1 ";
    $lastId = $this->getCnx() -> prepare($lastId);
    $lastId -> execute();
    foreach($lastId as $ref){
        $id = $ref['id_records'] + 1 . rand(0,21);
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
    $statutId = "SELECT records_status_id FROM records_status WHERE records_status_title = '".$this->getRecordStatusTitle()."' " ;
    $statutId =$this->getCnx()->prepare($statutId);
    $statutId->execute();
    foreach($statutId as $id){
    $this->_record_status_id = $id['records_status_id'];
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

public function verificationRecordsChild(){ 
    $statut = FALSE; 
    $sql = "SELECT COUNT(*) FROM Records WHERE records.records_link_id = '".$this->getRecordId()."'"; 
    $rqt = $this->getCnx()->prepare($sql); 
    $rqt ->execute(); 
    $occurence = $rqt->fetchColumn(); 
    if($occurence > 0){ $statut = TRUE; } else{ $statut = FALSE; } 
return $statut; 
}
public function verificationRecordsParent(){ 
    $statut = NULL; 
    $sql = "SELECT records.records_link_id as id_parent FROM Records WHERE records.id_records = '".$this->getRecordId()."'"; 
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
        $rqt = " INSERT INTO records (id_records,records_nui, records_title, 
        records_date_start,records_date_end, records_observation, 
        records_status_id, records_support_id, records_link_id, 
        container_id, classification_id, organization_id ) 
        values ('".$this->getRecordId()."','".$this->getRecordNui()."','". $this->getRecordTitle()."','".$this->getRecordDateStart()."',
        '". $this->getRecordDateEnd()."', '".$this->getRecordObservation()."','".$this->getRecordStatusId()."',
        '".$this->getRecordSupportId()."', '".$this->getRecordLinkId()."','".$this->getRecordContainerId()."',
        '".$this->getRecordClasseId()."', '".$this->getRecordOrganizationId()."' )";

        $rqt = $this->getCnx()->prepare($rqt);
        $rqt ->execute();
}
public function getAllKeywordsIdByRecordId(){
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
            records.records_link_id as id_parent,
            classification.classification_title as classe_title,
            records_support.records_support_title as support,
            records_status.records_status_title as statut,
            container.container_reference as boite,
            records.organization_id
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
    $rqt ="DELETE FROM records WHERE records.id_records = '". $id ."'";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt -> execute();
}



}?>