<?php
require_once 'models/tools/thesaurus/thesaurus.class.php';
$thesaurus = new Thesaurus();
if (isset($_POST['submit'])){
 $thesaurus->addindex();   
}

?>
<h1>Ajouter un index dans le thesaurus </h1>
<form method="POST" action="index.php?q=tools&categ=thesaurus&sub=addIndex">
    <table>
        <tr>  <td>cote</td> <td><input type="text" name="term_cote" id=""></td></tr>
        <tr> <td>titre</td><td><input type="text" name="term_title" id=""></td></tr>
        <tr> <td>reference</td><td><input type="text" name="term_reference" id=""></td></tr>
        <tr> <td>micrithesaurus Id</td><td><input type="text" name="microthesaurus_id" id=""></td></tr>
        <tr> <td>Broaded Id</td><td><input type="text" name="term_broader_id" id=""></td></tr>
        <tr> <td>Note</td><td><input type="text" name="term_scope_note" id=""></td></tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="enregistrer">
               
            </td>
            <td><input type="reset" name="reset" value="annuller"></td>
        </tr>
    </table>

</form>