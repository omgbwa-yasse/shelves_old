<?php
require_once 'models/connexion.class.php';
require_once 'models/mail/mail.class.php';

class MailReceived extends mail {
    // Variables
    private $mail_received_id;
    private $mail_received_date;
    private $copy_type_id;
    private $mail_id;
    private $customer_id;

    public function __construct() {
        $this->mail_received_id = NULL;
        $this->mail_received_date = NULL;
        $this->copy_type_id = NULL;
        $this->mail_id = NULL;
        $this->customer_id = NULL;
    }

    // Setters
    public function setMailReceivedId($mail_received_id) {
        $this->mail_received_id = $mail_received_id;
    }

    public function setMailReceivedDate($mail_received_date) {
        $this->mail_received_date = $mail_received_date;
    }

    public function setTypeId($copy_type_id) {
        $this->copy_type_id = $copy_type_id;
    }

    public function setMailId($mail_id) {
        $this->mail_id = $mail_id;
    }

    public function setOrganizationId($customer_id) {
        $this->customer_id = $customer_id;
    }

    // Getters
    public function getMailReceivedId() {
        return $this->mail_received_id;
    }

    public function getMailReceivedDate() {
        return $this->mail_received_date;
    }

    public function getTypeId() {
        return $this->copy_type_id;
    }

    public function getMailId() {
        return $this->mail_id;
    }

    public function getOrganizationId() {
        return $this->customer_id;
    }

    // Database operations
    public function createMailReceived($mail_received_id, $mail_received_date, $copy_type_id, $mail_send_id, $customer_id) {
        $mail_received = $this->getCnx()->prepare("INSERT INTO mail_received (mail_received_id, mail_received_date, copy_type_id, mail_send_id, customer_id) VALUES (:mail_received_id, :mail_received_date, :copy_type_id , :mail_send_id, :customer_id)");
        $mail_received->execute(["mail_received_id" => $mail_received_id, "mail_received_date" => $mail_received_date, "copy_type_id" => $copy_type_id, "customer_id" => $customer_id , "mail_send_id" => $mail_send_id]);
    }

    public function deleteMailReceived($mail_received_id) {
        $mail_received = $this->getCnx()->prepare('DELETE FROM mail_received WHERE mail_received_id = :id');
        $mail_received->execute(['id' => $mail_received_id]);
    }

    public function updateMailReceived($mail_received_id, $mail_received_date, $copy_type_id, $mail_id, $customer_id) {
        $mail_received = $this->getCnx()->prepare('UPDATE mail_received SET mail_received_date = :mail_received_date, copy_type_id = :copy_type_id, customer_id = :customer_id WHERE mail_received_id = :mail_received_id');
        $mail_received->execute([':mail_received_id' => $mail_received_id, ':mail_received_date' => $mail_received_date, ':copy_type_id' => $copy_type_id, 'customer_id' => $customer_id]);
    }


}
?>
