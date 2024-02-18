<?php
require_once 'models/mail/mailManager.class.php';
require_once 'models/mail/Mail.class.php';
$mailManager = new mailManager();
$mail = $mailManager ->mailByID($_GET['id']);
foreach ($mail as $mail) {

    echo '<h1>Vous avez supprimé ce Courrier avec succès :</h1>';
    echo "<table border='0'>";
    echo "<tr>";   
    echo "<td><b> ID  :</b>".$mail['mail_id'];
    echo "<tr>";
    echo "<td><b> Référence  :</b>".$mail['mail_reference'];
    echo "<tr>";
    echo "<td><b> Titre  :</b>".$mail['mail_title'];
    echo "<tr>";
    echo "<td><b> Observation  :</b>".$mail['mail_observation'];
    echo "<tr>";
    echo "<td><b> Date de création  :</b>".$mail['mail_date_creation'];
    echo "<tr>";

    echo "<td><b> ID de la priorité  :</b>".$mail['mail_priority_id'];
    echo "<tr>";
    echo "<td><b> ID du docnum  :</b>".$mail['docnum_id'];
    echo "<tr>";
    echo "<td><b> ID de la typologie  :</b>".$mail['mail_typology_id'];
    echo "<tr>";
    echo "</table>";
    $mailObj = new Mail();
    $mailObj ->deleteMail($mail['mail_id']);


echo "<hr/>";

}

?>
<a href="index.php?q=mail&categ=mail&sub=allMails"> <- tous les Courriers</a>
