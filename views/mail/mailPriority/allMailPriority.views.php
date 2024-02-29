
<?php
require_once 'models/mail/mailManager.class.php';

?>


<h1>Niveau de priorité</h1>
<a href="index.php?q=mail&categ=mailPriority&sub=create"> Creer un niveau de priorité</a>
<br>
<table border="2" width="800px">


    <tr>        
        <th>#</th>
        <th>title</th>
        <th colspan =3>action</th>
    </tr>
<?php
$priority = new mailManager();
$allmailPriority = $priority -> allMailPriority();
foreach($allmailPriority as $priority){
    echo "<tr>";
    echo "<td>". $priority['mail_priority_id'];
    echo "<td>". $priority['mail_priority_title'];
   
    echo "<td><a href=\"index.php?q=mail&categ=mailPriority&sub=update&id=". $priority['mail_priority_id'] ."\"><i class='fas fa-edit'></a>";
   
    echo "<td><a href=\"index.php?q=mail&categ=mailPriority&sub=delete&id=". $priority['mail_priority_id'] ."\"><i class='fas fa-trash'></a>";
    
    

}?>
</table>