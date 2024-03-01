<?php
require_once 'models/mail/mailManager.class.php';


$mailReceived = new mailManager();
$mailReceiveds = $mailReceived->allMailReceived();

echo "<h1> Courier  Recu </h1>";
echo "<a href=\"index.php?q=mail&categ=mailReceived&sub=create\"> Recevoir un Couriel </a><br>";
echo "<table border=\"2\" width=\"800px\">";
echo "<tr><th>ID</th><th>Date</th><th>Type ID</th><th>Mail ID</th><th>Organization ID</th><th colspan =2>Action</th></tr>";

foreach($mailReceiveds as $mailReceived){
    echo "<tr>";
    echo "<td>". $mailReceived['mail_received_id'];
    echo "<td>". $mailReceived['mail_received_date'];
    echo "<td>". $mailReceived['copy_type_id'];
    echo "<td>". $mailReceived['mail_send_id'];
    echo "<td>". $mailReceived['customer_id'];
    echo "<td><a href=\"index.php?q=mailReceived&sub=delete&id=". $mailReceived['mail_received_id'] ."\"><i class='fas fa-trash'></a>";
    echo "<td><a href=\"index.php?q=mailReceived&sub=update&id=". $mailReceived['mail_received_id'] ."\"><i class='fas fa-edit'></a>";
}
echo "</table>";
?>
