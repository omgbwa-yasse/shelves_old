<?php
require_once 'models/mail/mailManager.class.php';

?>

<h1><a href="index.php?q=mail&categ=mail&sub=allMail"> <- toute les courriels </a></h1>

<table border="2" width="800px">
   
<?php
$mail = new mailManager();
$allMails = $mail -> mailByID($_GET['id']);
foreach($allMails as $mail){
    echo "<tr>";
    echo "<th>ID </th>";
    echo "<td>". $mail['mail_id'];
    echo "<tr>";
    echo "<th>Références </th>";
    echo "<td>". $mail['mail_reference'];
    echo "<tr>";
    echo "<th>Titre </th>";
    echo "<td>". $mail['mail_title'];
    echo "<tr>";
    echo "<th>Observation </th>";
   
    echo "<td>". $mail['mail_observation'];
    echo "<tr>";
    echo "<th>Date de création </th>";

    echo "<td>". $mail['mail_date_creation'];
    echo "<tr>";
    echo "<th>Priorité </th>";
    echo "<td>". $mail['mail_priority_title'];
    echo "<tr>";
    echo "<th>docnum </th>";
    echo "<td>". $mail['mail_docnum_filename'];
    echo "<tr>";
    echo "<th>typologie </th>";
    echo "<td>". $mail['mail_typology_title'];
    echo "<tr>";
    echo "<th >Action</th>";
    
    echo "<td><a href=\"index.php?q=mail&categ=mail&sub=deleteMail&id=". $mail['mail_id'] ."\">Suprimer</a>";
    echo "<a href=\"index.php?q=mail&categ=mail&sub=updateMail&id=". $mail['mail_id'] ."\">Modifier</a>";
    
    
    


}?>
</table>
