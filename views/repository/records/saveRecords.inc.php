<?php

require 'models/repository/record.class.php';
require_once 'views/repository/records/display.inc.php';
require_once 'models/repository/authors.class.php';


if(isset($_POST['level_id']) && isset($_POST['nui']) && isset($_POST['title']) && isset($_POST['date_start']) && isset($_POST['organization_title']) && isset($_POST['authors'])){

            $level_id = htmlspecialchars ($_POST['level_id']);
            $nui = htmlspecialchars ($_POST['nui']);
            $title = htmlspecialchars ($_POST['title']);
            $date_start = htmlspecialchars ($_POST['date_start']);
            $date_end = htmlspecialchars ($_POST['date_end']);
            $observation = htmlspecialchars($_POST['observation']) ;
            $classification_id = htmlspecialchars ($_POST['classification_id']);
            $support = htmlspecialchars ($_POST['support']);
            $statut = htmlspecialchars ($_POST['statut']);
            $keywords = htmlspecialchars ($_POST['keywords']);
            $organization_title = htmlspecialchars ($_POST['organization_title']);
            

            $supportTitle = $_POST['support'] ;


            $record = new record();
            $record->setRecordId(NULL);
            $record->setRecordLevelId($level_id);
            $record->setRecordNui($nui);
            $record->setRecordTitle($title); 
            $record->setRecordDateStart($date_start);               
            $record->setRecordDateEnd($date_end);
            $record->setRecordObservation($observation);
            $record->setRecordStatusTitle($statut);
            $record->setRecordClasseId($classification_id);
            $record->setRecordClasseById();
            $record->setRecordStatusTitle($statut);
            $record->setRecordSupportTitle($support); 
            $record->setRecordOrganizationTitle($organization_title);
            $record->setRecordIdByNui();

            if (!empty($_GET['parent_id'])) {
                $_GET['id_parent']= htmlspecialchars ($_GET['parent_id']);
                $record->setRecordLinkId($_GET['parent_id']);
            } 

            if($record ->controlNui() == TRUE){
                    
                    // Enregistrement en générant un NUI
                    $record->setRecordTempNui();
                    $record->saveRecord();
                    $record->setRecordIdByNui();

                    // Enregistrement des auteurs
                    $author = new authors();
                    $author -> setAuthors($_POST['authors'], $record->getRecordId());
                    include "views/repository/records/saveRecordsKeywords.inc.php";
                } else {
                    
                    // Enregitrement avec NUI
                    $record->saveRecord();
                    // Enregistrement des auteurs
                    $record->setRecordIdByNui();
                    $author = new authors();
                    $author -> setAuthors($_POST['authors'], $record->getRecordId());
                    include "views/repository/records/saveRecordsKeywords.inc.php";
                };
            $record->setRecordIdByNui();
            displayRecordLight($record);
            require_once "views/repository/records/recordContainerForm.php";
            echo 'Veuillez choisir le contenant à inserer...';
            addInContainer($record->getRecordNui());


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