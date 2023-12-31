<?php
require_once 'models/mail/process.class.php';

$process= new process();

if (isset($_POST['process_reference']) && isset($_POST['process_title']) ) {
 
    $process -> createProcess(NULL,$_POST['process_reference'],$_POST['process_title']);
}
?>
<h1>Creer une Affaire </h1>

<form  method="POST" action="index.php?q=mail&categ=process&sub=createprocess">
<table>
  <!-- <tr>
    <td><label for="process_id">process ID:</label></td>
    <td><input type="number" id="communicability_id" name="communicability_id"></td>
  </tr> -->
  <tr>
    <td><label for="process_reference">Reference de l'Affaire  :</label></td>
    <td><input type="text" id="process_reference" name="process_reference"></td>
  </tr>
  <tr>
    <td><label for="process_title">Titre de l'Affaire :</label></td>
    <td><input type="text" id="process_title" name="process_title"></td>
  </tr>

  <!-- <tr>
    <td><label for="process_date">Date de creation de l'Affaire</label></td>
    <td><input type="date" id="process_date" name="process_date"></td>
  </tr>
  -->


 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
