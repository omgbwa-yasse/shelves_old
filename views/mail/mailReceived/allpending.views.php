<?php
require_once 'models/mail/mailManager.class.php';
echo $_COOKIE['id'];
$mailReceived = new mailManager();
$mailReceiveds = $mailReceived->myReceivedMail($_COOKIE['id']);

echo "<h1> Courier  Recu </h1>";
echo "<table border=\"2\" width=\"800px\">";
echo "<tr><th>ID</th><th>Date</th><th>Type ID</th><th>Mail</th><th>Organization </th><th colspan =2>Action</th></tr>";

foreach($mailReceiveds as $mailReceived){
    echo "<tr>";
    echo "<td>". $mailReceived['mail_send_id'];
    echo "<td>". $mailReceived['mail_send_date'];
    echo "<td>". $mailReceived['copy_type_id'];
    echo "<td>". $mailReceived['mail_reference'];
    echo "<td>". $mailReceived['organization_title'];
    echo "<td><a href=\"index.php?q=mail&categ=mailReceived&sub=create&id=". $mailReceived['mail_send_id'] ."\"><i class='fas fa-thumbs-up'></a>";
    echo "<td><a href=\"index.php?q=mail&categ=mailReceived&sub=reject&id=". $mailReceived['mail_send_id'] ."\"><i class='fas fa-thumbs-down'></a>";
}
echo "</table>";
?>
