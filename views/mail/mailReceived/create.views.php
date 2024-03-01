<?php

require_once 'models/mail/mailManager.class.php';
require_once 'models/mail/mailReceived.class.php';
require_once 'models/mail/mailSend.class.php';

$mailReceived = new MailReceived();
$mailManager = new mailManager();
$mailSend = new MailSend();
$mailtoreceive = $mailManager ->searchMailSendById($_GET['id']);
foreach ($mailtoreceive as $mail) {
    $mailReceived->createMailReceived(NULL, $mail['mail_send_date'], $mail['copy_type_id'],$mail['mail_send_id'] ,$_COOKIE['id']);
    $mailSend->updateMailSendStatus ($_GET['id'] ) ;
    echo '<p> Vous avez validez avec Success  </p> ';
}
?>
