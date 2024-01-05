<?php
require_once 'models/mail/mailManager.class.php';
require_once 'models/mail/MailTypology.class.php';
$mailTypologyManager = new mailManager();
$mailTypology = $mailTypologyManager ->mailTypologyByID($_GET['id']);
foreach ($mailTypology as $mailTypology) {

    echo '<h1>Vous avez supprimé ce Mail Typology avec succès :</h1>';
    echo "<table border='0'>";
    echo "<tr>";   
    echo "<td><b> ID  :</b>".$mailTypology['mail_typology_id'];
    echo "<tr>";
    echo "<td><b> Titre  :</b>".$mailTypology['mail_typology_title'];
    echo "<tr>";
    echo "<td><b> Observation  :</b>".$mailTypology['mail_typology_observation'];
    echo "<tr>";
    echo "<td><b> ID de l'activité  :</b>".$mailTypology['activity_id'];
    echo "<tr>";
    echo "<td><b> ID de la durée du traitement  :</b>".$mailTypology['treatment_duration_id'];
    echo "<tr>";
    echo "</table>";
    $mailTypologyObj = new MailTypology();
    $mailTypologyObj ->deleteMailTypology($mailTypology['mail_typology_id']);


echo "<hr/>";

}

?>
<a href="index.php?q=mail&categ=mailTypology&sub=allMailTypologies"> <- tous les Mail Typologies</a>
