<?php
require_once 'models/mail/copyType.class.php';

$copyType = new CopyType();
$copyTypes = $copyType->all();
?>

<h1> Types de Copies</h1>
<a href="index.php?q=mail&categ=mailCopy&sub=create"> Créer un Type de Copie </a>
<br>
<table border="2" width="800px">
    <tr>        
        <th>ID </th>
        <th>Titre</th>
        <th colspan =2>Action</th>
    </tr>
<?php
foreach($copyTypes as $copyType){
    echo "<tr>";
    echo "<td>". $copyType['copy_type_id'];
    echo "<td>". $copyType['copy_type_title'];
    echo "<td><a href=\"index.php?q=mail&categ=mailCopy&sub=delete&id=". $copyType['copy_type_id'] ."\"><i class='fas fa-trash'></a>";
    echo "<td><a href=\"index.php?q=mail&categ=mailCopy&sub=update&id=". $copyType['copy_type_id'] ."\"><i class='fas fa-edit'></a>";
}
?>
</table>
