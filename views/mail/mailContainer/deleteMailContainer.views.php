<?php
require_once 'models/mail/mailManager.class.php';
require_once 'models/mail/MailContainer.class.php';
$mailContainerManager = new mailManager();
$mailContainer = $mailContainerManager ->mailContainerByID($_GET['id']);
foreach ($mailContainer as $mailContainer) {

    echo '<h1>Vous avez supprimé ce Mail Container avec succès :</h1>';
    echo "<table border='0'>";
    echo "<tr>";   
    echo "<td><b> Référence  :</b>".$mailContainer['mail_container_reference'];
    echo "<tr>";
    echo "<td><b> TITRE  :</b>".$mailContainer['mail_container_title'];
    echo "<tr>";
    echo "<td><b> Type ID  :</b>".$mailContainer['mail_container_type_id'];
    echo "<tr>";
    echo "</table>";
    $mailContainerObj = new MailContainer();
    $mailContainerObj ->deleteMailContainer($mailContainer['mail_container_id']);


echo "<hr/>";

}

?>
<a href="index.php?q=mail&categ=mailContainer&sub=allMailContainer"> <- tous les Mail Containers</a>
