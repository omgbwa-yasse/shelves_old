<?php
require_once 'models/repository/recordsManager.class.php';
require_once 'models/deposit/container.class.php';
require_once 'models/deposit/containerProperty.class.php';
require_once 'models/setting/containerStatus.class.php';

$property = new containerProperty();
$status = new containerStatus();
$container = new container();

$container -> setContainerById($_GET['id']);
?>
<h1> Contenant n° <?= $container->getContainerReference()?></h1>
<table class="table-view">
   <tr>
      <th>Référence</th>
      <th>propriété</th>
      <th>status</th>
   </tr>
   <tr>
      <?php
         echo " <td>" . $container->getContainerReference();
         $status -> setContainerStatusById($container->getContainerStatusId());
         $property -> setContainerPropertyById($container->getContainerPropertyId());
         echo "<td>". $property ->getContainerPropertyTitle();
         echo "<td>". $status ->getContainerStatusTitle();
      ?>
   </tr>
</table>
<br>
<div class="nav-botton">
   <div><a href="index.php?q=deposit&categ=container&sub=delete&id=<?= $container->getContainerId()?>">Supprimer</a></div>  
   <div><a href="index.php?q=deposit&categ=container&sub=update&id=<?= $container->getContainerId()?>">Modifier</a></div>  
   <div><a href="index.php?q=deposit&categ=container&sub=all">Toutes les salles</a></div>
</div>
<br><br>
<h2>Nombre d'enregistrement(s) dans le contenant</h2>
<ol>
<?php
      $number = new recordsManager();
      $number = $number ->countContainerUsed($container->getContainerId());
      if($number > 0){
         echo "ce contenant est utilisé par ".$number ;
      } else{
         echo "Ce contenant est vide...";
      }
?>
</ol>