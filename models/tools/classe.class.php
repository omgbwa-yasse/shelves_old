<?php
require 'models/connexion.class.php';
class classification extends connexion{
public    $AllClassCodeTitle ;
public function __construct(){

}
public function getAllClassTitle(){
    $allClassCodeTitle = "SELECT classification.classification_code_title as code_title FROM classification";
    $allClassCodeTitle = $this->getCnx()->prepare($allClassCodeTitle);
    $allClassCodeTitle->execute();
    foreach($allClassCodeTitle as $code_title){
            echo $code_title['code_title']; }
    }
}
?>