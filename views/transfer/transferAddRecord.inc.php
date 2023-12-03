
<h1>Ajouter un enregistrement ...</h1>
<form method="POST" action="index.php?q=repository&categ=create&sub=saveRecord&id=<?= $_GET['id']?>">
    <?php
        include 'views/transfer/TransferRecordForm.inc.php';
    ?>
</form>