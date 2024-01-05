<?php
require_once 'models/mail/mailManager.class.php';
require_once 'models/mail/MailReceived.class.php';
$mailReceivedManager = new mailManager();
$mailReceived = $mailReceivedManager ->searchMailReceivedById($_GET['id']);
foreach ($mailReceived as $mailReceived) {

    echo '<h1>Vous avez supprimé ce Courriel Reçu avec succès :</h1>';
    echo "<table border='0'>";
    echo "<tr>";   
    echo "<td><b> ID  :</b>".$mailReceived['mail_received_id'];
    echo "<tr>";
    echo "<td><b> Date de réception  :</b>".$mailReceived['mail_received_date'];
    echo "<tr>";
    echo "<td><b> ID du type  :</b>".$mailReceived['type_id'];
    echo "<tr>";
    echo "<td><b> ID du mail  :</b>".$mailReceived['mail_id'];
    echo "<tr>";
    echo "<td><b> ID de l'organisation  :</b>".$mailReceived['organization_id'];
    echo "<tr>";
    echo "</table>";
    $mailReceivedObj = new MailReceived();
    $mailReceivedObj ->deleteMailReceived($mailReceived['mail_received_id']);


echo "<hr/>";

}

?>
<a href="index.php?q=mail&categ=mailReceived&sub=allMailReceiveds"> <- tous les Courriels Reçus</a>
