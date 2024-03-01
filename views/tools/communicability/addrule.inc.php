<?php
require_once 'models/tools/classification/classesManager.class.php';
require_once 'models/tools/classification/class.class.php';
$id = new activityClassesManager();
$ids = $id ->allClasses();
require_once 'models/tools/commuicability/comrule.class.php';
$comrule = new comrule();
if (isset($_POST['communicability_time']) && isset($_POST['communicability_title']) && isset($_POST['communicability_reference']) && isset($_POST['classification_id'])) {
 
$comrule->addcomrule();

}
?>
<h1>Ajouter une regle de communicabilite</h1>

<form  method="POST" action="index.php?q=tools&categ=communicability&sub=addrule">
<table>
  <tr>
    <td><label for="communicability_id">ID:</label></td>
    <td><input type="number" id="communicability_id" name="communicability_id"></td>
  </tr>
  <tr>
    <td><label for="communicability_time">Duree de communicabilite:</label></td>
    <td><input type="number" id="communicability_time" name="communicability_time"></td>
  </tr>
  <tr>
    <td><label for="communicability_title">titre de communicabilite:</label></td>
    <td><input type="text" id="communicability_title" name="communicability_title"></td>
  </tr>
  <tr>
    <td><label for="communicability_reference">Reference de communicabilite:</label></td>
    <td><textarea id="communicability_reference" name="communicability_reference"></textarea></td>
  </tr>
  <tr>
    <td><label for="classification_id">Classification Associer:</label></td>
    <td> <select name="classification_id">
      <?php
          foreach($ids as $id){
              $class = new activityClass();
              $class -> setClassById($id['id']);
              echo "<option value=\"".$class ->getClassId()."\">";
              echo $class->getClassCode() ." - ". $class->getClassTitle() ."</option>";
          }
      ?>
                </select></td>
  </tr>

 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
