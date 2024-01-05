<?php
require_once 'models/mail/mailManager.class.php';
require_once 'models/mail/process.class.php';
$processmanager = new mailManager();
$process=$processmanager ->processByID($_GET['id']);
foreach ($process as $process) {

    echo '<h1>Vous avez supprimer cette regle  avec success :</h1>';
    echo "<table border='0'>";
    echo "<tr>";   
    echo "<td><b> Reference  :</b>".$process['process_reference'];
    echo "<tr>";
    echo "<td><b> TITRE  :</b>".$process['process_title'];
    echo "<tr>";
    echo "</table>";
    $processobj = new process();
    $processobj ->deleteMailProcess($process['process_id']);


echo "<hr/>";

}

?>
<a href="index.php?q=mail&categ=process&sub=allprocess"> <- toute les affaire</a>