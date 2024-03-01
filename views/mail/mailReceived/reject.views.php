<?php

require_once 'models/mail/mailManager.class.php';
require_once 'models/mail/mailSend.class.php';

$mailManager = new mailManager();
$mailSend = new MailSend();
$mailSend->reject ($_GET['id'] ) ;
echo '<p> Vous avez Rejeter avec Success  </p> ';

?>
