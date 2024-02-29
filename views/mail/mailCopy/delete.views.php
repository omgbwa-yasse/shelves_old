<?php
require_once 'models/mail/copyType.class.php';


$copyType = new CopyType();
$copyType->delete($_GET['id']);

echo '<h1>Vous avez supprimé ce Type de Copie avec succès :</h1>';
?>

<a href="index.php?q=mail&categ=mailCopy&sub=all"> <- tous les Types de Copies</a>
