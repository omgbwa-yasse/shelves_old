<?php
require_once 'models/mail/mailManager.class.php';

?>

    <a class="btn" href="index.php?q=mail&categ=mail&sub=createMail"> Créer un Courrier </a>


<h1>Courriers</h1>
<table  width="800px">
    <tr>        
        <th>Référence</th>
        <th>Titre</th>
        <th>Date de création</th>
        <th>Priorité</th>
        <th>Typologie</th>

        <th colspan =3>Action</th>
    </tr>
<?php
$mail = new mailManager();
$allMails = $mail -> allMail();
foreach($allMails as $mail){
    echo "<tr>";
    echo "<td>". $mail['mail_reference'];
    echo "<td>". $mail['mail_title'];
    echo "<td>". $mail['mail_date_creation'];
    echo "<td>". $mail['mail_priority_title'];
    echo "<td>". $mail['mail_typology_title'];
    
  
   
    echo "<td><a href=\"index.php?q=mail&categ=mail&sub=view&id=". $mail['mail_id'] ."\"><i class='fas fa-eye'></i></a>";
    echo "<td><a href=\"index.php?q=mail&categ=mail&sub=deleteMail&id=". $mail['mail_id'] ."\"><i class='fas fa-edit'></i></a>";
    echo "<td><a href=\"index.php?q=mail&categ=mail&sub=updateMail&id=". $mail['mail_id'] ."\"><i class='fas fa-trash'></i></a>";
    
    

}?>
</table>
