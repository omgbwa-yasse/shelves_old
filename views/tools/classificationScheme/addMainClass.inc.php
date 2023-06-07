<?php
require_once 'models/tools/classification/classesManager.class.php';
require_once 'models/tools/classification/class.class.php';
$id = new activityClassesManager();
$ids = $id ->allClasses();
?>
<h1>Ajouter une classe</h1>
<form method="POST" action="index.php?q=tools&categ=classificationScheme&sub=saveClass">
    <table style="margin:5px;">
        <tr>
            <td>Code de la classe : </td>
            <td><input type="text" name="code"></td>
        </tr>
        <tr>
            <td>Titre de classe :</td>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <td>Observation : </td>
            <td><input type="textarea" name="observation"></td>
        </tr>
        <tr>
            <td> <input type="submit" value="Enregister"></td>
            <td><input type="reset" value="Annuler"></td>
        </tr>
    </table>

</form>