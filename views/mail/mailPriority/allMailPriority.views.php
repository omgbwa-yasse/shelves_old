
<?php
require_once 'models/mail/mailManager.class.php';

?>
<ul class="S_optionSousMenu">
    <li><a href="index.php?q=mail&categ=mailPriority&sub=createPriority"> Creer un niveau de priorité </a></li>
</ul>

<h1>niveau de priorité</h1>
<a href="index.php?q=mail&categ=mailPriority&sub=createPriority">Creer un niveau de priorité</a>
<table border="2" width="800px">


    <tr>        
        <th>#</th>
        <th>title</th>
        <th colspan =3>action</th>
    </tr>
<?php
$priority = new mailManager();
$allmailPriority = $priority -> allMailPriority();
foreach($allProcess as $priority){
    echo "<tr>";
    echo "<td>". $priority['mail_priority_id'];
    echo "<td>". $priority['mail_priority_title'];
   
   
    echo "<td><a href=\"c&id=". $priority['mail_priority_id'] ."\">Supprimmer</a>";
    echo "<td><a href=\"index.php?q=mail&categ=mailPriority&sub=updatePriority&id=". $priority['mail_priority_id'] ."\">Modifier</a>";
    
    

}?>
</table>