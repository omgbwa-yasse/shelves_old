<?php
require_once 'models/connexion.class.php';

class allRecords extends Connexion {

    public $allRecords;

    private function __construct(){




    }
    public function getAllRecords(){
        $this->allRecords = 'SELECT * FROM records';
        return $this->allRecords;
        

    }
    public function setAllRecords(){



    }












}














?>