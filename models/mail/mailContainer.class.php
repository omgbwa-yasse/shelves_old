<?php
require_once 'models/connexion.class.php';
require_once 'models/mail/mail.class.php';

class MailContainer extends mail {
    private $mail_container_id;
    private $mail_container_reference;
    private $mail_container_title;
    private $mail_container_type_id;

    public function __construct() {
        $this->mail_container_id = NULL;
        $this->mail_container_reference = NULL;
        $this->mail_container_title = NULL;
        $this->mail_container_type_id = NULL;
    }

    public function setMailContainerId($mail_container_id) {
        $this->mail_container_id = $mail_container_id;
    }

    public function setMailContainerReference($mail_container_reference) {
        $this->mail_container_reference = $mail_container_reference;
    }

    public function setMailContainerTitle($mail_container_title) {
        $this->mail_container_title = $mail_container_title;
    }

    public function setMailContainerTypeId($mail_container_type_id) {
        $this->mail_container_type_id = $mail_container_type_id;
    }

    public function getMailContainerId() {
        return $this->mail_container_id;
    }

    public function getMailContainerReference() {
        return $this->mail_container_reference;
    }

    public function getMailContainerTitle() {
        return $this->mail_container_title;
    }

    public function getMailContainerTypeId() {
        return $this->mail_container_type_id;
    }

    public function createMailContainer($mail_container_id, $mail_container_reference, $mail_container_title, $mail_container_type_id){
        $mail_container = $this->getCnx()->prepare("INSERT INTO mail_container (mail_container_id, mail_container_reference, mail_container_title, mail_container_type_id) 
        VALUES (:mail_container_id, :mail_container_reference, :mail_container_title, :mail_container_type_id)");
        $mail_container->execute([
            ':mail_container_id' => $mail_container_id,
            ':mail_container_reference' => $mail_container_reference,
            ':mail_container_title' => $mail_container_title,
            ':mail_container_type_id' => $mail_container_type_id,
        ]);
    }

    public function deleteMailContainer($mail_container_id) {
        $mail_container = $this->getCnx()->prepare('DELETE FROM mail_container WHERE mail_container_id = :id');
        $mail_container->execute(['id' => $mail_container_id]);
    }

    public function updateMailContainer($mail_container_id, $mail_container_reference, $mail_container_title, $mail_container_type_id){
        $mail_container = $this->getCnx()->prepare('UPDATE mail_container 
                                                    SET 
                                                    mail_container_reference = :mail_container_reference,
                                                    mail_container_title = :mail_container_title,
                                                    mail_container_type_id = :mail_container_type_id
                                                    WHERE mail_container_id = :mail_container_id');     
        $mail_container->execute([
            ':mail_container_id' => $mail_container_id, 
            ':mail_container_reference' => $mail_container_reference,
            ':mail_container_title' => $mail_container_title,
            ':mail_container_type_id' => $mail_container_type_id,
        ]);
    }
}
?>
