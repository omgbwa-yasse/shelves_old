<?php

require 'models/repository/records.class.php';
require_once 'views/repository/records/display.inc.php';

if(isset($_POST['nui']) || isset($_POST['title']) || isset($_POST['date_start']) || isset($_POST['organization_title'])){

            $_POST['nui']= htmlspecialchars ($_POST['nui']);
            $_POST['title']= htmlspecialchars ($_POST['title']);
            $_POST['date_start'] = htmlspecialchars ($_POST['date_start']);
            $_POST['date_end']= htmlspecialchars ($_POST['date_end']);
            $_POST['observation'] = htmlspecialchars($_POST['observation']) ;
            $_POST['code_title'] = htmlspecialchars ($_POST['code_title']);
            $_POST['support']= htmlspecialchars ($_POST['support']);
            $_POST['container']= htmlspecialchars ($_POST['container']);
            $_POST['statut']= htmlspecialchars ($_POST['statut']);
            $_POST['keywords']= htmlspecialchars ($_POST['keywords']);
            $_POST['organization_title']= htmlspecialchars ($_POST['organization_title']);
            

            $supportTitle = $_POST['support'] ;


            $record = new records();
            $record->setRecordId(NULL);
            $record->setRecordNui($_POST['nui']);
            $record->setRecordTitle($_POST['title']); 
            $record->setRecordDateStart($_POST['date_start']);               
            $record->setRecordDateEnd($_POST['date_end']);
            $record->setRecordObservation($_POST['observation']);
            $record->setRecordStatusTitle($_POST['statut']);
            $record->setRecordClasseCodeTitle($_POST['code_title']);
            $record->setRecordSupportTitle($_POST['support']); 
            $record->setRecordContainerTitle($_POST['container']);
            $record->setRecordOrganizationTitle($_POST['organization_title']);
            $record->setRecordIdByNui();

            if (!empty($_GET['id_parent'])) {
                $_GET['id_parent']= htmlspecialchars ($_GET['id_parent']);
                $record->setRecordLinkId($_GET['id_parent']);
            } else {}



            if($record ->controlNui() == TRUE){
                    $record->setRecordTempNui();
                    $record->saveRecord();
                    include "views/repository/records/saveRecordsKeywords.inc.php";
                } else {
                    $record->saveRecord();
                    include "views/repository/records/saveRecordsKeywords.inc.php";
                };
            $record->setRecordIdByNui();
            displayRecordLight($record);
} else {

    $error = NULL;
    if(empty($_POST['nui'])){ $error['nui'] = 'Le numéro de référence est vide';}
    if(empty($_POST['title'])){ $error['title'] = 'Le titre est vide';}
    if(empty($_POST['date_start'])){ $error['date_start'] = 'Date de début vide';}
    if(empty($_POST['organization_title'])){ $error['organization_title'] = 'Service producteur est vide';}
    
    echo 'Erreur à corriger <ul>';
    foreach($error as $error_message){
        echo "<li><b>".$error_message."</b></li>";
    }
    echo '</ul>';

}

?>

<br>

<br>
<a href="index.php?q=repository&categ=create&sub=new">Nouveau Enregistrement</a>
<br>
<a href="index.php?q=repository&categ=create&sub=new">Modifier l'enregistrement</a>
<br>
<a href="index.php?q=repository&categ=create&sub=new">Supprimer</a>
<br>