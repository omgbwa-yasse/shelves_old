<?php
require_once 'models/mail/mail.class.php';
require_once 'models/mail/mailManager.class.php';

$mail= new mail();
$mailManager= new mailManager();

if (isset($_POST['mail_reference']) && isset($_POST['mail_title']) && isset($_POST['mail_observation']) && isset($_POST['mail_date_creation']) && isset($_POST['mail_basket_id']) && isset($_POST['mail_priority_id']) && isset($_POST['mail_docnum_id']) && isset($_POST['process_id']) && isset($_POST['mail_typology_id'])) {
 
$mail->createMail('',$_POST['mail_reference'],$_POST['mail_title'],$_POST['mail_observation'],$_POST['mail_date_creation'],$_POST['mail_basket_id'],$_POST['mail_priority_id'],$_POST['mail_docnum_id'],$_POST['process_id'],$_POST['mail_typology_id']);

}
?>
<h1>Ajouter une regle de communicabilite</h1>

<form  method="POST" action="index.php?q=mail&categ=mail&sub=createMail">
<table>
  <!-- <tr>
    <td><label for="mail_id">mail ID:</label></td>
    <td><input type="number" id="communicability_id" name="communicability_id"></td>
  </tr> -->
  <tr>
    <td><label for="mail_reference">Reference du Courrier  :</label></td>
    <td><input type="text" id="mail_reference" name="mail_reference"></td>
  </tr>
  <tr>
    <td><label for="mail_title">Titre du Courriel :</label></td>
    <td><input type="text" id="mail_title" name="mail_title"></td>
  </tr>
  <tr>
    <td><label for="mail_observation">Observation du Courriel:</label></td>
    <td><textarea id="mail_observation" name="mail_observation"></textarea></td>
  </tr>
  <tr>
    <td><label for="mail_date_creation">Date de creation du Courriel</label></td>
    <td><input type="date" id="mail_date_creation" name="mail_date_creation"></td>
  </tr>
  <tr>
    <td><label for="mail_basket_id">Panier du mail :</label></td>
    <td> <select name="mail_basket_id">
<?php
    $allmailBasket=$mailManager->allMailBasket();
    foreach($allmailBasket as $basket){
       
        echo "<option value=\"".$basket['mail_basket_id']."\">";
        echo $basket['mail_basket_title'] ."</option>";
    }
 ?>
                </select></td>
  </tr>
  <tr>
    <td><label for="mail_priority_id">Niveau de Priorité :</label></td>
    <td> <select name="mail_priority_id">
<?php
    $allmailPriority=$mailManager->allMailPriority();
    foreach($allmailPriority as $priority){
       
        echo "<option value=\"".$priority['mail_priority_id']."\">";
        echo $priority['mail_priority_title'] ."</option>";
    }
 ?>
                </select></td>
  </tr>
  <tr>
    <td><label for="mail_docnum_id">Docnum du Couriel:</label></td>
    <td> <select name="mail_docnum_id">
<?php
     $allMailDocnum=$mailManager->allDocnum();
     foreach($allMailDocnum as $docnum){
        
         echo "<option value=\"".$docnum['mail_docnum_id']."\">";
         echo $docnum['mail_docnum_title'] ."</option>";
     }
 ?>
                </select></td>
  </tr>
  <tr>
    <td><label for="process_id">Affaire:</label></td>
    <td> <select name="process_id">
<?php
     $allProcess=$mailManager->allProcess();
     foreach($allProcess as $process){
         echo "<option value=\"".$process['process_id']."\">";
         echo $process['process_title'] ."</option>";
     }
 ?>
                </select></td>
  </tr>
  <tr>
    <td><label for="mail_typology_id">Typologie du Couriel :</label></td>
    <td> <select name="mail_typology_id">
<?php
       $allMailTypology=$mailManager->allProcess();
       foreach($allMailTypology as $typology){
           echo "<option value=\"".$typology['mail_typology_id']."\">";
           echo $typology['mail_typology_title'] ."</option>";
       }
 ?>
                </select></td>
  </tr>


 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
