<?php
require_once 'models/dolly/dollyRecord.class.php';

$dolly = new dollyRecord();
$dolly -> setDollyRecordId($_GET['id']);
$dolly -> setDollyRecordById();
echo $dolly -> getDollyRecordTitle();

?>
<b>Saisie un numéro et va en ligne</b><br/>
<form  method="POST" action="index.php?q=repository&categ=dolly&sub=saveRecords&id=<?= $_GET['id'] ?>">
    <textarea name="listRecords" rows="15" cols="30"></textarea>
    </br>
    <input type="submit" value="ajouter">
</form>