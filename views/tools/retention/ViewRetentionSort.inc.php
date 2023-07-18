<?php
$id = $_GET['id'];
require_once 'models/tools/retention/retention_sort.class.php';
$retention_sort = new retention_sort();
$retention_sort->setretention_sortById($id);
?>
<h1><a href="index.php?q=tools&categ=retentionsort&sub=all"> <- All Retention Sorts</a></h1>
<?php
echo "<table border='0'>";
echo "<tr>";
echo "<td><b>Code:</b> " . $retention_sort->getretention_sortcode();
echo "<tr>";
echo "<td><b>Title:</b> " . $retention_sort->getretention_sortSort();
echo "<tr>";
echo "<td><b>Comment:</b> " . $retention_sort->getretention_sortcomment();
echo "<tr>";
echo "<td><b><a href=\"index.php?q=tools&categ=retentionsort&sub=delete&id=" . $retention_sort->getretention_sortId() . "\">Delete</a>";
echo "<td><b><a href=\"index.php?q=tools&categ=retentionsort&sub=update&id=" . $retention_sort->getretention_sortId() . "\">Update</a>";
echo "</table>";
?>
