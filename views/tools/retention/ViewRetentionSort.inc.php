<?php
$id = $_GET['id'];
require_once 'models/tools/retention/retention_sort.class.php';
$retention_sort = new retention_sort();
$retention_sort->setretention_sortById($id);
?>
<h1><a href="index.php?q=tools&categ=retentonsort&sub="> <-  Retention Sorts</a></h1>
<?php
echo "<table border='0'>";
echo "<tr>";
echo "<td><b>Code de Trie de conservation parent :</b> " . $retention_sort->getretention_sortcode();
echo "<tr>";
echo "<td><b>Titre de Trie de conservation parent :</b> " . $retention_sort->getretention_sortSort();
echo "<tr>";
echo "<td><b>Commentaire:</b> " . $retention_sort->getretention_sortcomment();
echo "<tr>";
echo "<td><b><a href=\"index.php?q=tools&categ=retentonsort&sub=deleteretentionsort&id=" . $retention_sort->getretention_sortId() . "\">deleteretentionsort</a>";
echo "<td><b><a href=\"index.php?q=tools&categ=retentonsort&sub=updaterententionsort&id=" . $retention_sort->getretention_sortId() . "\">updaterententionsort</a>";
echo "</table>";
?>
