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

public function getRecordId(){ return $this->_idrecords; }
public function getKeywordRecordId(){ return $this->_idrecords; }        
public function setKeywordRecordId($records_id){ $this->_idrecords = $records_id ; return $this->_idrecords ; }

   
}?>
