
<?php
require_once 'models/connexion.class.php';
require_once 'models/mail/mail.class.php';
class MailSend extends mail {
    // Variables
    private $mail_send_id;
    private $mail_send_date;
    private $type_id;
    private $mail_id;
    private $organization_id;

    public function __construct() {
        $this->mail_send_id = NULL;
        $this->mail_send_date = NULL;
        $this->type_id = NULL;
        $this->mail_id = NULL;
        $this->organization_id = NULL;
    }

    // Setters
    public function setMailSendId($mail_send_id) {
        $this->mail_send_id = $mail_send_id;
    }

    public function setMailSendDate($mail_send_date) {
        $this->mail_send_date = $mail_send_date;
    }

    public function setTypeId($type_id) {
        $this->type_id = $type_id;
    }

    public function setMailId($mail_id) {
        $this->mail_id = $mail_id;
    }

    public function setOrganizationId($organization_id) {
        $this->organization_id = $organization_id;
    }

    // Getters
    public function getMailSendId() {
        return $this->mail_send_id;
    }

    public function getMailSendDate() {
        return $this->mail_send_date;
    }

    public function getTypeId() {
        return $this->type_id;
    }

    public function getMailId() {
        return $this->mail_id;
    }

    public function getOrganizationId() {
        return $this->organization_id;
    }

    // Database operations
    public function createMailSend( $mail_send_date, $mail_id, $organization_id) {
        $mail_send = $this->getCnx()->prepare("INSERT INTO mail_send (mail_send_id, mail_send_date,  mail_id, organization_id) VALUES (NULL, :mail_send_date,  :mail_id, :organization_id)");
       
        if( $mail_send->execute([ "mail_send_date" => $mail_send_date,  "mail_id" => $mail_id, "organization_id" => $organization_id])){
            return 'true';
        }
        else {
            return 'false';
        }
    }

    public function deleteMailSend($mail_send_id) {
        $mail_send = $this->getCnx()->prepare('DELETE FROM mail_send WHERE mail_send_id = :id');
        $mail_send->execute(['id' => $mail_send_id]);
    }

    public function updateMailSend($mail_send_id, $mail_send_date, $mail_id, $organization_id) {
        $mail_send = $this->getCnx()->prepare('UPDATE mail_send SET mail_send_date = :mail_send_date, mail_id = :mail_id, organization_id = :organization_id WHERE mail_send_id = :mail_send_id');
        $mail_send->execute([':mail_send_id' => $mail_send_id, ':mail_send_date' => $mail_send_date,  'mail_id' => $mail_id, 'organization_id' => $organization_id]);
    }

    public function updateMailSendStatus($mail_send_id) {
        $mail_send = $this->getCnx()->prepare('UPDATE mail_send SET  status = "Reçu" WHERE mail_send_id = :mail_send_id');
        $mail_send->execute(['mail_send_id' => $mail_send_id]);

    }
    public function reject($mail_send_id) {
        $mail_send = $this->getCnx()->prepare('UPDATE mail_send SET  status = "Refuser" WHERE mail_send_id = :mail_send_id');
        $mail_send->execute(['mail_send_id' => $mail_send_id]);

    }
}

?>
