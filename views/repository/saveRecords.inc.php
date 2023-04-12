<?php
require 'models/repository/records.class.php';

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
$supportTitle = $_POST['support'] ;


$record = new records( NULL,$_POST['nui'],
        $_POST['title'], $_POST['date_start'],               
        $_POST['date_end'], $_POST['observation'],
        $_POST['statut'], $_POST['code_title'],
        $_POST['support'], NULL, $_POST['container']);

if($record ->controlNui() == TRUE){
        $record->setRecordTempNui();
        $record->saveRecord();
        include "views/repository/saveRecordsKeywords.inc.php";
    } else {
        $record->saveRecord();
        include "views/repository/saveRecordsKeywords.inc.php";
    };
?>

<br>

<br>
<a href="index.php?q=repository&categ=create&sub=new">Nouveau Enregistrement</a>
<br>
<a href="index.php?q=repository&categ=create&sub=new">Modifier l'enregistrement</a>
<br>
<a href="index.php?q=repository&categ=create&sub=new">Supprimer</a>
<br>