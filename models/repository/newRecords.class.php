
<?php
require_once("models/connexion.class.php") ;
class newrecord extends connexion {
    private $record_id;
    private $record_title;
    private $record_date_start;	
    private $record_date_end;	
    private $record_observation;	
    private $record_status_id;
    private $record_support_id;	
    private $record_link_id;	
    private $container_id;	
    private $classification_id;

    function __construct($id, $title, $dateStart, $dateEnd, $observation, $status, $support, $link, $container, $classification){
        $this->record_id = $id;
        $this->record_title = $title;
        $this->record_date_start = $dateStart;	
        $this->record_date_end = $dateEnd;	
        $this->record_observation =$observation;	
        $this->record_status_id = $status;
        $this->record_support_id = $support;	
        $this->record_link_id = $link;	
        $this->container_id = $container;	
        $this->classification_id = $classification;}
    public function setrecord($title, $dateStart, $dateEnd, $observation, $status, $support, $link, $container, $classification){
        // On ne met pas à jour l'ID $this->record_id = $id;
        $this->record_title = $title;
        $this->record_date_start = $dateStart;	
        $this->record_date_end = $dateEnd;	
        $this->record_observation =$observation;	
        $this->record_status_id = $status;
        $this->record_support_id = $support;	
        $this->record_link_id = $link;	
        $this->container_id = $container;	
        $this->classification_id = $classification;
    }
    public function getId(){ $this->record_id ;}
    public function getTitle(){ $this->record_title ;}
    public function getDateStart(){ $this->record_date_start ;}
    public function getDateEnd(){ $this->record_date_end ;}
    public function getObservation(){ $this->record_observation ;}
    public function getIdStatus(){ $this->record_status_id ;}
    public function getIdSupport(){ $this->record_support_id ;}
    public function getIdLink(){ $this->record_link_id ;}
    }






?>