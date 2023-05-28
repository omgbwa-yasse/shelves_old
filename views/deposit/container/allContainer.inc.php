
<h1>Toutes les contenants </h1>
<a href="index.php?q=deposit&categ=container&sub=add">Ajouter une salle</a>
<table class="table-view">
<tr>
    <th>Référence </th>
    <th>Référence du contenant</th>
</tr>
<?php
    require_once 'models/deposit/containerManager.class.php';
    $containers = new containerManager();
    $container = $containers  ->allContainer();
    foreach($container as $id){
    echo "<tr><td><a href=\"index.php?q=deposit&categ=room&sub=view&id=" . $id['container_id'];
    echo "\">" . $id['container_reference'];
    echo "</a><td>" . $id['title'];
    echo "</tr>";
    }
?>
</table>