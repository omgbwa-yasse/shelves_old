<?php
$id = $_GET['id'];
require_once 'models/tools/retention/retention.class.php';
$retention = new Retention();
$retention->setRetentionById($id);
?>
<h1><a href="index.php?q=tools&categ=retention&sub=all"> <- All Retentions</a></h1>
<?php
echo "<table border='0'>";
echo "<tr>";
echo "<td><b>Duration:</b> " . $retention->getRetentionDuration();
echo "<tr>";
echo "<td><b>Sort:</b> " . $retention->getRetentionSort();
echo "<tr>";
echo "<td><b>Reference:</b> " . $retention->getRetentionReference();
echo "<tr>";
echo "<td><b>Sort ID:</b> " . $retention->getRetentionSortId();
echo "<tr>";
echo "<td><b><a href=\"index.php?q=tools&categ=retention&sub=delete&id=" . $retention->getRetentionId() . "\">Delete</a>";
echo "<td><b><a href=\"index.php?q=tools&categ=retention&sub=update&id=" . $retention->getRetentionId() . "\">Update</a>";
echo "</table>";
?>
