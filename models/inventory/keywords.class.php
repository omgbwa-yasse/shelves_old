<?php 
require 'models/connexion.class.php';
class keywords extends connexion{
    private $_idrecords;
    private $_keyword;
    private $_idkeyword ;
public function getKeywordId($_keyword){
    $idkeyword = "SELECT keyword_id FROM keyword WHERE keyword.keyword = '?'";
    $idkeyword = $this->getCnx()-> prepare($idkeyword);
    $idkeyword->execute($_keyword);
    foreach($idkeyword as $id){
        $_idkeywords = $id['keyword_id'] . "-";
    }
    echo "Get is here..";
}
public function setKeyword($_keyword){
    $this->_keyword = $_keyword;
}
public function getKeyword($_idkeyword){
    
}
public function getAllKeywords($_idrecords){
    
}


}


?>