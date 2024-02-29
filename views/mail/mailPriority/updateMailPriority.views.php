<?php
require_once 'models/mail/priority.class.php';
require_once 'models/mail/mailManager.class.php';

$prioritymanager= new mailManager();

if (isset($_POST['priority_reference'])) { 
    echo '<h1>UPDATED';
    $priorityo= new mailPriority();
    $priorityo -> updateMailpriority($_GET['id'],$_POST['mail_priority_title']);
   
}   
    $priority= $prioritymanager ->PriorityByid($_GET['id']) ;
    foreach ($priority as $priority) {
?>
<h1>Modifier  un Niveau de priorité </h1>

<form  method="POST" action="index.php?q=mail&categ=mailPriority&sub=update&id=<?=$_GET['id']?>">
<table>

   
  <tr>
    <td><label for="mail_priority_title">Intitulé du  Niveau de priorité  :</label></td>

    <td><input type="text" id="mail_priority_title" name="mail_priority_title" value="<?= htmlspecialchars($priority['mail_priority_title'], ENT_QUOTES); ?>" /></td>

  </tr>

 

 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
<?php
    }
    ?>