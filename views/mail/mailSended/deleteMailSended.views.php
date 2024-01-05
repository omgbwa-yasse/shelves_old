<?php
require_once 'models/mail/mailManager.class.php';
require_once 'models/mail/MailSend.class.php';
$mailSendManager = new mailManager();
$mailSend = $mailSendManager ->searchMailSendById($_GET['id']);
foreach ($mailSend as $mailSend) {

    echo '<h1>Vous avez supprimé ce Mail Send avec succès :</h1>';
    echo "<table border='0'>";
    echo "<tr>";   
    echo "<td><b> ID  :</b>".$mailSend['mail_send_id'];
    echo "<tr>";
    echo "<td><b> Date d'envoi  :</b>".$mailSend['mail_send_date'];
    echo "<tr>";
    echo "<td><b> ID du type  :</b>".$mailSend['type_id'];
    echo "<tr>";
    echo "<td><b> ID du mail  :</b>".$mailSend['mail_id'];
    echo "<tr>";
    echo "<td><b> ID de l'organisation  :</b>".$mailSend['organization_id'];
    echo "<tr>";
    echo "</table>";
    $mailSendObj = new MailSend();
    $mailSendObj ->deleteMailSend($mailSend['mail_send_id']);


echo "<hr/>";

}

?>
<a href="index.php?q=mail&categ=mailSend&sub=allMailSends"> <- tous les Mail Sends</a>
