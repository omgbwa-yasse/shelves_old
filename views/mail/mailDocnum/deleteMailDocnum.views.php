<?php
require_once 'models/mail/mailManager.class.php';
require_once 'models/mail/mailDocNum.class.php';
$mailDocNumManager = new mailManager();
$mailDocNum = $mailDocNumManager ->mailDocNumByID($_GET['id']);
foreach ($mailDocNum as $mailDocNum) {

    echo '<h1>Vous avez supprimé ce  Couriels DocNum avec succès :</h1>';
    echo "<table border='0'>";
    echo "<tr>";   
    echo "<td><b> ID  :</b>".$mailDocNum['mail_docnum_id'];
    echo "<tr>";
    echo "<td><b> Chemin  :</b>".$mailDocNum['mail_docnum_path'];
    echo "<tr>";
    echo "<td><b> Nom de fichier  :</b>".$mailDocNum['mail_docnum_filename'];
    echo "<tr>";
    echo "</table>";
    $mailDocNumObj = new MailDocNum();
    $mailDocNumObj ->deleteMailDocNum($mailDocNum['mail_docnum_id']);


echo "<hr/>";

}

?>
<a href="index.php?q=mail&categ=mailDocNum&sub=allMailDocnum"> <- tous les  Couriels DocNums</a>
