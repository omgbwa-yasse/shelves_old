
<table class="formular">
<tr> <td class="titre"> N° inventaire </td>  <td> <input type="text" name="nui" size="30"></td> </tr>
<tr> <td class="titre"> Intitulé / analyse </td>  <td> <input type="text" name="title" size="70"></td> </tr>
<tr> <td class="titre"> Dates extrêmes</td>  <td><input type="date" name="date_start" size="70"> au <input type="date" name="date_end" size="70"> </td></tr>
<tr> <td class="titre"> Observation</td>  <td><input type="text-area" name="observation" width="70"> </td></tr>

<tr><td class="titre"> Classe</td><td>
<select name="code_title">
<?php if(isset($allClasse)){
    foreach($allClasse as $classe){
        echo '<option>'. $classe['code_title'].'</option>'; 
    }
} ?>
</select>
</td></tr>

<tr><td class="titre">Détenteur : </td><td>
<select name="organisation_title">
<?php if(isset($allOrganization)){
    foreach($allOrganization as $id){
        $organization = new organization();
        $organization ->setOrganizationById($id['organization_id']);
        echo '<option>'.$organization ->getOrganizationTitle() .'</option>'; 
    }
} ?>
</select>
</td></tr>
<tr><td class="titre">Statut</td><td>
<select name="statut">
<?php if(isset($allStatut)){
    foreach($allStatut as $statut){
        if ($statut['statut'] == "disponible"){
            echo '<option>'. $statut['statut'].'</option>';
        } else{
            echo '<option>'. $statut['statut'].'</option>';
        }  }} 
?>
</select>
</td></tr>
<tr><td class="titre">Contenant</td><td> 
<select name="container">
<?php if(isset($allContainer)){
    foreach($allContainer as $container){
        echo '<option>'. $container['container'].'</option>'; 
    }
} ?>
</select>
</td></tr>
<tr> <td class="titre"> Support</td><td> 
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
<tr> <td class="titre"> Mots-cléfs (<b style="color:red;">;</b>): </td> <td> <input type="text" name="keywords" size="70"> </td>  </tr>
<tr> <td> <input type="submit" size="30"> </td>  <td> <input type="reset" size="30"></td></tr>
</table>
