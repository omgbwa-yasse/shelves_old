<h1>Modifier une salle</h1>
<?php
require_once 'models/deposit/container.class.php';
require_once 'models/deposit/shelveManager.class.php';
require_once 'models/deposit/containerPropertyManager.class.php';
require_once 'models/setting/containerStatusManager.class.php';
$container = new container();
$container -> setContainerById($_GET['id']);
?>

<form action="index.php?q=deposit&categ=container&sub=save&id=<?= $container->getContainerId() ?>" method="POST">
<table class="table-input"> 
  <tr>
    <td><label for="reference">Référence du contenant :</label>
    <td><input type="text" id="reference" name="reference" value="<?= $container->getContainerReference();?>" required>
  </tr>
  <tr>
    <td><label for="shelve_id">Etagère :</label>
    <td>
      <select name="shelve_id">
        <?php 
        $shelvesid = new shelveManager();
        $shelvesid = $shelvesid ->allShelve();
        foreach($shelvesid as $id){
          echo "<option value=\"". $id['shelve_id']."\" ";
            if($id['shelve_id'] == $container->getShelveId() ){ echo "selected"; } 
          echo ">". $id['shelve_reference']  ." </option>";
        } ?>
      </select>
  </tr>
  <tr>
    <td><label for="state_id">Statut :</label>
    <td>
    <select name="state_id">
    <?php 
        $containerid = new containerStatusManager();
        $containerid = $containerid ->allContainerStatus();
        foreach($containerid as $id){
          echo "<option value=\"". $id['container_status_id']."\" ";
            if($id['container_status_id'] == $container->getContainerStatusId()){ echo "selected"; } 
          echo ">". $id['container_status_title']  ." </option>";
        } ?>
      </select>
  </tr>
  <tr>
    <td><label for="type_id">Type de contenant :</label>
    <td>
    <select name="property_id">
      <?php 
         $typeid = new containerPropertyManager();
         $typeid = $typeid ->allContainerProperty();
         foreach($typeid as $id){
           echo "<option value=\"". $id['container_property_id']."\"";
            if($id['container_property_id'] == $container->getContainerPropertyId()){ echo "selected"; }
           echo ">". $id['container_property_title']  ." </option>";
         } 
      ?>
      </select>
  </tr>
  
</table> 
  <input type="submit" value="Sauvegarder">
  <input type="reset" value="Annuler">
</form>


