<?php
require_once 'models/connexion.class.php';
require_once 'models/mail/mail.class.php';

class process extends mail {
//variable
  private $process_id;
  private $process_reference;
  private $process_title;
  private $process_date;


  public function __construct() {
    $this->process_id= NULL;
    $this->process_reference= NULL;
    $this->process_title= NULL;
    $this->process_date= NULL;
    
   


}

public function setProcessId($process_id) {
    $this->process_id=$process_id;}

    public function getProcessId() {return $this->process_id;}


    public function setProcessTitle($process_title) {
        $this->process_title=$process_title;
    }
    public function getProcessTitle() {return $this->process_title;}
    public function setProcessDate($process_date) {
        $this->process_date=$process_date;
    }
    public function getProcessDate() {return $this->process_date; }  


    public function setProcessReference($process_reference) {
        $this->process_reference=$process_reference;
    }

public function createProcess($process_id,$process_reference, $process_title) {
    $process  = $this->getCnx()->prepare("INSERT INTO process (process_id, process_reference, process_title, process_date) 
                VALUES (:process_id, :process_reference, :process_title, :process_date)");
                $process_date = date('Y-m-d H:i:s');
    $process->execute(["process_id"=>$process_id, "process_reference"=>$process_reference, "process_title"=>$process_title, "process_date"=>$process_date]);

}

public function DeleteMailPriority($process_id) {
    $process = $this->getCnx()->prepare('DELETE FROM process WHERE process_id= :id');
    $process->execute(['id'=>$process_id]);
}

public function updateMailPriority($process_id,$process_reference, $process_title, $process_date){
    $process = $this->getCnx()->prepare('UPDATE process 
                                                SET 
                                                process_reference =:process_reference,
                                                process_title =:process_title,
                                                process_date =:process_date
                                                WHERE process_id=:process_id');     
    $process->execute([':process_id'=>$process_id,':process_reference'=>$process_reference, ':process_title'=>$process_title,'process_date'=>$process_date]);

}
}
?>