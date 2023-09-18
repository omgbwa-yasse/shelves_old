<?php
require_once 'models/repository/recordsManager.class.php';
require_once 'models/repository/record.class.php';
require_once 'models/tools/organization/organizationManager.class.php';
require_once 'models/tools/organization/organization.class.php';
require_once 'models/tools/classification/classesManager.class.php';
require_once 'models/setting/recordSupportManager.class.php';
require_once 'models/setting/recordStatusManager.class.php';   

$records = new recordsManager();
$sqlLastNui = $records -> getLastNui();
$descriptionLevels = $records -> getAllDesciptionLevels();

$classes = new activityClassesManager();
$classes = $classes -> allClasses();

$statuts = new recordStatusManager();
$statuts  = $statuts -> allRecordStatus();

$supports = new recordSupportManager();
$supports = $supports -> allRecordSupport();

$organisations = new organizationManager();
$organisations = $organisations -> getAllOrganization();

echo "Mise à jour de ".$_GET['id'];
$record = new record();
$record->hydrateRecordById($_GET['id']);
echo $record->getRecordTitle();


?>

<table class="formular">
<tr>
<td class="titre"> Niveau description </td><td>
<select name="level_id">
<?php if(isset($descriptionLevels)){
    foreach($descriptionLevels as $descriptionLevel){
        echo "<option value=\"".$descriptionLevel['id'] ."\"";
        if($descriptionLevel['id'] == $record->getRecordLevelId()){ echo "selected"; }
        echo ">". $descriptionLevel['title'] ."</option>"; 
    }
} 
?>
    
</td> </tr>
<tr> <td class="titre"> N° inventaire </td>  <td> <input type="text" name="nui" size="30" value="<?=$record->getRecordNui();?>"></td> </tr>
<tr> <td class="titre"> Intitulé / analyse </td>  <td> <input type="text" name="title" size="70" value="<?=$record->getRecordTitle();?>"></td> </tr>
<tr> <td class="titre"> Dates extrêmes</td>  <td><input type="text" name="date_start" id="date" value="<?=$record->getRecordDateStart();?>"> au <input type="text" name="date_end" id="date" placeholder="<?= $record->getRecordDateEnd();?>"> </td></tr>
<tr> <td class="titre"> Observation</td>  <td><input type="text-area" name="observation" width="70" value="<?= $record->getRecordObservation();?>"> </td></tr>

<tr><td class="titre"> Classe</td><td>
<select name="classification_id">
<?php if(isset($classes)){
    foreach($classes as $class){
        if($class['id'] == $record->getRecordClasseId()){
            echo "<option value=\"".$class['id']."\" selected>".$class['code']." - ".$class['title'] ."</option>"; 
        }else{
            echo "<option value=\"".$class['id']."\">".$class['code']." - ".$class['title'] ."</option>"; 
        }
        
    }
} ?>
</select>
</td></tr>

<tr><td class="titre">Détenteur : </td><td>
<select name="organization_title">
<?php if(isset($organizations)){
        foreach($organizations as $organization){
            if($organization["id"] == $record->getOrganizationId()){
                echo "<option value=\"". $organization["id"] ."\" selected>". $organization["title"] .'</option>'; 
            }else{
                echo "<option value=\"". $organization["id"] ."\">". $organization["title"] .'</option>'; 
            }
        }
} ?>
</select>
</td></tr>
<tr><td class="titre">Statut</td><td>
<select name="statut">
<?php if(isset($status)){
    foreach($status as $statut){
        if ($statut['statut'] == $record->getRecordStatusId()){
            echo "<option value=\"". $statut['id'] ."\" \"selected\">". $statut['title']."</option>";
        } else{
            echo "<option value=\"". $statut['id'] ."\">". $statut['title']."</option>";
        }  }} 
?>
</select>
</td></tr>
<tr> <td class="titre"> Support</td><td> 
<select name="support">
<?php if(isset($supports)){
    foreach($supports as $support){
        if ($support['id'] == $record->getRecordSupportId()){
            echo "<option value=\"". $support['id'] ."\" \"selected\">". $support['title']."</option>";
        } else{
            echo "<option value=\"". $support['id'] ."\">". $support['title']."</option>";
        }
    }
} ?>
</select>
</td></tr>
<tr> <td class="titre"> Mots-cléfs (<b style="color:red;">;</b>): </td> <td> <input type="text" name="keywords" size="70" value="Les mots clés"> </td>  </tr>
<tr> <td> <input type="submit" size="30"> </td>  <td> <input type="reset" size="30"></td></tr>
</table>

