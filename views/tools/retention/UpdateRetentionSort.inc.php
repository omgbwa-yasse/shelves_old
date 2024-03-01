<?php
require_once 'models/tools/retention/retention_sort.class.php';
$retention_sort = new retention_sort();
if (isset($_POST['retention_sort_code']) && isset($_POST['retention_sort_title']) && isset($_POST['retention_sort_comment'])) {
  $retention_sort->updateretention_sort();
}
$retention_sort->setretention_sortById($_GET['id']);
?>
<h1>updaterententionsort Retention retentonsort</h1>
<form method="POST" action="index.php?q=tools&categ=retentonsort&sub=updaterententionsort&id=<?= $retention_sort->getretention_sortId(); ?>">
  <table>
    <tr>
      <td><label for="retention_sort_code"> Code de conservation:</label></td>
      <td><input type="text" id="retention_sort_code" name="retention_sort_code" value=<?= $retention_sort->getretention_sortcode(); ?>></td>
    </tr>
    <tr>
      <td><label for="retention_sort_title">Titre de Trie de conservation :</label></td>
      <td><input type="text" id="retention_sort_title" name="retention_sort_title" value=<?= $retention_sort->getretention_sortSort(); ?>></td>
    </tr>
    <tr>
      <td><label for="retention_sort_comment">Commentaire :</label></td>
      <td><textarea id="retention_sort_comment" name="retention_sort_comment"><?= $retention_sort->getretention_sortcomment(); ?></textarea></td>
    </tr>
    <tr>
      <td><input type="submit" value="Submit"></td>   
      <td><input type="reset" value="Cancel"></td>
    </tr> 
  </table>
</form>
