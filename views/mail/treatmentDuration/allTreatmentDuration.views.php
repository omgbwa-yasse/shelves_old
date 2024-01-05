<?php
require_once 'models/mail/mailManager.class.php';

?>
<ul class="S_optionSousMenu">
    <li><a href="index.php?q=mail&categ=treatmentDuration&sub=createTreatmentDuration"> Créer un Treatment Duration </a></li>
</ul>

<h1>Treatment Durations</h1>
<table border="2" width="800px">
    <tr>        
        <th>ID </th>
        <th>Temps</th>
        <th>Observation</th>
        <th colspan =3>Action</th>
    </tr>
<?php
$treatmentDuration = new mailManager();
$allTreatmentDurations = $treatmentDuration -> allMailTreatmentDuration();
foreach($allTreatmentDurations as $treatmentDuration){
    echo "<tr>";
    echo "<td>". $treatmentDuration['treatment_duration_id'];
    echo "<td>". $treatmentDuration['treatment_duration_time'];
    echo "<td>". $treatmentDuration['treatment_duration_observation'];
   
   
    echo "<td><a href=\"index.php?q=mail&categ=treatmentDuration&sub=deleteTreatmentDuration&id=". $treatmentDuration['treatment_duration_id'] ."\">Supprimer</a>";
    echo "<td><a href=\"index.php?q=mail&categ=treatmentDuration&sub=updateTreatmentDuration&id=". $treatmentDuration['treatment_duration_id'] ."\">Modifier</a>";
    
    

}?>
</table>
