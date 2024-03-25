<?php
require_once "models/repository/recordsManager.class.php";
require_once "models/deposit/containerManager.class.php";
require_once "models/repository/record.class.php";
require_once "models/deposit/container.class.php";

function recordInContainer(){
    $containerids = new containerManager();
    $containerids = $containerids ->allContainer();
    echo '<form method="POST" action="index.php?q=repository&categ=create&sub=saveRecordInContainer">
        <table class="formular" border = "1">
            <tr>
                <td>Insérer la cote du dossier à inserer :
                <td><input type="text" name="nui"/>
            <tr/>
            <tr>
                <td>Choisir le numéro de contenant :</td>
                <td> <select name="container_id">';
                    foreach($containerids as $id){
                        $container = new container();
                        $container ->setContainerById($id['container_id']);
                        echo '<option value="'. $container->getContainerId().'">'. $container->getContainerReference() .'</option>';
                    } echo '<select>
                </td>
            </tr>
            </table>
    <input type="reset" name="Annuler"><input type="submit" name="Envoyer">
    </form>';
}

function addRecordInContainer($container_id){
    $containerids = new containerManager();
    $containerids = $containerids ->allContainer();
    echo '<form method="POST" action="index.php?q=repository&categ=create&sub=addRecordInContainer&container_id='. $container_id .'">
            <table class="formular" border = "1">
                <tr>
                    <td>Insérer la cote du dossier à inserer :
                    <td><input type="text" name="nui"/>
                <tr/>
            </table>
        <input type="reset" name="Annuler"><input type="submit" name="Envoyer">
        </form>';
}

?>