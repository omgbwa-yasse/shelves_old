<?php
require_once "models/setting/recordSupportManager.class.php";
?>

<h1>Tous les Supports</h1>
<a href="index.php?q=setting&categ=recordSupport&sub=add">Ajouter un support</a>

<table border="2" width="700px"> 
    <tr>
        <th>Titre
        <th>Observation
    </tr>
<?php
$allSupport = new recordSupportManager();
$allSupport = $allSupport -> allRecordSupport();
foreach($allSupport as $support){
    echo "<td><a href=\"index.php?q=setting&categ=recordSupport&sub=views&id=".$support['record_support_id'] ."\">";
    echo $support['record_support_title'] . "</a>";
    echo "<td>".$support['record_support_observation'];
    echo "</tr>";
}
?>
</table>