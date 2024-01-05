<?php
require_once 'models/mail/mailManager.class.php';

?>
<ul class="S_optionSousMenu">
    <li><a href="index.php?q=mail&categ=mailTypology&sub=createMailTypology"> Créer un Mail Typology </a></li>
</ul>

<h1>Mail Typologies</h1>
<table border="2" width="800px">
    <tr>        
        <th>ID </th>
        <th>Titre</th>
        <th>Observation</th>
        <th>ID de l'activité</th>
        <th>ID de la durée du traitement</th>
        <th colspan =3>Action</th>
    </tr>
<?php
$mailTypology = new mailManager();
$allMailTypologies = $mailTypology -> allMailTypology();
foreach($allMailTypologies as $mailTypology){
    echo "<tr>";
    echo "<td>". $mailTypology['mail_typology_id'];
    echo "<td>". $mailTypology['mail_typology_title'];
    echo "<td>". $mailTypology['mail_typology_observation'];
    echo "<td>". $mailTypology['activity_id'];
    echo "<td>". $mailTypology['treatment_duration_id'];
   
   
    echo "<td><a href=\"index.php?q=mail&categ=mailTypology&sub=deleteMailTypology&id=". $mailTypology['mail_typology_id'] ."\">Supprimer</a>";
    echo "<td><a href=\"index.php?q=mail&categ=mailTypology&sub=updateMailTypology&id=". $mailTypology['mail_typology_id'] ."\">Modifier</a>";
    
    

}?>
</table>
