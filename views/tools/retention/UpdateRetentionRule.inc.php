<?php
require_once 'models/tools/retention/retention.class.php';
$retention = new Retention();
if (isset($_POST['retention_duration']) && isset($_POST['retention_sort']) && isset($_POST['retention_reference']) && isset($_POST['retention_sort_id'])) {
  $retention->updateRetention();
}
$retention->setRetentionById($_GET['id']);
?>
<h1>Update Retention</h1>
<form method="POST" action="index.php?q=tools&categ=retention&sub=update&id=<?= $retention->getRetentionId(); ?>">
  <table>
    <tr>
      <td><label for="retention_duration">Retention Duration:</label></td>
      <td><input type="number" id="retention_duration" name="retention_duration" value=<?= $retention->getRetentionDuration(); ?>></td>
    </tr>
    <tr>
      <td><label for="retention_sort">Retention Sort:</label></td>
      <td><input type="text" id="retention_sort" name="retention_sort" value=<?= $retention->getRetentionSort(); ?>></td>
    </tr>
    <tr>
      <td><label for="retention_reference">Retention Reference:</label></td>
      <td><textarea id="retention_reference" name="retention_reference"><?= $retention->getRetentionReference(); ?></textarea></td>
    </tr>
    <tr>
      <td><label for="retention_sort_id">Retention Sort ID:</label></td>
      <td><input type="number" id="retention_sort_id" name="retention_sort_id" value=<?= $retention->getRetentionSortId(); ?>></td>
    </tr>
    <tr>
      <td><input type="submit" value="Submit"></td>   
      <td><input type="reset" value="Cancel"></td>
    </tr> 
  </table>
</form>
