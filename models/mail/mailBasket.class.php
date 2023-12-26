<?php
require_once 'models/connexion.class.php';
require_once 'models/mail/mail.class.php';


class MailBasket extends mail {
    // Variables
    private $mail_basket_id;
    private $mail_basket_title;
    private $mail_basket_observation;

    public function __construct() {
        $this->mail_basket_id = NULL;
        $this->mail_basket_title = NULL;
        $this->mail_basket_observation = NULL;
    }

    // Setters
    public function setMailBasketId($mail_basket_id) {
        $this->mail_basket_id = $mail_basket_id;
    }

    public function setMailBasketTitle($mail_basket_title) {
        $this->mail_basket_title = $mail_basket_title;
    }

    public function setMailBasketObservation($mail_basket_observation) {
        $this->mail_basket_observation = $mail_basket_observation;
    }

    // Getters
    public function getMailBasketId() {
        return $this->mail_basket_id;
    }

    public function getMailBasketTitle() {
        return $this->mail_basket_title;
    }

    public function getMailBasketObservation() {
        return $this->mail_basket_observation;
    }

    // Database operations
    public function createMailBasket($mail_basket_id, $mail_basket_title, $mail_basket_observation) {
        $mail_basket = $this->getCnx()->prepare("INSERT INTO mail_basket (mail_basket_id, mail_basket_title, mail_basket_observation) VALUES (:mail_basket_id, :mail_basket_title, :mail_basket_observation)");
        $mail_basket->execute(["mail_basket_id" => $mail_basket_id, "mail_basket_title" => $mail_basket_title, "mail_basket_observation" => $mail_basket_observation]);
    }

    public function deleteMailBasket($mail_basket_id) {
        $mail_basket = $this->getCnx()->prepare('DELETE FROM mail_basket WHERE mail_basket_id = :id');
        $mail_basket->execute(['id' => $mail_basket_id]);
    }

    public function updateMailBasket($mail_basket_id, $mail_basket_title, $mail_basket_observation) {
        $mail_basket = $this->getCnx()->prepare('UPDATE mail_basket SET mail_basket_title = :mail_basket_title, mail_basket_observation = :mail_basket_observation WHERE mail_basket_id = :mail_basket_id');
        $mail_basket->execute([':mail_basket_id' => $mail_basket_id, ':mail_basket_title' => $mail_basket_title, 'mail_basket_observation' => $mail_basket_observation]);
    }

    public function searchById($mail_basket_id) {
        $mail_basket = $this->getCnx()->prepare('SELECT * FROM mail_basket WHERE mail_basket_id = :mail_basket_id');
        $mail_basket->execute([':mail_basket_id' => $mail_basket_id]);
        return $mail_basket->fetchAll();
    }

    public function searchByTitle($mail_basket_title) {
        $mail_basket = $this->getCnx()->prepare('SELECT * FROM mail_basket WHERE mail_basket_title = :mail_basket_title');
        $mail_basket->execute([':mail_basket_title' => $mail_basket_title]);
        return $mail_basket->fetchAll();
    }
}
?>
