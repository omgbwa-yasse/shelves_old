<?php
require_once 'models/mail/mailManager.class.php';

?>



<h1> Couriels Typologies</h1>
<a href="index.php?q=mail&categ=mailTypology&sub=create"> Créer un Typologie de Couriels </a>
<br>
<table border="2" width="800px">
    <tr>        
        <th>ID </th>
        <th>Titre</th>
        <th>Observation</th>
        <th colspan =2>Action</th>
    </tr>
<?php
$mailTypology = new mailManager();
$allMailTypologies = $mailTypology -> allMailTypology();
foreach($allMailTypologies as $mailTypology){
    echo "<tr>";
    echo "<td>". $mailTypology['mail_typology_id'];
    echo "<td>". $mailTypology['mail_typology_title'];
    echo "<td>". $mailTypology['mail_typology_observation'];
   
   
   
    echo "<td><a href=\"index.php?q=mail&categ=mailTypology&sub=delete&id=". $mailTypology['mail_typology_id'] ."\"><i class='fas fa-trash'></a>";
    echo "<td><a href=\"index.php?q=mail&categ=mailTypology&sub=update&id=". $mailTypology['mail_typology_id'] ."\"><i class='fas fa-edit'></a>";
    
    

}?>
</table>
