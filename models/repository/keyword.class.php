<?php 
require_once 'models/repository/keywordsManager.class.php';
class keyword extends keywordsManager{

   
    private $_keyword;
    private $_keyword_id ;

public function setKeywordIdByKeyword($keyword){
    $idkeyword = "SELECT keyword_id FROM keyword WHERE keyword.keyword = '".$keyword ."'";
    $idkeyword = $this->getCnx()-> prepare($idkeyword);
    $idkeyword->execute();
    foreach($idkeyword as $id){
        $this->setKeywordId($id['keyword_id']);
    }
    return $this->_keyword_id ;
}
public function getKeywordId(){ return $this->_keyword_id; }

public function setKeyword($_keyword){ $this->_keyword = $_keyword; }
public function getKeyword(){ return $this->_keyword;}
public function getKeywordById(){
    $rqt = "SELECT keyword.keyword FROM keyword WHERE keyword.keyword_id = '".$this->_keyword_id."'";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt->execute();
    $result=$rqt->setFetchMode(PDO::FETCH_ASSOC);

        foreach($rqt->fetchAll() as $keyword){
            $this->_keyword = $keyword['keyword'];
        }   
    return $this->_keyword;
}


public function setKeywordId($id){ $this->_keyword_id = $id ; }
public function getClassKeywordId(){ return $this->_keyword_id;}


public function searchKeywordId(){
    $rqt ="SELECT keyword.keyword_id FROM keyword WHERE keyword.keyword = '".$this->getKeyword() ."'";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt -> execute();
    foreach($rqt as $keywordID){
        $this->_keyword_id = $keywordID['keyword_id'];
    }
}
public function linkKeywordRecord(){             
                    // introduit les ID dans la table Keyword_ID directement
                    $this->searchKeywordId();
                    $savekeyword = "INSERT INTO record_keyword (keyword_id,record_id) VALUES ('". $this->getKeywordId() ."','". $this->getRecordId()."')";
                    $savekeyword = $this->getCnx() ->prepare($savekeyword);
                    $savekeyword->execute();
                }
public function KeywordVerification(){
    $keywordtatus = NULL;
    $verificationKeyword = "SELECT keyword_id, keyword FROM keyword WHERE keyword.keyword = '".$this->_keyword."'";
    $verificationKeyword = $this->getCnx() -> prepare($verificationKeyword);
    $verificationKeyword -> execute();
    foreach($verificationKeyword as $mot){
        if(isset($mot['keyword']) == $this->_keyword)
        {
            $keywordtatus = TRUE ;
        } else{
            $keywordtatus = FALSE ;
        }
        return $keywordtatus;
    }
}
public function saveNewKeyword($_keyword){
        $savekeyword = "INSERT INTO keyword (keyword_id,keyword) VALUES ( NULL,'". $this->_keyword."')";
        $savekeyword = $this->getCnx()->prepare($savekeyword);
        $savekeyword -> execute();                    
                    
        // Recupération de l'ID du mot clé enregistré
        $keywordID = "SELECT keyword_id FROM keyword WHERE keyword.keyword = '".$this->_keyword."'" ;
        $keywordID = $this->getCnx()-> prepare($keywordID);
        $keywordID ->execute();
        $keyID = NULL;
        foreach($keywordID as $key){
        $keyID = $key['keyword_id'] ; 
        }
    

        // Insertion des données dans la table d'association
        $savekeyword = "INSERT INTO record_keyword (keyword_id,record_id) VALUES ('". $keyID."','". $this->getRecordId()."')";
        $savekeyword = $this->getCnx()->prepare($savekeyword);
        $savekeyword->execute();
}
 public function deleteKeyword(){
        // On affiche la liste de mots clés associés au document
        $rqt = "SELECT record_keyword.keyword_id FROM record_keyword WHERE record_keyword.record_id = '". $this->getRecordId()."'";    
        $rqt = $this->getCnx()->prepare($rqt);
        $rqt -> execute();
        foreach($rqt as $keyId){
           $this->_keyword_id = $keyId['keyword_id'];
        
        // On compte le nombre de fois qu'un mot clé de la liste précédente est utilisé, si c'est moins ou égal à de 1 fois on supprime
        $rqt = "SELECT count(*) FROM record_keyword WHERE record_keyword.record_id = '". $this->getKeywordId() ."'";
        $rqt = $this->getCnx()->prepare($rqt);
        $rqt ->execute();
        foreach($rqt as $delkey){
            if($delkey['0'] == 1 OR $delkey['0'] == 0){
                $delid = $this->getKeywordId();
                $rqt="DELETE FROM keyword WHERE keyword.keyword_id = '". $delid ."'";
                $rqt=$this->getCnx()->prepare($rqt);
                $rqt->execute();
                
                $rqt="DELETE FROM record_keyword WHERE record_keyword.keyword_id = '". $delid."'";
                $rqt=$this->getCnx()->prepare($rqt);
                $rqt->execute();

            }else{}
            }
        }
    }
    public function getAllrecordIdByKeywordId(){
        // Je recupère d'abord les Id_record des enregistrements situés dans la table record_keyword
        $recordId = "SELECT record_keyword.record_id as record_id FROM record_keyword WHERE keyword_id = '". $this->getKeywordId()."'";
        $recordId = $this->getCnx()->prepare($recordId);
        $recordId ->execute();
        return $recordId;   
    }

}?>