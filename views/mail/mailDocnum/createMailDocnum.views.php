<?php
require_once 'models/mail/mailDocNum.class.php';

$mailDocNum = new MailDocNum();

if (isset($_FILES['mail_docnum_file'])) {
    $originalName = $_FILES['mail_docnum_file']['name'];
    $tempname = $_FILES['mail_docnum_file']['tmp_name'];    
    
    // Créer une arborescence de dossiers basée sur la date et l'heure
    $folder = "Document/" . date('Y/m/d/') ;
    
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }
    $heure=date('H-i-');
    echo $heure;
    $filename =$heure.$originalName;
    $newFilePath = $folder . $filename;
    
    if (move_uploaded_file($tempname, $newFilePath)) {
        $mailDocNum -> createMailDocNum(NULL, $newFilePath, $filename);
    } else {
        echo "Failed to upload file.";
    }
}
?>

<h1>Créer un Couriels DocNum </h1>

<form method="POST" action="index.php?q=mail&categ=mailDocnum&sub=create" enctype="multipart/form-data">
<table>
  <tr>
    <td><label for="mail_docnum_file">Fichier du Couriels DocNum :</label></td>
    <td><input type="file" id="mail_docnum_file" name="mail_docnum_file" accept=".pdf"></td>
  </tr>
  <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> 
</table>
</form>
