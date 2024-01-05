<?php
require_once 'models/mail/mailManager.class.php';

?>
<ul class="S_optionSousMenu">
    <li><a href="index.php?q=mail&categ=mail&sub=createMail"> Créer un Courrier </a></li>
</ul>

<h1>Courriers</h1>
<table border="2" width="800px">
    <tr>        
        <th>ID </th>
        <th>Référence</th>
        <th>Titre</th>
        <th>Observation</th>
        <th>Date de création</th>
        <th>ID du panier</th>
        <th>ID de la priorité</th>
        <th>ID du docnum</th>
        <th>ID de la typologie</th>
        <th>ID du processus</th>
        <th colspan =3>Action</th>
    </tr>
<?php
$mail = new mailManager();
$allMails = $mail -> allMail();
foreach($allMails as $mail){
    echo "<tr>";
    echo "<td>". $mail['mail_id'];
    echo "<td>". $mail['mail_reference'];
    echo "<td>". $mail['mail_title'];
    echo "<td>". $mail['mail_observation'];
    echo "<td>". $mail['mail_date_creation'];
    echo "<td>". $mail['mail_basket_id'];
    echo "<td>". $mail['mail_priority_id'];
    echo "<td>". $mail['docnum_id'];
    echo "<td>". $mail['mail_typology_id'];
    echo "<td>". $mail['mail_process_id'];
   
   
    echo "<td><a href=\"index.php?q=mail&categ=mail&sub=deleteMail&id=". $mail['mail_id'] ."\">Supprimer</a>";
    echo "<td><a href=\"index.php?q=mail&categ=mail&sub=updateMail&id=". $mail['mail_id'] ."\">Modifier</a>";
    
    

}?>
</table>
