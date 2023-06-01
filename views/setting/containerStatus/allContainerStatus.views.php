<?php
require_once "models/setting/containerStatusManager.class.php";

?>
<h1>Tous les Statuts de contenants</h1>
<a href="index.php?q=setting&categ=containerStatus&sub=add">Ajouter un statut de contenant</a>

<table border="2" width="700px"> 
    <tr>
        <th>Titre
        <th>Observation
    </tr>
<?php

$allStatut = new containerStatusManager();
$allStatut = $allStatut ->allContainerStatus();
foreach($allStatut as $statut){
    echo "<tr><td><a href=\"index.php?q=setting&categ=containerStatus&sub=views&id=".$statut['container_status_id']."\">". $statut['container_status_title'];
    echo "<td>". $statut['container_status_title'] ."</tr>";
}
?>
</table>