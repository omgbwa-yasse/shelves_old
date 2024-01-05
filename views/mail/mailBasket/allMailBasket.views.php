<?php
require_once 'models/mail/mailManager.class.php';

?>
<ul class="S_optionSousMenu">
    <li><a href="index.php?q=mail&categ=mailReceived&sub=createMailReceived"> Créer un Courriel Reçu </a></li>
</ul>

<h1>Courriels Reçus</h1>
<table border="2" width="800px">
    <tr>        
        <th>ID </th>
        <th>Date de réception</th>
        <th>ID du type</th>
        <th>ID du mail</th>
        <th>ID de l'organisation</th>
        <th colspan =3>Action</th>
    </tr>
<?php
$mailReceived = new mailManager();
$allMailReceiveds = $mailReceived -> allMailReceived();
foreach($allMailReceiveds as $mailReceived){
    echo "<tr>";
    echo "<td>". $mailReceived['mail_received_id'];
    echo "<td>". $mailReceived['mail_received_date'];
    echo "<td>". $mailReceived['type_id'];
    echo "<td>". $mailReceived['mail_id'];
    echo "<td>". $mailReceived['organization_id'];
   
   
    echo "<td><a href=\"index.php?q=mail&categ=mailReceived&sub=deleteMailReceived&id=". $mailReceived['mail_received_id'] ."\">Supprimer</a>";
    echo "<td><a href=\"index.php?q=mail&categ=mailReceived&sub=updateMailReceived&id=". $mailReceived['mail_received_id'] ."\">Modifier</a>";
    
    

}?>
</table>
