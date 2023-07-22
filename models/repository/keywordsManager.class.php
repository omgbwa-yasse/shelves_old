<?php
require_once 'models/repository/record.class.php';
class keywordsManager extends record{

    public $_record_id;
    public $_record_nui;

public function getAllKeywords(){
        $addr ="../shelves/index.php?q=repository&categ=search&sub=byKeywordId&id=";
        $allKeywords = "SELECT keyword FROM keyword";
        $allKeywords = $this->getCnx()-> prepare($allKeywords);
        $allKeywords->execute();
        foreach($allKeywords as $keyword)
        { 
            $idKeyword = "SELECT keyword_id FROM keyword WHERE  keyword.keyword = '".$keyword['keyword']."'";
            $idKeyword = connexion::getCnx()->prepare($idKeyword);
            $idKeyword->execute();
            foreach($idKeyword as $kId){
    
                echo "<a href= ".$addr. $kId['keyword_id']." >".$keyword['keyword']."</a> -"; }
            }
        }
public function setRecordId($id){ $this->_record_id = $id ; }

public function getRecordId(){ return $this->_record_id; }
public function getKeywordRecordId(){ return $this->_record_id; }
public function setKeywordRecordId($record_id){ $this->_record_id = $record_id ; return $this->_record_id ; }

public function MgGetrecordByDatesExt($date_start, $date_end){
    $rqt ="SELECT record_id FROM record WHERE record.date_start >= '". $date_start ."' AND record.date_start <='". $date_end ."'";
    $rqt = $this->getCnx()->prepare($rqt);
    $rqt->execute();
    return $rqt;
}

public function recordsIdsByKeywordId($keywordId){
    // Je recupère d'abord les Id_record des enregistrements situés dans la table record_keyword
    $stmt = $this->getCnx()->prepare("SELECT record_keyword.record_id as record_id FROM record_keyword WHERE keyword_id = :keywordId");
    $stmt ->execute([':keywordId' => $keywordId]);
    return $stmt;   
}
}?>
