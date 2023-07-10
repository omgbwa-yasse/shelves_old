<?php
require_once 'models/tools/access_class/access_class.class.php';
require_once 'models/tools/classification/classesManager.class.php';
require_once 'models/tools/classification/class.class.php';

$id = new activityClassesManager();
$ids = $id ->allClasses();
$Accessclass = new AccessClasse();

if (isset($_POST['access_classe_code']) && isset($_POST['access_classe_description']) && isset($_POST['classification_id'])) {
 
$Accessclass->addAccessClasse();

}
?>
<h1>Ajouter une Classe d'access</h1>

<form  method="POST" action="index.php?q=tools&categ=accessRule&sub=addAccessclass">
<table>
  <tr>
    <td><label for="access_classe_code">Code d'access :</label></td>
    <td><input type="text" id="access_classe_code" name="access_classe_code"></td>
  </tr>
 
  <tr>
    <td><label for="access_classe_description">Description :</label></td>
    <td><textarea id="access_classe_description" name="access_classe_description"></textarea></td>
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
