<?php
require_once 'models/connexion.class.php';
require_once 'models/mail/mail.class.php';

class mailManager extends mail {
    public function __construct() {

    }


    //mail
public function allMail(){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail
                                        LEFT JOIN mail_priority ON mail_priority.mail_priority_id = mail.mail_priority_id
                                        LEFT JOIN mail_docnum ON mail_docnum.mail_docnum_id = mail.mail_docnum_id
                                        LEFT JOIN mail_typology ON mail_typology.mail_typology_id = mail.mail_typology_id');
    $mail->execute();

   return $mail->fetchAll();;
} 
public function mailByID($id){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail 
                                        LEFT JOIN mail_priority ON mail_priority.mail_priority_id = mail.mail_priority_id
                                        LEFT JOIN mail_docnum ON mail_docnum.mail_docnum_id = mail.mail_docnum_id
                                        LEFT JOIN mail_typology ON mail_typology.mail_typology_id = mail.mail_typology_id
                                        WHERE mail.mail_id = :id ');
    $mail->execute(['id'=>$id]);

   return $mail->fetchAll();;
}

public function searchByMailTitle($title){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_title LIKE :title ');
    $mail->execute(['title'=>$title]);

   return $mail->fetchAll();;
}


public function searchByMailReference($reference){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_reference LIKE :reference ');
    $mail->execute([':reference'=>$reference]);

   return $mail->fetchAll();;
}

public function searchByMailPriorityId($priority_id){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_priority_id = :priority_id ');
    $mail->execute([':priority_id'=>$priority_id]);

   return $mail->fetchAll();;

}

public function searchByMailDateCreation($date_creation){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_date_creation LIKE :date_creation ');
    $mail->execute([':date_creation'=>$date_creation]);

   return $mail->fetchAll();;
}


public function searchByMailDocnum( $docum_id ){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_docnum_id = :docnum_id ');
    $mail->execute(['docnum_id'=>$docum_id]);

   return $mail->fetchAll();;
}



public function searchByMailObservation( $Observation ){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_observation LIKE :mail_observation');
    $mail->execute(['mail_observation'=>$Observation]);
   return $mail->fetchAll();;
}



//search with container 
public function allMailContainer(){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail_container ');
    $mail->execute();

   return $mail->fetchAll();;
}
public function mailContainerByID($id){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail_container WHERE mail_container_id = :id');
    $mail->execute([':id' => $id]);

    return $mail->fetchAll();
}

public function searchByMailContainerReference( $container_reference ){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_id IN 
                                            (SELECT mail_id FROM mail_in_container WHERE container_id IN 
                                                ( SELECT container_id FROM mail_container WHERE mail_container_reference=:ref)');
    $mail->execute(['ref'=>$container_reference]);


   return $mail->fetchAll();;
}

public function searchByMailContainerTitle( $container_Title){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_id IN 
                                            (SELECT mail_id FROM mail_in_container WHERE container_id IN 
                                                ( SELECT container_id FROM mail_container WHERE mail_container_title=:Title)'); 
                                                   $mail->execute([':Title'=>$container_Title]);


   return $mail->fetchAll();;
}

// Couriels Received

public function myReceivedMail($id){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail_send 
                                        inner JOIN user ON user.organization_id = mail_send.organization_id 
                                        inner JOIN organization ON user.organization_id = organization.organization_id 
                                        inner JOIN mail ON mail.mail_id = mail_send.mail_id
                                            WHERE user.user_id = :user_id ');
    $mail->execute([':user_id' => $id]);

   return $mail->fetchAll();;
}

public function allMailReceived(){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail_received ');
    $mail->execute();

   return $mail->fetchAll();
}

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


// Couriels Envoyer
public function allMailSend(){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail_send 
                                        LEFT JOIN mail ON mail.mail_id = mail_send.mail_id 
                                        LEFT JOIN organization ON organization.organization_id = mail_send.organization_id');
    $mail->execute();

   return $mail->fetchAll();;
}
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

public function allDocnum(){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail_docnum ');
    $mail->execute();

   return $mail->fetchAll();;
}
public function mailDocNumByID($mail_docnum_id) {
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

public function searchMailByFileName( $mail_docnum_filename) {
    $mail_docnum = $this->getCnx()->prepare('');
}
//priority 
public function allMailPriority(){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail_priority ');
    $mail->execute();

   return $mail->fetchAll();;
}

public function searchByMailPriorityTitle($mail_priority_title){
    $mail_priority = $this->getCnx()->prepare('SELECT * FROM mail_priority WHERE mail_priority_title like= :mail_priority_title ');
    $mail_priority->execute([':mail_priority_title'=> $mail_priority_title]);
    
    return $mail_priority->fetchAll();
}

public function PriorityByid($mail_priority_id){
    $mail_priority = $this->getCnx()->prepare('SELECT * FROM mail_priority WHERE mail_priority_id = :mail_priority_title ');
    $mail_priority->execute([':mail_priority_id'=> $mail_priority_id]);
    
    return $mail_priority->fetchAll();
}


//Typology
public function allMailTypology(){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail_typology ');
    $mail->execute();

   return $mail->fetchAll();;
}
public function mailTypologyByID( $mail_typology_id ){
    $mail = $this->getCnx()->prepare('SELECT * FROM mail WHERE mail_typology_id = :mail_typology_id ');
    $mail->execute(['mail_typology_id'=>$mail_typology_id]);
    return $mail->fetchAll();}

public function searchByMailTypologyTitle($mail_typology_title) {
    $mail_typology = $this->getCnx()->prepare('SELECT * FROM mail_typology WHERE mail_typology_title = :mail_typology_title');
    $mail_typology->execute([':mail_typology_title' => $mail_typology_title]);
    return $mail_typology->fetchAll();
}


//organisation 
public function organisationByID($id){
    $mail = $this->getCnx()->prepare('SELECT * FROM organization WHERE organization_id = :id');
    $mail->execute([':id' => $id]);

    return $mail->fetchAll();
}
public function allorganisation(){
    $mail = $this->getCnx()->prepare('SELECT * FROM organization ');
    $mail->execute();

    return $mail->fetchAll();
}

//Activity 
public function allActivity(){
    $activity = $this->getCnx()->prepare('SELECT * FROM activity ');
    $activity->execute();
    return $activity->fetchAll();
}

public function searchById($activity_id) {
    $activity = $this->getCnx()->prepare('SELECT * FROM activity WHERE activity_id = :activity_id');
    $activity->execute([':activity_id' => $activity_id]);
    return $activity->fetchAll();
}

public function searchByTitle($activity_title) {
    $activity = $this->getCnx()->prepare('SELECT * FROM activity WHERE activity_title like :activity_title');
    $activity->execute([':activity_title' => $activity_title]);
    return $activity->fetchAll();
}

public function searchByParentId($activity_parent_id) {
    $activity = $this->getCnx()->prepare('SELECT * FROM activity WHERE activity_parent_id = :activity_parent_id');
    $activity->execute([':activity_parent_id' => $activity_parent_id]);
    return $activity->fetchAll();
}




//copy type 
public function allCopyType() {
    $copy_type = $this->getCnx()->prepare('SELECT * FROM copy_type ');
    $copy_type->execute();
    return $copy_type->fetchAll();
}

public function searchCopyTypeById($copy_type_id) {
    $copy_type = $this->getCnx()->prepare('SELECT * FROM copy_type WHERE copy_type_id = :copy_type_id');
    $copy_type->execute([':copy_type_id' => $copy_type_id]);
    return $copy_type->fetchAll();
}

public function searchCopyTypeByTitle($copy_type_title) {
    $copy_type = $this->getCnx()->prepare('SELECT * FROM copy_type WHERE copy_type_title = :copy_type_title');
    $copy_type->execute([':copy_type_title' => $copy_type_title]);
    return $copy_type->fetchAll();
}
}