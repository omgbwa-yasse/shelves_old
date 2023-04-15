<?php
require_once 'models/repository/records.class.php';
class keywordsManager extends records {

    private $_idrecords;
    public $_record_nui;

public function getAllKeywords(){
        $addr ="../shelves/index.php?q=repository&categ=search&sub=byKeywordId&id=";
        $allKeywords = "SELECT keyword FROM keywords";
        $allKeywords = $this->getCnx()-> prepare($allKeywords);
        $allKeywords->execute();
        foreach($allKeywords as $keyword)
        { 
            $idKeyword = "SELECT keyword_id FROM keywords WHERE  keywords.keyword = '".$keyword['keyword']."'";
            $idKeyword = connexion::getCnx()->prepare($idKeyword);
            $idKeyword->execute();
            foreach($idKeyword as $kId){
    
                echo "<a href= ".$addr. $kId['keyword_id']." >".$keyword['keyword']."</a> -"; }
            }
        }
public function setRecordId($id){ $this->_idrecords = $id ; }
public function getKeywordRecordId(){ return $this->_idrecords; }        
public function setKeywordRecordId($records_id){ $this->_idrecords = $records_id ; return $this->_idrecords ; }

public function getAllKeywordsByRecordId(){
    $listwords = NULL;
    $keywords = "SELECT records_keywords.keyword_id FROM records_keywords WHERE records_keywords.records_id = '". $this->_idrecords."' ";
    $keywords = $this->getCnx() -> prepare($keywords);
    $keywords->execute();
    foreach($keywords as $kwId){
        $listwords = "SELECT keyword FROM keywords WHERE keyword_id = '". $kwId['keyword_id'] ."' ";
        $listwords = $this->getCnx() -> prepare($listwords);
        $listwords -> execute() ;
    }
    return $listwords;
}

    
}?>
