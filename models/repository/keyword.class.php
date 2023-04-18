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
                        echo "<br> mot clé et idrecord liés dans records_keywords (id_records) : ". $this->getRecordId();
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
    public function getAllRecordsIdByKeywordId(){
        // Je recupère d'abord les Id_records des enregistrements situés dans la table records_keyword
        $RecordsId = "SELECT records_keywords.records_id as records_id FROM records_keywords WHERE keyword_id = '". $this->getKeywordId()."'";
        $RecordsId = $this->getCnx()->prepare($RecordsId);
        $RecordsId ->execute();
        return $RecordsId;   
    }

}?>