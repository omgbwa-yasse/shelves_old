<?php
require_once 'models/mail/process.class.php';
require_once 'models/mail/mailManager.class.php';

$processmanager= new mailManager();

if (isset($_POST['process_reference'])) { 
    echo '<h1>UPDATED';
    $processo= new process();
    $processo -> updateMailProcess($_GET['id'],$_POST['process_reference'],$_POST['process_title']);
   
}   
    $process= $processmanager ->processByID($_GET['id']) ;
    foreach ($process as $process) {
?>
<h1>Creer une Affaire </h1>

<form  method="POST" action="index.php?q=mail&categ=process&sub=updateprocess&id=<?=$_GET['id']?>">
<table>

   <tr>
    <td><label for="process_id">id  :</label></td>
    <td><input type="text" id="process_id" name="process_id" value="<?= htmlspecialchars($process['process_id'], ENT_QUOTES); ?>" disabled></td>
  </tr>
  <tr>
    <td><label for="process_reference">Reference de l'Affaire  :</label></td>
    <td><input type="text" id="process_reference" name="process_reference" value="<?= htmlspecialchars($process['process_reference'], ENT_QUOTES); ?>" ></td>
  </tr>
  <tr>
    <td><label for="process_title">Titre de l'Affaire :</label></td>

    <td><input type="text" id="process_title" name="process_title" value="<?= htmlspecialchars($process['process_title'], ENT_QUOTES); ?>" /></td>

  </tr>

 

 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
<?php
    }
    ?>