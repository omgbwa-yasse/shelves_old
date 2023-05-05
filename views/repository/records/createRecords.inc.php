<?php
    require_once 'models/repository/recordsManager.class.php';
    require_once 'models/repository/records.class.php';
    require_once 'models/tools/organization/organizationManager.class.php';
    require_once 'models/tools/organization/organization.class.php';

    $records = new recordsManager();

    $allClasse = $records -> getAllClasse();
    $allStatut = $records -> getAllStatutTitle();
    $allContainer = $records ->getAllContainer();
    $allSupport = $records -> getAllSupportTitle();
    $sqlLastNui = $records -> getLastNui();

    $organisation = new organizationManager();
    $allOrganization = $organisation -> getAllOrganization();

    foreach($sqlLastNui as $Nui){
        echo "Le dernier enregistrement est : ". $Nui['nui'];
    }
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

<tr><td>Détenteur : </td><td>
<select name="organization_title">
<?php if(isset($allOrganization)){
    foreach($allOrganization as $id){
        $organization = new organization();
        $organization ->setOrganizationById($id['organization_id']);
        echo '<option>'.$organization ->getOrganizationTitle() .'</option>'; 
    }
} ?>
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