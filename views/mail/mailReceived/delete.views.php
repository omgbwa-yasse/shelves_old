<?php
require_once 'models/MailReceived.class.php';

$mailReceived = new MailReceived();
$mailReceived->deleteMailReceived($_GET['id']);

echo '<h1>La supression es un success:</h1>';
echo "<a href=\"index.php?q=mail&categ=mailReceived&sub=all\"> <- Couriel Recue </a>";
?>
