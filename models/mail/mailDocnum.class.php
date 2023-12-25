<?php
require_once 'models/connexion.class.php';

class MailDocNum extends Connexion {
    // Variables
    private $mail_docnum_id;
    private $mail_docnum_path;
    private $mail_docnum_filename;

    public function __construct() {
        $this->mail_docnum_id = NULL;
        $this->mail_docnum_path = NULL;
        $this->mail_docnum_filename = NULL;
    }

    // Setters
    public function setMailDocNumId($mail_docnum_id) {
        $this->mail_docnum_id = $mail_docnum_id;
    }

    public function setMailDocNumPath($mail_docnum_path) {
        $this->mail_docnum_path = $mail_docnum_path;
    }

    public function setMailDocNumFileName($mail_docnum_filename) {
        $this->mail_docnum_filename = $mail_docnum_filename;
    }

    // Getters
    public function getMailDocNumId() {
        return $this->mail_docnum_id;
    }

    public function getMailDocNumPath() {
        return $this->mail_docnum_path;
    }

    public function getMailDocNumFileName() {
        return $this->mail_docnum_filename;
    }

    // Database operations
    public function createMailDocNum($mail_docnum_id, $mail_docnum_path, $mail_docnum_filename) {
        $mail_docnum = $this->getCnx()->prepare("INSERT INTO mail_docnum (mail_docnum_id, mail_docnum_path, mail_docnum_filename) VALUES (:mail_docnum_id, :mail_docnum_path, :mail_docnum_filename)");
        $mail_docnum->execute(["mail_docnum_id" => $mail_docnum_id, "mail_docnum_path" => $mail_docnum_path, "mail_docnum_filename" => $mail_docnum_filename]);
    }

    public function deleteMailDocNum($mail_docnum_id) {
        $mail_docnum = $this->getCnx()->prepare('DELETE FROM mail_docnum WHERE mail_docnum_id = :id');
        $mail_docnum->execute(['id' => $mail_docnum_id]);
    }

    public function updateMailDocNum($mail_docnum_id, $mail_docnum_path, $mail_docnum_filename) {
        $mail_docnum = $this->getCnx()->prepare('UPDATE mail_docnum SET mail_docnum_path = :mail_docnum_path, mail_docnum_filename = :mail_docnum_filename WHERE mail_docnum_id = :mail_docnum_id');
        $mail_docnum->execute([':mail_docnum_id' => $mail_docnum_id, ':mail_docnum_path' => $mail_docnum_path, 'mail_docnum_filename' => $mail_docnum_filename]);
    }

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
?>
