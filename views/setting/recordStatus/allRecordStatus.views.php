<?php
require_once "models/setting/recordStatusManager.class.php";

?>
<h1>Tous les Statuts</h1>
<a href="index.php?q=setting&categ=recordStatus&sub=add">Ajouter un statut</a>

<table border="2" width="700px"> 
    <tr>
        <th>Titre
        <th>Observation
    </tr>
<?php

$allStatut = new recordStatusManager();
$allStatut = $allStatut ->allRecordStatus();
foreach($allStatut as $statut){
    echo "<tr><td><a href=\"index.php?q=setting&categ=recordStatus&sub=views&id=".$statut['record_status_id']."\">". $statut['record_status_title'];
    echo "<td>". $statut['record_status_observation'] ."</tr>";
}
?>
</table>