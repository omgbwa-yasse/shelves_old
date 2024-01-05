<?php
require_once 'models/mail/mailManager.class.php';

?>
<ul class="S_optionSousMenu">
    <li><a href="index.php?q=mail&categ=mailContainer&sub=createMailContainer"> Créer un Mail Container </a></li>
</ul>

<h1>Mail Containers</h1>
<table border="2" width="800px">
    <tr>        
        <th>références </th>
        <th>titre</th>
        <th>Type ID</th>
        <th colspan =3>action</th>
    </tr>
<?php
$mailContainer = new mailManager();
$allMailContainers = $mailContainer -> allMailContainer();
foreach($allMailContainers as $mailContainer){
    echo "<tr>";
    echo "<td>". $mailContainer['mail_container_reference'];
    echo "<td>". $mailContainer['mail_container_title'];
    echo "<td>". $mailContainer['mail_container_type_id'];
   
   
    echo "<td><a href=\"index.php?q=mail&categ=mailContainer&sub=deleteMailContainer&id=". $mailContainer['mail_container_id'] ."\">Supprimer</a>";
    echo "<td><a href=\"index.php?q=mail&categ=mailContainer&sub=updateMailContainer&id=". $mailContainer['mail_container_id'] ."\">Modifier</a>";
    
    

}?>
</table>
