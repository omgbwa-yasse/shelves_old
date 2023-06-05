
<h1>Tous les formats de contenants</h1>
<a href="index.php?q=deposit&categ=containerProperty&sub=add">Ajouter un format</a>
<table class="table-view">
<tr>
    <th>Titre </th>
    <th>longueur</th>
    <th>largeur</th>
    <th>Epaisseur</th>
</tr>
<?php
    require_once 'models/deposit/containerPropertyManager.class.php';
    $containerProperties = new containerPropertyManager();
    $containerProperties = $containerProperties ->allContainerProperty();
    foreach($containerProperties as $containerProperty){
    echo "<tr><td><a href=\"index.php?q=deposit&categ=containerProperty&sub=view&id=" . $containerProperty['container_property_id'];
    echo "\">" . $containerProperty['container_property_title'] ."</a>";
    echo "<td>" . $containerProperty['container_property_width'];
    echo "<td>" . $containerProperty['container_property_lengh'];
    echo "<td>" . $containerProperty['container_property_thinkness'];
    echo "</tr>";
    }
?>
</table>