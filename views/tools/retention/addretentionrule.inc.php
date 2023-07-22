<?php
require_once 'models/tools/classification/classesManager.class.php';
require_once 'models/tools/classification/class.class.php';
$id = new activityClassesManager();
$ids = $id->allClasses();
require_once 'models/tools/retention/retention.class.php';
$retention = new Retention();
if (isset($_POST['retention_duration']) && isset($_POST['retention_sort']) && isset($_POST['retention_reference']) && isset($_POST['retention_sort_id'])) {
  $retention->addRetention();
}
?>
<h1>Add Retention</h1>
<form method="POST" action="index.php?q=tools&categ=retention&sub=add">
  <table>
    <tr>
      <td><label for="retention_duration">Retention Duration:</label></td>
      <td><input type="number" id="retention_duration" name="retention_duration"></td>
    </tr>
    <tr>
      <td><label for="retention_sort">Retention retentonsort:</label></td>
      <td><input type="text" id="retention_sort" name="retention_sort"></td>
    </tr>
    <tr>
      <td><label for="retention_reference">Retention Reference:</label></td>
      <td><textarea id="retention_reference" name="retention_reference"></textarea></td>
    </tr>
    <tr>
      <td><label for="retention_sort_id">Retention retentonsort ID:</label></td>
      <td><input type="number" id="retention_sort_id" name="retention_sort_id"></td>
    </tr>
    <tr>
      <td><input type="submit" value="Submit"></td>   
      <td><input type="reset" value="Cancel"></td>
    </tr> 
  </table>
</form>
