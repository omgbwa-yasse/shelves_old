<?php
require_once 'models/connexion.class.php';

class mail extends Connexion {
//variable
  private $mail_priority_id;
  private $mail_priority_title;

  public function __construct() {
    $this->mail_priority_id= NULL;
    $this->mail_priority_title= NULL;
   


}

public function setMailPriorityTitle($mail_title) {
    $this->mail_title=$mail_title;}
  


public function setMailPriorityId($mail_priority_id) {   
     $this->mail_priority_id=$mail_priority_id;  }



public function getMailPriorityTitle() { return $this->mail_priority_id; }

public function getMailPriorityId() { return $this->mail_priority_id; }


public function createMailPriority($mail_priority_id, $mail_priority_title){
    $mail_priority  = $this->getCnx()->prepare( "INSERT INTO mail_priority (mail_priority_id,mail_priority_title) 
    VALUES ( :mail_priority_id,:mail_priority_title)");
    $mail_priority->execute([':mail_priority_id'=>$mail_priority_id,
                    ':mail_priority_title'=>$mail_priority_title,
                ]);
    
}

public function DeleteMailPriority($mail_priority_id) {
    $mail_priority = $this->getCnx()->prepare('DELETE FROM mail_priority WHERE mail_priority_id= :id');
    $mail_priority->execute(['id'=>$mail_priority_id]);
}
public function updateMailPriority($mail_priority_id, $mail_priority_title){
    $mail_priority = $this->getCnx()->prepare('UPDATE mail_priority 
                                                SET 
                                                mail_priority_title= :mail_priority_title
                                                WHERE mail_priority_id=:mail_priority_id');     
    $mail_priority->execute([':mail_priority_id'=>$mail_priority_id, ':mail_priority_title'=>$mail_priority_title]);

}
}
?>