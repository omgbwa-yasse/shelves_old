<?php
require_once "models/repository/recordsManager.class.php";
require_once "models/deposit/containerManager.class.php";
require_once "models/repository/record.class.php";
require_once "models/deposit/container.class.php";

function insertRecordInUnkownContainer($recordId){
$containerids = new containerManager();
$containerids = $containerids ->allContainer();
echo '<form method="POST" action="index.php?q=repository&categ=create&sub=saveRecordInContainer&recordId='.$recordId.'">
        <table class="formular">
            <tr><td> Contenant
                <td>
                <select name="containerId">';
                foreach($containerids as $id){
                    $container = new container();
                    $container ->setContainerById($id['container_id']);
                    echo '<option value="'. $container->getContainerId().'">'. $container->getContainerReference() .'</option>';
                }        
                echo '<select>
                </td>
            </tr>
        </table>
<input type="reset" name="Annuler"><input type="submit" name="Envoyer">
</form>';
}
function insertUnkownRecordInContainer($containerId){
    $list = new recordsManager();
    $list = $list -> recordsWithoutContainer();
    echo '<form method="POST" action="index.php?q=repository&categ=create&sub=saveRecordInContainer&containerId='.$containerId.'">
        <table class="formular">
            <tr><td> Record
                <td>
                <select name="recordId">';
                foreach($list as $id){
                    $record = new record();
                    $record ->hydrateRecordById($id['id']);
                    echo '<option value="'. $record->getRecordId().'">'. $record->getRecordNui() .' - '.$record->getRecordTitle() .'</option>';
                }        
                echo '<select>
                </td>
            </tr>
        </table>
<input type="reset" name="Annuler"><input type="submit" name="Envoyer">
</form>';
    
?>  
<?php
}

function insertUnknownRecordInUnkownContainer(){

$containerIds = new containerManager();
$containerIds = $containerIds ->allContainer();
$recordsId = new recordsManager();
$recordIds = $recordsId ->getAllrecordsIdWithoutContainer();
echo '<form method="POST" action="index.php?q=repository&categ=create&sub=saveRecordInContainer">
    <table class="formular">
    <tr><td>Enregistrement
        <td><select name="record_id">';
            foreach($recordIds as $id){
                echo $id['record_id'];
                $record = new record();
                $record ->setRecordId($id['record_id']);
                $record ->getRecordById();
                echo '<option value="'. $record->getRecordId().'">'. $record->getRecordNui() .' : '. $record->getRecordTitle() .'</option>';
            }        
            echo '<select>
        </td>
    </tr>
    <tr><td>Contenant
    <td><select name="container_id">';
        foreach($containerIds as $id){
            $container = new container();
            $container ->setContainerById($id['container_id']);
            echo '<option value="'. $container->getContainerId().'">'. $container->getContainerReference() .'</option>';
        }        
        echo '<select>
    </td>
    </tr>
    </table>
<input type="submit" value="Envoyer"><input type="reset" value="Annuler">
</form>';
?>
<?php
}
?>