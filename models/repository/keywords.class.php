<?php 
require 'models/connexion.class.php';
class keywords extends connexion{
    private $_idrecords;
    private $_keyword;
    private $_idkeyword ;
    private $_record_nui;

public function getKeywordId($keyword){
    $idkeyword = "SELECT keyword_id FROM keywords WHERE keywords.keyword = '".$keyword ."'";
    $idkeyword = $this->getCnx()-> prepare($idkeyword);
    $idkeyword->execute();
    foreach($idkeyword as $id){
        $this->_idkeyword = $id['keyword_id'];
    }
    return $this->_idkeyword ;
}
public function setRecordNui($nui){ $this->_record_nui = $nui; }
public function getRecordNui(){ return $this->_record_nui ;}
public function setRecordIdByNui(){
    $idRecords = "SELECT records.id_records FROM records WHERE records_nui = '".$this->getRecordNui()."' " ;
    $idRecords =$this->getCnx()->prepare($idRecords);
    $idRecords->execute();
    foreach($idRecords as $id) {
            echo "l'ID de l'enregistrement est " . $id['id_records'];
            $this->_idrecords =  $id['id_records'];
            }

}

public function setRecordId($records_id){
    $this->_idrecords = $records_id ;
    return $this->_idrecords ;
}
public function getRecordId(){
    return $this->_idrecords;
}
public function setKeyword($_keyword){
    $this->_keyword = $_keyword;
}
public function getKeywordById($_idkeyword){
    $rqt = "SELECT keyword FROM Keywords WHERE keyword_id = ".$this->_idkeyword."";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt->execute();
    foreach($rqt as $keywordId){
        $this->_keyword = $keywordId['keyword'] ;
    }
    return $this->_keyword;   
}
public function getAllKeywords(){
    $addr ="../shelves/index.php?q=repository&categ=search&sub=byKeywordId&id=";
    $allKeywords = "SELECT keyword FROM keywords";
    $allKeywords = $this->getCnx()-> prepare($allKeywords);
    $allKeywords->execute();
    foreach($allKeywords as $keyword)
    { 
        $idKeyword = "SELECT keyword_id FROM keywords WHERE  keywords.keyword = '".$keyword['keyword']."'";
        $idKeyword = $this->getCnx()->prepare($idKeyword);
        $idKeyword->execute();
        foreach($idKeyword as $kId){

            echo "<a href= ".$addr. $kId['keyword_id']." >".$keyword['keyword']."</a> -"; }
        }
    }

public function setRecordsId($id){
    $this->_idrecords = $id ;
}
public function setKeywordId($id){
    $this->_idkeyword = $id ;
}
public function getClassKeywordId(){
    return $this->_idkeyword;
}
public function getAllRecordsByKeywordID(){
    // Je recupère d'abord les Id_records des enregistrements situés dans la table records_keyword
    $searchRecordsId = "SELECT records_keywords.records_id as records_id FROM records_keywords WHERE keyword_id = ". $this->_idkeyword."";
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

        // Je parcours l'enregistrement et je l'affiche directement
        foreach($allRecords as $elements){
            $elements['id'];
            $elements['nui'];
            $elements['title'];
            $elements['date_start'];
            $elements['date_end'];
            $elements['observation'];
            $elements['code_title'];
            $elements['support'];
            $elements['statut'];
            $elements['boite'];

        // Je prépare l'affichage de la date de fin    
        $dateEnd = Null ;
        if($elements['date_end'] == '0000-00-00'){
                $dateEnd = ''; }
        else {
            $dateEnd = ' au '. $elements['date_end'];   
            }
        // Affichage des documents
        echo'<center><div><br><br><table border="0" width="1000px">
            <tr><td><h3><b>'. $elements['title'].'</b></h3></tr>
            <tr><td> Nui : '. $elements['nui'].' Classe : <b> '.$elements['code_title'] .'</b> </tr>
            <tr><td> '. $elements['date_start'].' ' .$dateEnd.'</tr>
            <tr><td> '. $elements['observation'].' </tr>
            <tr><td>Ref<b>:'. $elements['id']. '</b> </b>Support : <b>'. $elements['support'].' </b> Statut : <b>'. $elements['statut'].' </b> Boite : <b>'. $elements['boite'].' </b></tr><td>
            ';

        // Rechercher les mots clés de l'enregistrement et je les affiche
            $keywords = "SELECT records_keywords.keyword_id FROM records_keywords WHERE records_keywords.records_id = '". $elements['id'] ."' ";
            $keywords = $this->getCnx() -> prepare($keywords);
            $keywords->execute();
            if (!empty($keywords)){
                foreach($keywords as $kwId){
                    $listwords = "SELECT keyword FROM keywords WHERE keyword_id = '". $kwId['keyword_id']."' ";
                    $listwords = $this->getCnx() -> prepare($listwords);
                    $listwords -> execute() ;
                    foreach ($listwords as $words) {
                        echo "  <b>". $words['keyword'] ."</b>"; 
                        $keyArray = array_search($words['keyword'], $words);
                        if( $keyArray == "0"){echo "";} else {echo ";" ;} ; } 
                        } 
                }else { echo "Pas de mots clés"; }
            
            }
            echo "</td><tr></table><br/><br/></div><center>";

        }




















    }

public function searchKeywordId(){
    $rqt ="SELECT keywords.keyword_id FROM keywords WHERE keywords.keyword = '".$this->_keyword ."'";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt -> execute();
    foreach($rqt as $keywordsID){
        $this->_idkeyword = $keywordsID['keyword_id'];
    }
}
public function linkKeywordRecord(){             
                    // introduit les ID dans la table Keyword_ID directement
                    $this->searchKeywordId();
                    $savekeyword = "INSERT INTO records_keywords (keyword_id,records_id) VALUES ('". $this->_idkeyword ."','". $this->_idrecords."')";
                    $savekeyword = $this->getCnx() ->prepare($savekeyword);
                    if($savekeyword->execute()){
                        echo "<br> mot clé et keyword liés dans records_keywords (Keywords) : ". $this->_keyword ;
                        echo "<br> mot clé et idrecord liés dans records_keywords (id_records) : ". $this->_idrecords ;
                        echo "<br> mot clé et idkeyword liés dans records_keywords (id_records) : ". $this->_idkeyword ;
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
        $savekeyword = "INSERT INTO records_keywords (keyword_id,records_id) VALUES ('". $keyID."','". $this->_idrecords."')";
        $savekeyword = $this->getCnx()->prepare($savekeyword);
        if($savekeyword->execute()){
            echo "<br> mot clé et records liés dans records_keywords";
        };
}
}

?>