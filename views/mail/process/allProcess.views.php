
<?php
require_once 'models/mail/mailManager.class.php';

?>
<ul class="S_optionSousMenu">
    <li><a href="index.php?q=mail&categ=process&sub=createprocess"> Creer un affaire  </a></li>
</ul>

<h1>affaire</h1>
<table border="2" width="800px">
    <tr>        
        <th>references </th>
        <th>title</th>
        <th>Date de creation</th>
        <th colspan =3>action</th>
    </tr>
<?php
$process = new mailManager();
$allProcess = $process -> allProcess();
foreach($allProcess as $process){
    echo "<tr>";
    echo "<td>". $process['process_reference'];
    echo "<td>". $process['process_title'];
    echo "<td>". $process['process_date'];
   
   
    echo "<td><a href=\"index.php?q=mail&categ=process&sub=deleteprocess&id=". $process['process_id'] ."\">Supprimmer</a>";
    echo "<td><a href=\"index.php?q=mail&categ=process&sub=updateprocess&id=". $process['process_id'] ."\">Modifier</a>";
    
    

}?>
</table>