
<?php
require_once("models/connexion.class.php") ;
class newRecords extends connexion {
    private $id_records;
    private $records_title;
    private $records_date_start;	
    private $records_date_end;	
    private $records_observation;	
    private $records_status_id;
    private $records_support_id;	
    private $records_link_id;	
    private $container_id;	
    private $classification_id;

    function __construct($id, $title, $dateStart, $dateEnd, $observation, $status, $support, $link, $container, $classification){
        $this->id_records = $id;
        $this->records_title = $title;
        $this->records_date_start = $dateStart;	
        $this->records_date_end = $dateEnd;	
        $this->records_observation =$observation;	
        $this->records_status_id = $status;
        $this->records_support_id = $support;	
        $this->records_link_id = $link;	
        $this->container_id = $container;	
        $this->classification_id = $classification;}
    public function setRecords($title, $dateStart, $dateEnd, $observation, $status, $support, $link, $container, $classification){
        // On ne met pas à jour l'ID $this->id_records = $id;
        $this->records_title = $title;
        $this->records_date_start = $dateStart;	
        $this->records_date_end = $dateEnd;	
        $this->records_observation =$observation;	
        $this->records_status_id = $status;
        $this->records_support_id = $support;	
        $this->records_link_id = $link;	
        $this->container_id = $container;	
        $this->classification_id = $classification;
    }
    public function getId(){ $this->id_records ;}
    public function getTitle(){ $this->records_title ;}
    public function getDateStart(){ $this->records_date_start ;}
    public function getDateEnd(){ $this->records_date_end ;}
    public function getObservation(){ $this->records_observation ;}
    public function getIdStatus(){ $this->records_status_id ;}
    public function getIdSupport(){ $this->records_support_id ;}
    public function getIdLink(){ $this->records_link_id ;}
    }






?>