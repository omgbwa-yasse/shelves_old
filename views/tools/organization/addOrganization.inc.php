<?php
require_once 'models/tools/organization/organizationManager.class.php';

$allOrganization = new organizationManager();
$list = $allOrganization -> getAllOrganization();
?>
<div style="border:solid 2px red; width:900px;height:200px;margin-left:50px;margin-top:100px;padding:20px 20px 20px 20px;">

<table border="0">
<form method="POST" action="index.php?q=tools&categ=organization&sub=saveOrganization">
    <tr><td>code :</td><td><input type="text" name="code" style="width:400px;"></td></tr> 

    <tr><td>Unite :</td><td><input type="text" name="title" style="width:400px;"></td></tr>

    <tr><td>Parent :</td><td><select name="parent_id" style="width:400px;"> 
    <?php foreach($list as $organization){
            echo "<option value=\"". $organization['organization_id'] ."\">";
            echo $organization['organization_code'] . " - " . $organization['organization_title'];
            echo "<option/>";
    }?></select></td></tr>

    <tr><td>Observation :</td><td><input type="text" name="observation" style="width:400px;"></td></tr>

    <tr><td><input type="submit" name="enregister"></td><td><input type="reset" name="annuler"></td></tr>
</form>
</table>
</div>