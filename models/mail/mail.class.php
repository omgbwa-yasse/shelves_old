<?php
require_once 'models/connexion.class.php';
require_once 'models/mail/mailContainer.class.php';
class mail extends Connexion {
//variable
  private $mail_id;
  private $mail_reference;
  private $mail_title;
  private $mail_observation;
  private $mail_date_creation;
  private $mail_basket_id;
  private $mail_priority_id;
  private $docnum_id;
  private $mail_typology_id;
  private $mail_process_id;

  public function __construct() {
    $this->mail_id= NULL;
    $this->mail_reference= NULL;
    $this->mail_title= NULL;
    $this->mail_observation= NULL;
    $this->mail_date_creation= NULL;
    $this->mail_basket_id= NULL;
    $this->mail_priority_id= NULL;
    $this->docnum_id= NULL;
    $this->mail_typology_id= NULL;
    $this->mail_process_id= NULL;


}
public function setMailId($mail_id) {
    $this->mail_id=$mail_id;
}
public function setMailTitle($mail_title) {
    $this->mail_title=$mail_title;}
public function setMailObservation($mail_observation){
    $this->mail_observation=$mail_observation;

}   
public function setMailDateCreation($date){
    $this->mail_date_creation = $date;
} 
public function setMailBasketId($mail_basket_id) {
    $this->mail_basket_id=$mail_basket_id;
}
public function setMailPriorityId($mail_priority_id) {   
     $this->mail_priority_id=$mail_priority_id;  }

public function setDocnumId($docnum_id) {
    $this->docnum_id=$docnum_id;
}
public function setMailTypologyId($mail_typology_id) {
    $this->mail_typology_id=$mail_typology_id;
}
public function setMailProcessId( $mail_process_id) {
    $this->mail_process_id=$mail_process_id;}
     
public function getMailid() { return $this->mail_id; }
public function getMailTitle() { return $this->mail_title; }
public function getMailObservation() { return $this->mail_observation; }
public function getMailDateCreation() { return $this->mail_date_creation; }
public function getMailBasketId() { return $this->mail_basket_id; }
public function getMailPriorityId() { return $this->mail_priority_id; }
public function getDocnumId() { return $this->docnum_id; }

public function getMailTypologyId() { return $this->mail_typology_id; }
public  function getMailProcess(){ return $this->mail_process_id; }

public function getMailFromDB($id){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_id = '.$id.' ');
    $mail->execute();

   return $mail->fetchAll();;
}
public function setMailById($id) {
    // Suppose getMailFromDatabase is a method that retrieves a mail from your database based on its ID
    $mail = $this->getMailFromDB($id);

    if ($mail) {
        $this->mail_id = $mail['mail_id'];
        $this->mail_reference = $mail['mail_reference'];
        $this->mail_title = $mail['mail_title'];
        $this->mail_observation = $mail['mail_observation'];
        $this->mail_date_creation = $mail['mail_date_creation'];
        $this->mail_basket_id = $mail['mail_basket_id'];
        $this->mail_priority_id = $mail['mail_priority_id'];
        $this->docnum_id = $mail['docnum_id'];
        $this->mail_typology_id = $mail['mail_typology_id'];
        $this->mail_process_id = $mail['mail_process_id'];
    } else {
        echo "Aucun courrier trouvé avec l'ID : " . $id;
    }
}

//create a mail

public function createMail($mail_id,$mail_reference,$mail_title,$mail_observation,$mail_date_creation,$mail_basket_id,$mail_priority_id,$mail_docnum_id,$process_id,$mail_typology_id){
    $mail  = $this->getCnx()->prepare( "INSERT INTO mail ( mail_id,mail_reference,mail_title,mail_observation,mail_date_creation,mail_basket_id,mail_priority_id,mail_docnum_id,process_id,mail_typology_id) 
    VALUES ( NULL,:mail_reference,:mail_title,:mail_observation,:mail_date_creation,:mail_basket_id,:mail_priority_id,:mail_docnum_id,:process_id,:mail_typology_id)");
    $mail->execute([':mail_reference'=>$mail_reference,
                    ':mail_title'=>$mail_title,
                    ':mail_observation'=>$mail_observation,
                    ':mail_date_creation'=>$mail_date_creation,
                    ':mail_basket_id'=>$mail_basket_id,
                    ':mail_priority_id'=>$mail_priority_id,
                    ':mail_docnum_id'=>$mail_docnum_id,
                    ':process_id'=>$process_id,
                    ':mail_typology_id'=>$mail_typology_id]);
}
public function updateMail($mail_id, $mail_reference, $mail_title, $mail_observation, $mail_date_creation, $mail_basket_id, $mail_priority_id, $docnum_id, $process_id, $mail_typology_id){
    $mail = $this->getCnx()->prepare('UPDATE mail 
                    SET 
                    mail_reference = :mail_reference,
                    mail_title = :mail_title,
                    mail_observation = :mail_observation,
                    mail_date_creation = :mail_date_creation,
                    mail_basket_id = :mail_basket_id,
                    mail_priority_id = :mail_priority_id,
                    docnum_id = :docnum_id,
                    process_id = :process_id,
                    mail_typology_id = :mail_typology_id
                    WHERE mail_id = :mail_id');
    $mail->execute([
        ':mail_id' => $mail_id,
        ':mail_reference' => $mail_reference,
        ':mail_title' => $mail_title,
        ':mail_observation' => $mail_observation,
        ':mail_date_creation' => $mail_date_creation,
        ':mail_basket_id' => $mail_basket_id,
        ':mail_priority_id' => $mail_priority_id,
        ':docnum_id' => $docnum_id,
        ':process_id' => $process_id,
        ':mail_typology_id' => $mail_typology_id
    ]);
}

public function deleteMail($mail_id){
    $mail = $this->getCnx()->prepare('DELETE FROM mail Where mail_id=:mail_id');
    $mail->execute([':mail_id'=>$mail_id]);

}

}
?>