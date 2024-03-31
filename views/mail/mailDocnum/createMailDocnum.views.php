<?php
require_once 'models/mail/mailDocNum.class.php';
$mailDocNum = new MailDocNum();
$mailDocNumAdded = false;

if (isset($_FILES['mail_docnum_file'])) {
    $originalName = $_FILES['mail_docnum_file']['name'];
    $tempname = $_FILES['mail_docnum_file']['tmp_name'];    
    
    // Créer une arborescence de dossiers basée sur la date et l'heure
    $folder = "Document/" . date('Y/m/d/') ;
    
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }
    $heure=date('H-i-');
 
    $filename =$heure.$originalName;
    $newFilePath = $folder . $filename;
    
    if (move_uploaded_file($tempname, $newFilePath)) {
        $mailDocNum -> createMailDocNum(NULL, $newFilePath, $filename);
        $mailDocNumAdded = true;
    } else {
        echo "Failed to upload file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Votre code CSS ici */
    </style>
    <!-- Inclure la bibliothèque SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <h1>Créer un Couriels DocNum </h1>
    <form method="POST" action="index.php?q=mail&categ=mailDocnum&sub=create" enctype="multipart/form-data" id="myForm">
    <table>
      <tr>
        <td><label for="mail_docnum_file">Fichier du Couriels DocNum :</label></td>
        <td><input type="file" id="mail_docnum_file" name="mail_docnum_file" accept=".pdf"></td>
      </tr>
      <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> 
    </table>
        
        <!-- Champ de formulaire caché pour l'indicateur de Couriels DocNum ajouté -->
        <input type="hidden" id="mailDocNumAdded" name="mailDocNumAdded" value="<?php echo $mailDocNumAdded ? 'true' : 'false'; ?>">
    </form>
    <script>
        window.addEventListener('load', function() {
            var mailDocNumAdded = document.getElementById('mailDocNumAdded').value;
            if (mailDocNumAdded === 'true') {
                swal("Good job!", "mail DocNum added successfully!", "success");
            }
        });
    </script>
</body>

</html>
