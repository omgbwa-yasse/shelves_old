<?php
require_once 'models/mail/mailManager.class.php';

?>
<ul class="S_optionSousMenu">
    <li><a href="index.php?q=mail&categ=mailSend&sub=createMailSend"> Créer un Mail Send </a></li>
</ul>

<h1>Mail Sends</h1>
<table border="2" width="800px">
    <tr>        
        <th>ID </th>
        <th>Date d'envoi</th>
        <th>ID du type</th>
        <th>ID du mail</th>
        <th>ID de l'organisation</th>
        <th colspan =3>Action</th>
    </tr>
<?php
$mailSend = new mailManager();
$allMailSends = $mailSend -> allMailSend();
foreach($allMailSends as $mailSend){
    echo "<tr>";
    echo "<td>". $mailSend['mail_send_id'];
    echo "<td>". $mailSend['mail_send_date'];
    echo "<td>". $mailSend['type_id'];
    echo "<td>". $mailSend['mail_id'];
    echo "<td>". $mailSend['organization_id'];
   
   
    echo "<td><a href=\"index.php?q=mail&categ=mailSend&sub=deleteMailSend&id=". $mailSend['mail_send_id'] ."\">Supprimer</a>";
    echo "<td><a href=\"index.php?q=mail&categ=mailSend&sub=updateMailSend&id=". $mailSend['mail_send_id'] ."\">Modifier</a>";
    
    

}?>
</table>
