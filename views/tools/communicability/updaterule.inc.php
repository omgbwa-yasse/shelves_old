<?php
require_once 'models/tools/classification/classesManager.class.php';
require_once 'models/tools/classification/class.class.php';

$id = new activityClassesManager();
$ids = $id ->allClasses();
require_once 'models/tools/commuicability/comrule.class.php';
$comrule = new comrule();
if (isset($_POST['communicability_time']) && isset($_POST['communicability_title']) && isset($_POST['communicability_reference']) && isset($_POST['classification_id'])) {
 
$comrule->updatecomrule();

}

$comrule ->setcomrulebyid($_GET['id']);
?>
<h1>Modifier une regle de communicabilite</h1>

<form  method="POST" action="index.php?q=tools&categ=communicability&sub=updaterule&id=<?=$comrule ->getcomrule_id();?>">
<table>
<tr>
    <td><label for="communicability_id">Communicability ID:</label></td>
    <td><input type="number" id="communicability_id" name="communicability_id"  value= <?=$comrule ->getcomrule_id();?>  readonly></td>
  </tr>
  <tr>
    <td><label for="communicability_time">Duree de communicabilite:</label></td>
    <td><input type="number" id="communicability_time" name="communicability_time" value= <?=$comrule ->getcomrule_time();?> ></td>
  </tr>
  <tr>
    <td><label for="communicability_title">titre de communicabilite:</label></td>
    <td><input type="text" id="communicability_title" name="communicability_title" value= <?=$comrule ->getcomrule_title();?> ></td>
  </tr>
  <tr>
    <td><label for="communicability_reference">Reference de communicabilite:</label></td>
    <td><textarea id="communicability_reference" name="communicability_reference" ><?=$comrule ->getcomrule_ref();?></textarea></td>
  </tr>
  <tr>
    <td><label for="classification_id">Classification associer:</label></td>
    <td> <select name="classification_id" value= <?=$comrule ->getcomrule_class_id();?>>
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
