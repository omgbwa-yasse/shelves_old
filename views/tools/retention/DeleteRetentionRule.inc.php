<?php
require_once 'models/tools/retention/retention.class.php';
$retention = new Retention();
$retention->setRetentionById($_GET['id']);
echo '<h1>You have successfully deleted this retention:</h1>';
echo "<table border='0'>";
echo "<tr>";
echo "<td><b>Duree de conservation::</b> " . $retention->getRetentionDuration();
echo "<tr>";
echo "<td><b>Trie de conservation:</b> " . $retention->getRetentionSort();
echo "<tr>";
echo "<td><b>Reference de conservation :</b> " . $retention->getRetentionReference();
echo "<tr>";
echo "<td><b>Trie de conservation parent :</b> " . $retention->getRetentionSortId();
echo "<tr>";
echo "</table>";
$retention->delRetention($retention->getRetentionId());
echo "<hr/>";
?>
<a href="index.php?q=tools&categ=retention&sub=all"> <- All Retentions</a>
