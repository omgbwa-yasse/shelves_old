<?php
require_once 'models/tools/retention/retention_sort.class.php';
$retention_sorts = new retention_sort();
$allRetentionSorts = $retention_sorts->allretention_sorts();
?>
<h1>Retention Sorts</h1>
<table border="2" width="800px">
  <tr>
    <th>Code</th>
    <th>titre</th>
    <th>Commentaire</th>
    <th colspan=3>Action</th>
  </tr>
  <?php
  foreach ($allRetentionSorts as $rule) {
    $retention_sort = new retention_sort();
    $retention_sort->setretention_sortById($rule['retention_sort_id']);
    echo "<tr>";
    echo "<td>" . $retention_sort->getretention_sortcode();
    echo "<td>" . $retention_sort->getretention_sortSort();
    echo "<td>" . $retention_sort->getretention_sortcomment();
    echo "<td><a href=\"index.php?q=tools&categ=retentonsort&sub=viewretentionsort&id=" . $retention_sort->getretention_sortId() . "\">viewretentionsort</a>";
    echo "<td><a href=\"index.php?q=tools&categ=retentonsort&sub=deleteretentionsort&id=" . $retention_sort->getretention_sortId() . "\">deleteretentionsort</a>";
    echo "<td><a href=\"index.php?q=tools&categ=retentonsort&sub=updaterententionsort&id=" . $retention_sort->getretention_sortId() . "\">updaterententionsort</a>";
  } ?>
</table>
