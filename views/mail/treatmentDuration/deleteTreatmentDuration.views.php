<?php
require_once 'models/mail/mailManager.class.php';
require_once 'models/mail/TreatmentDuration.class.php';
$treatmentDurationManager = new mailManager();
$treatmentDuration = $treatmentDurationManager ->treatmentDurationByID($_GET['id']);
foreach ($treatmentDuration as $treatmentDuration) {

    echo '<h1>Vous avez supprimé ce Treatment Duration avec succès :</h1>';
    echo "<table border='0'>";
    echo "<tr>";   
    echo "<td><b> ID  :</b>".$treatmentDuration['treatment_duration_id'];
    echo "<tr>";
    echo "<td><b> Temps  :</b>".$treatmentDuration['treatment_duration_time'];
    echo "<tr>";
    echo "<td><b> Observation  :</b>".$treatmentDuration['treatment_duration_observation'];
    echo "<tr>";
    echo "</table>";
    $treatmentDurationObj = new TreatmentDuration();
    $treatmentDurationObj ->deleteTreatmentDuration($treatmentDuration['treatment_duration_id']);


echo "<hr/>";

}

?>
<a href="index.php?q=mail&categ=treatmentDuration&sub=allTreatmentDurations"> <- tous les Treatment Durations</a>
