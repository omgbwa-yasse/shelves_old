<?php
require_once 'models/tools/retention/retention.class.php';
require_once 'models/tools/retention/retention_sort.class.php';
$id = new retention_sort();
$ids = $id ->allretention_sorts();

$retention = new retention();
if (isset($_POST['retention_sort_code']) && isset($_POST['retention_sort_title']) && isset($_POST['retention_sort_comment']) ) {
 
$comrule->addcomrule();

}
?>
<h1>Ajouter une regle de communicabilite</h1>

<form  method="POST" action="index.php?q=tools&categ=communicability&sub=addrule">
<table>
  <tr>
    <td><label for="communicability_id">Communicability ID:</label></td>
    <td><input type="number" id="communicability_id" name="communicability_id"></td>
  </tr>
  <tr>
    <td><label for="communicability_time">Communicability Time:</label></td>
    <td><input type="number" id="communicability_time" name="communicability_time"></td>
  </tr>
  <tr>
    <td><label for="communicability_title">Communicability Title:</label></td>
    <td><input type="text" id="communicability_title" name="communicability_title"></td>
  </tr>
  <tr>
    <td><label for="communicability_reference">Communicability Reference:</label></td>
    <td><textarea id="communicability_reference" name="communicability_reference"></textarea></td>
  </tr>
  <tr>
    <td><label for="classification_id">Classification ID:</label></td>
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
