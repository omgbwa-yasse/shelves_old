<?php
require_once 'models/connexion.class.php';
require_once 'models/mail/mail.class.php';

class mailManager extends mail {
    public function __construct() {

    }


    
public function searchByMailTitle($title){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_title LIKE :title ');
    $mail->execute(['title'=>$title]);

    return $mail->fetch(PDO::FETCH_ASSOC);
}


public function searchByMailReference($reference){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_reference LIKE :reference ');
    $mail->execute([':reference'=>$reference]);

    return $mail->fetch(PDO::FETCH_ASSOC);
}

public function searchByMailPriorityId($priority_id){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_priority_id LIKE :priority_id ');
    $mail->execute([':priority_id'=>$priority_id]);

    return $mail->fetch(PDO::FETCH_ASSOC);

}

public function searchByMailDateCreation($date_creation){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_date_creation LIKE :date_creation ');
    $mail->execute([':date_creation'=>$date_creation]);

    return $mail->fetch(PDO::FETCH_ASSOC);
}

public function searchByMailBasketId( $basket_id ){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_basket_id LIKE :basket_id ');
    $mail->execute([':basket_id'=>$basket_id]);

    return $mail->fetch(PDO::FETCH_ASSOC);
}

public function searchByMailDocnum( $docum_id ){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_docnum_id LIKE :docnum_id ');
    $mail->execute(['docnum_id'=>$docum_id]);

    return $mail->fetch(PDO::FETCH_ASSOC);
}

public function searchByMailTypologyId( $mail_typology_id ){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_typology_id LIKE :mail_typology_id ');
    $mail->execute(['mail_typology_id'=>$mail_typology_id]);
    return $mail->fetch(PDO::FETCH_ASSOC);}

public function searchByMailObservation( $Observation ){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_observation LIKE :mail_observation');
    $mail->execute(['mail_observation'=>$Observation]);
    return $mail->fetch(PDO::FETCH_ASSOC);
}

public function searchByMailProcessId( $process_id ){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE process_id LIKE :process_id');
    $mail->execute(['process_id'=>$process_id]);
    return $mail->fetch(PDO::FETCH_ASSOC);


}

//search with container 
public function searchByMailContainerReference( $container_reference ){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_id IN 
                                            (SELECT mail_id FROM mail_in_container WHERE container_id IN 
                                                ( SELECT container_id FROM mail_container WHERE mail_container_reference=:ref)');
    $mail->execute(['ref'=>$container_reference]);


    return $mail->fetch(PDO::FETCH_ASSOC);
}

public function searchByMailContainerTitle( $container_Title){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_id IN 
                                            (SELECT mail_id FROM mail_in_container WHERE container_id IN 
                                                ( SELECT container_id FROM mail_container WHERE mail_container_title=:Title)'); 
                                                   $mail->execute([':Title'=>$container_Title]);


    return $mail->fetch(PDO::FETCH_ASSOC);
}

//Mail Received

public function searchMailReceivedById($mail_received_id) {
    $mail_received = $this->getCnx()->prepare('SELECT * FROM mail_received WHERE mail_received_id = :mail_received_id');
    $mail_received->execute([':mail_received_id' => $mail_received_id]);
    return $mail_received->fetchAll();
}

public function searchMailReceivedByDate($mail_received_date) {
    $mail_received = $this->getCnx()->prepare('SELECT * FROM mail_received WHERE mail_received_date = :mail_received_date');
    $mail_received->execute([':mail_received_date' => $mail_received_date]);
    return $mail_received->fetchAll();
}


//Mail Sended
public function searchMailSendById($mail_send_id) {
    $mail_send = $this->getCnx()->prepare('SELECT * FROM mail_send WHERE mail_send_id = :mail_send_id');
    $mail_send->execute([':mail_send_id' => $mail_send_id]);
    return $mail_send->fetchAll();
}

public function searchMailSendByDate($mail_send_date) {
    $mail_send = $this->getCnx()->prepare('SELECT * FROM mail_send WHERE mail_send_date = :mail_send_date');
    $mail_send->execute([':mail_send_date' => $mail_send_date]);
    return $mail_send->fetchAll();
}

// Docnum

public function searchById($mail_docnum_id) {
    $mail_docnum = $this->getCnx()->prepare('SELECT * FROM mail_docnum WHERE mail_docnum_id = :mail_docnum_id');
    $mail_docnum->execute([':mail_docnum_id' => $mail_docnum_id]);
    return $mail_docnum->fetchAll();
}

public function searchByPath($mail_docnum_path) {
    $mail_docnum = $this->getCnx()->prepare('SELECT * FROM mail_docnum WHERE mail_docnum_path = :mail_docnum_path');
    $mail_docnum->execute([':mail_docnum_path' => $mail_docnum_path]);
    return $mail_docnum->fetchAll();
}

public function searchByFileName($mail_docnum_filename) {
    $mail_docnum = $this->getCnx()->prepare('SELECT * FROM mail_docnum WHERE mail_docnum_filename = :mail_docnum_filename');
    $mail_docnum->execute([':mail_docnum_filename' => $mail_docnum_filename]);
    return $mail_docnum->fetchAll();
}
}

