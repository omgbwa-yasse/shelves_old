<?php
require_once 'models/mail/mailManager.class.php';

?>
<ul class="S_optionSousMenu">
    <li><a href="index.php?q=mail&categ=mailDocNum&sub=createMailDocNum"> Créer un  Couriels DocNum </a></li>
</ul>

<h1> Couriels DocNums</h1>
<table border="2" width="800px">
    <tr>        
        <th>ID </th>
        <th>Chemin</th>
        <th>Nom de fichier</th>
        <th colspan =3>Action</th>
    </tr>
<?php
$mailDocNum = new mailManager();
$allMailDocNums = $mailDocNum -> allDocnum();
foreach($allMailDocNums as $mailDocNum){
    echo "<tr>";
    echo "<td>". $mailDocNum['mail_docnum_id'];
    echo "<td>". $mailDocNum['mail_docnum_path'];
    echo "<td>". $mailDocNum['mail_docnum_filename'];
   
   
    echo "<td><a href=\"index.php?q=mail&categ=mailDocNum&sub=deleteMailDocNum&id=". $mailDocNum['mail_docnum_id'] ."\">Supprimer</a>";
    echo "<td><a href=\"index.php?q=mail&categ=mailDocNum&sub=updateMailDocNum&id=". $mailDocNum['mail_docnum_id'] ."\">Modifier</a>";
    
    

}?>
</table>
