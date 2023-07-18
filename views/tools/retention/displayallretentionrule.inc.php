<?php
require_once 'models/tools/retention/retention.class.php';
$retentions = new Retention();
$allRetentions = $retentions->allRetentions();
?>
<h1>Retentions</h1>
<table border="2" width="800px">
  <tr>
    <th>Duration</th>
    <th>Sort</th>
    <th>Reference</th>
    <th>Sort ID</th>
    <th colspan=3>Action</th>
  </tr>
  <?php
  foreach ($allRetentions as $rule) {
    $retention = new Retention();
    $retention->setRetentionById($rule['retention_id']);
    echo "<tr>";
    echo "<td>" . $retention->getRetentionDuration();
    echo "<td>" . $retention->getRetentionSort();
    echo "<td>" . $retention->getRetentionReference();
    echo "<td>" . $retention->getRetentionSortId();
    echo "<td><a href=\"index.php?q=tools&categ=retention&sub=view&id=" . $retention->getRetentionId() . "\">View</a>";
    echo "<td><a href=\"index.php?q=tools&categ=retention&sub=delete&id=" . $retention->getRetentionId() . "\">Delete</a>";
    echo "<td><a href=\"index.php?q=tools&categ=retention&sub=update&id=" . $retention->getRetentionId() . "\">Update</a>";
  } ?>
</table>
