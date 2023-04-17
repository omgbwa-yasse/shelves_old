<?php 
require_once 'models/repository/keywordsManager.class.php';
class keyword extends keywordsManager{

   
    private $_keyword;
    private $_idkeyword ;

public function setKeywordIdByKeyword($keyword){
    $idkeyword = "SELECT keyword_id FROM keywords WHERE keywords.keyword = '".$keyword ."'";
    $idkeyword = $this->getCnx()-> prepare($idkeyword);
    $idkeyword->execute();
    foreach($idkeyword as $id){
        $this->setKeywordId($id['keyword_id']);
    }
    return $this->_idkeyword ;
}
public function getKeywordId(){ return $this->_idkeyword; }
public function setKeywordRecordNui($nui){ $this->_record_nui = $nui; }
public function getKeywordRecordNui(){ return $this->_record_nui ;}
public function setKeywordRecordIdByNui(){
    $idRecords = "SELECT records.id_records FROM records WHERE records_nui = '".$this->getRecordNui()."' " ;
    $idRecords =$this->getCnx()->prepare($idRecords);
    $idRecords->execute();
    foreach($idRecords as $id) {
            $this->setRecordId($id['id_records']) ;
            }

}

public function setKeyword($_keyword){ $this->_keyword = $_keyword; }
public function getKeyword(){ return $this->_keyword;}
public function getKeywordById(){
    $rqt = "SELECT Keywords.keyword FROM Keywords WHERE Keywords.keyword_id = '".$this->_idkeyword."'";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt->execute();
        foreach($rqt as $keyword){
            $this->_keyword = $keyword['keyword'];
        }   
    return $this->_keyword;
}


public function setKeywordId($id){ $this->_idkeyword = $id ; }
public function getClassKeywordId(){ return $this->_idkeyword;}


public function searchKeywordId(){
    $rqt ="SELECT keywords.keyword_id FROM keywords WHERE keywords.keyword = '".$this->getKeyword() ."'";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt -> execute();
    foreach($rqt as $keywordsID){
        $this->_idkeyword = $keywordsID['keyword_id'];
    }
}
public function linkKeywordRecord(){             
                    // introduit les ID dans la table Keyword_ID directement
                    $this->searchKeywordId();
                    $savekeyword = "INSERT INTO records_keywords (keyword_id,records_id) VALUES ('". $this->getKeywordId() ."','". $this->getRecordId()."')";
                    $savekeyword = $this->getCnx() ->prepare($savekeyword);
                    if($savekeyword->execute()){
                        echo "<br> mot clé et keyword liés dans records_keywords (Keywords) : ". $this->getKeyword() ;
                        echo "<br> mot clé et idrecord liés dans records_keywords (id_records) : ". $this->getRecordId() ;
                        echo "<br> mot clé et idkeyword liés dans records_keywords (id_records) : ". $this->getKeywordId() ;
                    }
                }
public function KeywordVerification(){
    $KeywordStatus = NULL;
    $verificationKeyword = "SELECT keyword_id, keyword FROM keywords WHERE keywords.keyword = '".$this->_keyword."'";
    $verificationKeyword = $this->getCnx() -> prepare($verificationKeyword);
    $verificationKeyword -> execute();
    foreach($verificationKeyword as $mot){
        if(isset($mot['keyword']) == $this->_keyword)
        {
            $KeywordStatus = TRUE ;
        } else{
            $KeywordStatus = FALSE ;
        }
        return $KeywordStatus;
    }
}
public function saveNewKeyword($_keyword){
        $savekeyword = "INSERT INTO keywords (keyword_id,keyword) VALUES ( NULL,'". $this->_keyword."')";
        $savekeyword = $this->getCnx()->prepare($savekeyword);
        if($savekeyword -> execute()){
             echo "</br> mot clé enregistrés est ". $this->_keyword ;
        };                    
                    
        // Recupération de l'ID du mot clé enregistré
        $keywordID = "SELECT keyword_id FROM keywords WHERE keywords.keyword = '".$this->_keyword."'" ;
        $keywordID = $this->getCnx()-> prepare($keywordID);
        $keywordID ->execute();
        $keyID = NULL;
        foreach($keywordID as $key){
        $keyID = $key['keyword_id'] ; }
        if(isset($keyID)){ echo "<br> Id du clé enregistré est : " .$keyID; }

        // Insertion des données dans la table d'association
        $savekeyword = "INSERT INTO records_keywords (keyword_id,records_id) VALUES ('". $keyID."','". $this->getRecordId()."')";
        $savekeyword = $this->getCnx()->prepare($savekeyword);
        if($savekeyword->execute()){
            echo "<br> mot clé et records liés dans records_keywords";
        };
}
 public function deleteKeyword(){
        // On affiche la liste de mots clés associés au document
        $rqt = "SELECT records_keywords.keyword_id FROM records_keywords WHERE records_keywords.records_id = '". $this->getRecordId()."'";    
        $rqt = $this->getCnx()->prepare($rqt);
        $rqt -> execute();
        foreach($rqt as $keyId){
           $this->_idkeyword = $keyId['keyword_id'];
        
        // On compte le nombre de fois qu'un mot clé de la liste précédente est utilisé, si c'est moins ou égal à de 1 fois on supprime
        $rqt = "SELECT count(*) FROM records_keywords WHERE records_keywords.records_id = '". $this->getKeywordId() ."'";
        $rqt = $this->getCnx()->prepare($rqt);
        $rqt ->execute();
        foreach($rqt as $delkey){
            if($delkey['0'] == 1 OR $delkey['0'] == 0){
                $delid = $this->getKeywordId();
                echo "Mot de clé à supprimer est : ". $this->getKeywordById();
                $rqt="DELETE FROM keywords WHERE keywords.keyword_id = '". $delid ."'";
                $rqt=$this->getCnx()->prepare($rqt);
                if($rqt->execute()){ echo "mot supprimé ...";}
                
                $rqt="DELETE FROM records_keywords WHERE records_keywords.keyword_id = '". $delid."'";
                $rqt=$this->getCnx()->prepare($rqt);
                if($rqt->execute()){ echo "<br>Liaison supprimé avec le records ...";}

            } else{
                echo "Ce mot clé (".$this->getKeywordById() .") est en cours d\'utilisation";
            }
            }
        }
    }
    public function getAllRecordsByKeywordId(){
        // Je recupère d'abord les Id_records des enregistrements situés dans la table records_keyword
        $searchRecordsId = "SELECT records_keywords.records_id as records_id FROM records_keywords WHERE keyword_id = ". $this->getRecordId()."";
        $searchRecordsId = $this->getCnx()->prepare($searchRecordsId);
        $searchRecordsId ->execute ();
        foreach($searchRecordsId as $idr){
            
        // En parcourant chaque Id re recupère directement l'enregistrement en question
        $sql = "SELECT records.id_records as id, 
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
        WHERE records.id_records = ".$idr['records_id']."";
        $allRecords = $this->getCnx() -> prepare($sql);
        $allRecords->execute();
                
    }}


}?>