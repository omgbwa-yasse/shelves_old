<?php  
$cnx = new PDO("mysql:host=localhost;dbname=dbms", "root", "");
$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sqlClasse = "SELECT classification.classification_code_title as code_title FROM classification";
$sqlStatut = "SELECT records_status.records_status_title as statut FROM records_status";
$sqlSupport = "SELECT records_support.records_support_title as support FROM records_support";
$sqlContainer = "SELECT container.container_reference as container FROM container";
$sqlLastNui = "SELECT records.records_nui as nui FROM records ORDER BY records.id_records DESC LIMIT 1";

$allClasse = $cnx->prepare($sqlClasse);
$allStatut = $cnx->prepare($sqlStatut);
$allSupport = $cnx->prepare($sqlSupport);
$allContainer = $cnx->prepare($sqlContainer);
$sqlLastNui = $cnx->prepare($sqlLastNui);

$allClasse ->execute();
$allStatut ->execute();
$allSupport ->execute();
$allContainer -> execute();
$sqlLastNui -> execute();
?>
<?php
    foreach($sqlLastNui as $Nui){
        echo "Le dernier enregistrement est : ". $Nui['nui'];
    }
?>

<?php
    echo "id du parent est :". $_GET['parent_id'];
    echo "<br/>J'affiche les coordonnées du Records parent..ici ";
?>

<form method="POST" action="index.php?q=repository&categ=create&sub=newSave">
<table>
<tr> <td> Identifiant unique </td>  <td> <input type="text" name="nui" size="30"></td> </tr>
<tr> <td> Intitulé </td>  <td> <input type="text" name="title" size="70"></td> </tr>
<tr> <td> Date de debut</td>  <td><input type="date" name="date_start" size="70"> </td></tr>
<tr> <td> Date de fin</td>  <td> <input type="date" name="date_end" size="70"></td></tr>
<tr> <td> Observation</td>  <td><input type="text-area" name="observation" width="70"> </td></tr>

<tr><td> Classe</td><td>
<select name="code_title">
<?php if(isset($allClasse)){
    foreach($allClasse as $classe){
        echo '<option>'. $classe['code_title'].'</option>'; 
    }
} ?>
</select>
</td></tr>
<tr><td>Statut</td><td>
<select name="statut">
<?php if(isset($allStatut)){
    foreach($allStatut as $statut){
        if ($statut['statut'] == "disponible"){
            echo '<option>'. $statut['statut'].'</option>';
        } else{
            echo '<option>'. $statut['statut'].'</option>';
        } 
    }
} 
?>
</select>
</td></tr>
<tr><td>Boite</td><td> 
<select name="container">
<?php if(isset($allContainer)){
    foreach($allContainer as $container){
        echo '<option>'. $container['container'].'</option>'; 
    }
} ?>
</select>
</td></tr>
<tr> <td> Support</td><td> 
<select name="support">
<?php if(isset($allSupport)){
    foreach($allSupport as $support){
        if ($support['support'] == "papier"){
            echo '<option>'. $support['support'].'</option>';
        } else{
            echo '<option>'. $support['support'].'</option>';
        }
    }
} ?>
</select>
</td></tr>
<tr> <td> Mots-cléfs : </td> <td> <input type="text" name="keywords" size="70">  séparer les mots clés avec un (<b>;</b>)</td>  </tr>
<tr> <td> <input type="submit" size="30"> </td>  <td> <input type="reset" size="30"></td></tr>
</table>
</form>