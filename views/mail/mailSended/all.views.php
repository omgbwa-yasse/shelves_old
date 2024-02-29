<?php
require_once 'models/mail/mailManager.class.php';

?>
  <a href="index.php?q=mail&categ=mailSend&sub=createMailSend">Envoyer un  Couriels </a>

<h1> Couriels Envoyers</h1>
<table width="800px">
    <tr>        
        <th>ID </th>
        <th>Date d'envoi</th>

        <th>Reference du mail</th>
        <th>Titre de l'organisation</th>
        <th>Status</th>
        <th colspan =3>Action</th>
    </tr>
<?php
$mailSend = new mailManager();
$allMailSends = $mailSend -> allMailSend();
foreach($allMailSends as $mailSend){
    echo "<tr>";
    echo "<td>". $mailSend['mail_send_id'];
    echo "<td>". $mailSend['mail_send_date'];

    echo "<td>". $mailSend['mail_reference'];
    echo "<td>". $mailSend['organization_title'];
    echo "<td>". $mailSend['status'];
   
    echo "<td><a href=\"index.php?q=mail&categ=mailSended&sub=delete&id=". $mailSend['mail_send_id'] ."\"><i class='fas fa-trash'></i></a>";
    echo "<td><a href=\"index.php?q=mail&categ=mailSended&sub=update&id=". $mailSend['mail_send_id'] ."\"><i class='fas fa-edit'></i></a>";
    
    

}?>
</table>
