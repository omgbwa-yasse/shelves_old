<?php
$cnx = new PDO("mysql:host=localhost;dbname=dbms", "root", "");
$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo '<hr> Liste des données envoyées par POST <br> ';
echo $_POST['nui']= htmlspecialchars ($_POST['nui']);
echo $_POST['title']= htmlspecialchars ($_POST['title']);
echo $_POST['date_start'] = htmlspecialchars ($_POST['date_start']);
echo $_POST['date_end']= htmlspecialchars ($_POST['date_end']);
echo $_POST['observation'] = htmlspecialchars($_POST['observation']) ;
echo $_POST['code_title'] = htmlspecialchars ($_POST['code_title']);
echo $_POST['support']= htmlspecialchars ($_POST['support']);
echo $_POST['container']= htmlspecialchars ($_POST['container']);
echo $_POST['statut']= htmlspecialchars ($_POST['statut']);
echo $_POST['keywords']= htmlspecialchars ($_POST['keywords']);
$supportTitle = $_POST['support'] ;

echo '<hr> Recupartion des Id des données envoyées  <br>  ';
$classe = "";
$classeId = "SELECT classification_id FROM classification WHERE classification_code_title = '".$_POST['code_title']."' " ;
$classeId=$cnx->prepare($classeId);
$classeId->execute();
foreach($classeId as $id){
    echo "id de la classe est :".$id['classification_id'];
    $classe = $id['classification_id'];
}
$support ="";
$supportId = "SELECT records_support_id FROM records_support WHERE records_support_title = '".$_POST['support']."' " ;
$supportId=$cnx->prepare($supportId);
$supportId->execute();
foreach($supportId as $id){
    echo "<br> id du support est :".$id['records_support_id'];
    $support =$id['records_support_id'];

}
$statut = '';
$statutId = "SELECT records_status_id FROM records_status WHERE records_status_title = '".$_POST['statut']."' " ;
$statutId=$cnx->prepare($statutId);
$statutId->execute();
foreach($statutId as $id){
    echo "<br> id du statut est :".$id['records_status_id'];
    $statut = $id['records_status_id'];

}
$container = "";
$containerId = "SELECT container_id FROM container WHERE container_reference = '".$_POST['container']."' " ;
$containerId=$cnx->prepare($containerId);
$containerId->execute();
foreach($containerId as $id){
    echo "<br> id du container est :".$id['container_id'];
    $container = $id['container_id'];
}


$rqtSave = "INSERT INTO records (id_records,records_nui, records_title, records_date_start, 
                                records_date_end, records_observation, records_status_id,
                                records_support_id, records_link_id, container_id, classification_id ) 
            values ('".NULL."','".$_POST['nui']."','".$_POST['title']."','".$_POST['date_start']."','".$_POST['date_end']."',
            '".$_POST['observation']."','".$statut."','".$support."','".NULL."','".$container."','".$classe."' )";
$rqtSave = $cnx->prepare($rqtSave);
if($rqtSave ->execute()){ 

     include_once "views/inventory/saveRecordsKeywords.inc.php";
     
} else{ echo "erreur";};

?>

<br>

<br>
<a href="../shelves/index.php?q=repository&categ=create&sub=new">Nouveau Enregistrement</a>
<br>
<a href="../shelves/index.php?q=repository&categ=create&sub=new">Modifier l'enregistrement</a>
<br>
<a href="../shelves/index.php?q=repository&categ=create&sub=new">Supprimer</a>
<br>