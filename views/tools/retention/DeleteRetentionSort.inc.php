<?php
require_once 'models/tools/retention/retention_sort.class.php';
$retention_sort = new retention_sort();
$retention_sort->setretention_sortById($_GET['id']);
echo '<h1>You have successfully deleted this retention retentonsort:</h1>';
echo "<table border='0'>";
echo "<tr>";
echo "<td><b>Code:</b> " . $retention_sort->getretention_sortcode();
echo "<tr>";
echo "<td><b>Title:</b> " . $retention_sort->getretention_sortSort();
echo "<tr>";
echo "<td><b>Comment:</b> " . $retention_sort->getretention_sortcomment();
echo "<tr>";
echo "</table>";
$retention_sort->delretention_sort($retention_sort->getretention_sortId());
echo "<hr/>";
?>
<a href="index.php?q=tools&categ=retentonsort&sub="> <-  Retention Sorts</a>
