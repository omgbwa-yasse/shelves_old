<?php
require_once 'models/repository/recordsManager.class.php';
class record extends recordsManager{
public $_record_id = NULL;
public $_record_nui;
public $_record_title;
public $_record_date_start;
public $_record_date_end;
public $_record_date_format;
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

public $_record_level_id;
public $_record_level_title;
public $_record_level_child;

public $_record_record_transfer_id;

public function __construct(){
    $this->_record_id;
    $this->_record_nui;
    $this->_record_title;
    $this->_record_date_format;
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
    $this->_record_level_id;
    $this->_record_level_title;
    $this->_record_level_child;
    $this->_record_record_transfer_id;
}

// Les Setters et les Getters

// niveau de description
public function setRecordLevelTitle($level){ $this->_record_level_title = $level; }
public function getRecordLevelTitle(){ return $this->_record_level_title;}

public function setRecordLevelChild($levelChild){ $this->_record_level_child = $levelChild; }
public function getRecordLevelChild(){ return $this->_record_level_child;}

public function setRecordLevelId($levelId){ $this->_record_level_id = $levelId; }
public function getRecordLevelId(){ return $this->_record_level_id ; }

public function setRecordLevelTitleByLevelId2(){
    $stmt = $this->getCnx()->prepare("SELECT record_level_title as level_title FROM record_level WHERE record_level_id = :id");
    $stmt ->execute([':id' => $this->getRecordLevelId()]);
    foreach($stmt as $level_title){
        $this->_record_level_title = $level_title['level_title'];
        return true;
    }
}
public function setRecordLevelTitleByLevelId(){
    $stmt = $this->getCnx()->prepare("SELECT record_level_title as title FROM record_level WHERE record_level_id = :id");
    $stmt ->execute([':id' => $this->getRecordLevelId()]);
    foreach($stmt as $level_title){
        $this->_record_level_title = $level_title['title'];
        return true;
    }
}

public function setRecordLevelChildByLevelId(){
    $stmt =$this->getCnx()->prepare("SELECT record_level_child as level_child FROM record_level WHERE record_level_id = :id");
    $stmt ->execute([':id' => $this->getRecordLevelId()]);
    foreach($stmt as $level){
    $this->_record_level_child = $level['level_child'];
    }
}


// Les Identifiants de la notices
public function setRecordId($id){ $this->_record_id = $id;}
public function getRecordId(){ return $this->_record_id;}

// Numéro d'identifiaction Unique
public function setRecordNui($nui){ $this->_record_nui = $nui;}
public function getRecordNui(){ return $this->_record_nui;}

public function setRecordIdByNui(){
    $stmt =$this->getCnx()->prepare("SELECT record.record_id as id FROM record WHERE record_nui =:nui ");
    $stmt ->execute([':nui' => $this->getRecordNui()]);
    foreach($stmt as $id){
        $this->setRecordId($id['id']);
    }

}

public function controlNui(){
    $control = "SELECT record_nui FROM record WHERE record.record_nui = '".$this->getRecordNui()."' " ;
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
    $lastId = "SELECT record.record_id FROM record ORDER BY record.record_id DESC LIMIT 1 ";
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


public function dateFormatType($date){
  $regexAAAA = '/^[0-9]{4}$/';
  $regexAAAA_MM = '/^[0-9]{4}\/[0-9]{2}$/';
  $regexAAAA_MM_JJ = '/^[0-9]{4}\/[0-9]{2}\/[0-9]{2}$/';
  if (preg_match($regexAAAA, $date)) {
    return "A";
  } elseif (preg_match($regexAAAA_MM, $date)) {
    return "B";
  } elseif (preg_match($regexAAAA_MM_JJ, $date)) {
    return "C";
  } else {
    return 'D';
  }
}


public function getDateFormat(){ 
    $this->_record_date_format = $this->dateFormatType($this->_record_date_start);
    return $this->_record_date_format; 
}

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
    $stmt = "SELECT * FROM classification WHERE classification_code = '". $this->getRecordClasseCode()."' " ;
    $stmt=$this->getCnx()->prepare($stmt);
    $stmt->execute();
    foreach($stmt as $id){
        $this->_record_classe_id = $id['classification_id'];
        $this->_record_classe_code = $id['classification_code'];
        $this->_record_classe_title = $id['classification_title'];

    }}

public function setRecordClasseByTitle(){
    $stmt=$this->getCnx()->prepare("SELECT * FROM classification WHERE classification_title =:classeTitle");
    $stmt->execute([':classeTitle' => $this->getRecordClasseTitle()]);
    foreach($stmt as $id){
        $this->_record_classe_id = $id['classification_id'];
         $this->_record_classe_code = $id['classification_code'];
        $this->_record_classe_title = $id['classification_title'];
    }
}
public function setRecordClasseById(){
    $stmt = "SELECT * FROM classification WHERE classification_id = '". $this->getRecordClasseId()."' " ;
    $stmt=$this->getCnx()->prepare($stmt);
    $stmt->execute();
    foreach($stmt as $id){
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
    $sql = "SELECT COUNT(*) FROM record WHERE record.record_link_id = '".$this->getRecordId()."'"; 
    $stmt = $this->getCnx()->prepare($sql); 
    $stmt ->execute(); 
    $occurence = $stmt->fetchColumn(); 
    if($occurence > 0){ $statut = TRUE; } else{ $statut = FALSE; } 
return $statut; 
}
public function verificationRecordsParent(){ 
    $statut = NULL; 
    $sql = "SELECT record.record_link_id as id_parent FROM record WHERE record.record_id = '".$this->getRecordId()."'"; 
    $stmt = $this->getCnx()->prepare($sql); 
    $stmt ->execute(); 
    $stmt = $stmt->fetchAll(); 
    foreach($stmt as $value){
        if($value['id_parent'] == NULL){ $statut = FALSE;} else{ $statut = TRUE; }
    }
    return $statut; 
}
// Organization
public function setRecordOrganizationIdByTitle(){
    $stmt = $this->getCnx()->prepare("SELECT organization_id FROM organization WHERE organization_title = :recordOrganizationTitle");
    $stmt ->bindValue(':recordOrganizationTitle', $this->getRecordOrganizationTitle());
    $stmt ->execute();
    foreach($stmt as $id){
        $this->_organization_id = $id['organization_id'];
    }
}
public function setRecordOrganizationTitleById(){
    $stmt= "SELECT organization_title FROM organization WHERE organization_id = '". $this->getRecordOrganizationId() ."'" ;
    $stmt=$this->getCnx()->prepare($stmt);
    $stmt->execute();
    foreach($stmt as $title){
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
// Transfer ID


public function setRecordTransferId(INT $id){
    $this->_record_record_transfer_id = $id;
}
public function getRecordTransferId(){
    return $this->_record_record_transfer_id;
    
}






// Les fonctions 
public function saveRecord(){
        // je recupère les ID des container, support, status, classe
        $this->setRecordStatusId();
        $this->setRecordSupportId();
        $this->setRecordClasseById();
        $this->setRecordOrganizationIdByTitle();

        // J'enregistre les données
        $stmt = $this->getCnx()->prepare(" INSERT INTO record (record_level_id, record_id,record_nui, record_title,  record_time_format, 
        record_date_start,record_date_end, record_observation, record_status_id, record_support_id, record_link_id, classification_id, organization_id, record_transfer_id ) 
        values (:recordLevel, :recordId, :recordNui, :recordTitle, :recordTimeFormat, :recordDateStart, :recordDateEnd, :recordObservation, :recordStatusId, :recordSupportId, 
        :recordLink, :recordClasseId, :recordOrganizationId, :transferId)");
        $stmt->bindValue(':recordLevel', $this->getRecordLevelId(), PDO::PARAM_INT);
        $stmt->bindValue(':recordId', $this->getRecordId(), PDO::PARAM_INT);
        $stmt->bindValue(':recordNui', $this->getRecordNui());
        $stmt->bindValue(':recordTitle', $this->getRecordTitle());
        $stmt->bindValue(':recordTimeFormat', $this->getDateFormat());
        $stmt->bindValue(':recordDateStart', $this->getRecordDateStart());
        $stmt->bindValue(':recordDateEnd', $this->getRecordDateEnd());
        $stmt->bindValue(':recordObservation', $this->getRecordObservation());
        $stmt->bindValue(':recordStatusId', $this->getRecordStatusId(), PDO::PARAM_INT);
        $stmt->bindValue(':recordSupportId', $this->getRecordSupportId(), PDO::PARAM_INT);
        $stmt->bindValue(':recordLink', $this->getRecordLinkId(), PDO::PARAM_INT);
        $stmt->bindValue(':recordClasseId', $this->getRecordClasseId(), PDO::PARAM_INT);
        $stmt->bindValue(':recordOrganizationId', $this->getRecordOrganizationId(), PDO::PARAM_INT);
        $stmt->bindValue(':transferId', $this->getRecordTransferId(), PDO::PARAM_INT);
        $stmt->execute();
}
public function getAllKeywordsIdByRecordId(){
    $stmt = "SELECT record_keyword.keyword_id FROM record_keyword WHERE record_keyword.record_id = '". $this->getRecordId()."' ";
    $stmt = $this->getCnx()-> prepare($stmt);
    $stmt -> execute();
    return $stmt;
}

public function getRecordById(){
    // Je recupère les donnée avec condition sur ID
    $record = "SELECT record.record_id as id,
            record.record_level_id as level_id, 
            record.record_title as title, 
            record.record_nui as nui, 
            record.record_level_id as level_id, 
            record.record_time_format as timeFormat, 
            record.record_date_start as date_start, 
            record.record_date_end as date_end,
            record.record_observation as observation,
            record.record_link_id as id_parent,
            record_transfer_id,
            classification.classification_title as classe_title,
            record_support.record_support_title as support,
            record_status.record_status_title as statut,
            container.container_reference as boite,
            record.organization_id
            FROM record
            LEFT JOIN record_support 
            ON record_support.record_support_id = record.record_support_id
            LEFT JOIN classification 
            ON classification.classification_id = record.classification_id
            LEFT JOIN record_status 
            ON record_status.record_status_id = record.record_status_id
            LEFT JOIN container 
            ON container.container_id = record.container_id
            WHERE record.record_id = :record_id";

    $record = $this->getCnx() -> prepare($record);
    $record ->execute([':record_id' => $this->getRecordId()]);

    // Je set toute les propriétés de la classe courante
    foreach ($record as $current) {
       $this->setRecordId($current['id']);
       $this->setRecordTitle($current['title']);
       $this->setRecordLevelId($current['level_id']);
       $this->setRecordNui($current['nui']);
       $this->setRecordDateStart($current['timeFormat']);
       $this->setRecordDateStart($current['date_start']);
       $this->setRecordDateEnd($current['date_end']);
       $this->setRecordObservation($current['observation']);
       $this->setRecordClasseTitle($current['classe_title']);
       $this->setRecordClasseByTitle();
       $this->setRecordSupportTitle($current['support']);
       $this->setRecordLinkId($current['id_parent']);
       $this->setRecordContainerTitle($current['boite']);
       $this->setRecordOrganizationId($current['organization_id']);
       if(!empty($current['record_transfer_id'])){
            $this->setRecordTransferId($current['record_transfer_id']);
       }
       $this->setRecordOrganizationTitleById();
    }
}
public function deleteRecord($id){
    $stmt ="DELETE FROM record WHERE record.record_id = '". $id ."'";
    $stmt = $this->getCnx()->prepare($stmt);
    $stmt -> execute();}



public function insertInContainer($recordId, $containerId){
        $stmt = $this->getCnx()->prepare("UPDATE record SET container_id = :containerId WHERE record_id = :recordId");
        if ($stmt -> execute([':containerId' => $containerId, ':recordId' => $recordId])){
            echo "\nVous venez d'inserer enregistrement n°". $recordId ." Dans le contenant n° " .$containerId ;
        } else {
            echo "Insertion de l\'enregistrement dans le contenant a échoué...";
        }
    }


    public function hydrateRecordById($id){
        // Je recupère les donnée avec condition sur ID
        $record = "SELECT record.record_id as id,
                record.record_level_id as level_id, 
                record.record_title as title, 
                record.record_nui as nui, 
                record.record_level_id as level_id, 
                record.record_date_start as date_start, 
                record.record_date_end as date_end,
                record.record_observation as observation,
                record.record_link_id as id_parent,
                record_transfer_id,
                classification.classification_title as classe_title,
                record_support.record_support_title as support,
                record_status.record_status_title as statut,
                container.container_reference as boite,
                record.organization_id
                FROM record
                LEFT JOIN record_support 
                ON record_support.record_support_id = record.record_support_id
                LEFT JOIN classification 
                ON classification.classification_id = record.classification_id
                LEFT JOIN record_status 
                ON record_status.record_status_id = record.record_status_id
                LEFT JOIN container 
                ON container.container_id = record.container_id
                WHERE record.record_id = :record_id";
    
        $record = $this->getCnx() -> prepare($record);
        $record ->execute([':record_id' => $id]);
    
        // Je set toute les propriétés de la classe courante
        foreach ($record as $current) {
           $this->setRecordId($current['id']);
           $this->setRecordTitle($current['title']);
           $this->setRecordLevelId($current['level_id']);
           $this->setRecordNui($current['nui']);
           $this->setRecordDateStart($current['date_start']);
           $this->setRecordDateEnd($current['date_end']);
           $this->setRecordObservation($current['observation']);
           $this->setRecordClasseTitle($current['classe_title']);
           $this->setRecordClasseByTitle();
           $this->setRecordTransferId($current['record_transfer_id']);
           $this->setRecordSupportTitle($current['support']);
           $this->setRecordLinkId($current['id_parent']);
           $this->setRecordContainerTitle($current['boite']);
           $this->setRecordOrganizationId($current['organization_id']);
           $this->setRecordOrganizationTitleById();
        }
    }

}?>