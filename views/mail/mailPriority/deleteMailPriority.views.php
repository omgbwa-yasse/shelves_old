<?php
require_once 'models/mail/mailManager.class.php';
require_once 'models/mail/mailPriority.class.php';
$prioritymanager = new mailManager();
$priority=$prioritymanager ->PriorityByid($_GET['id']);
foreach ($priority as $priority) {

    echo '<h1>Vous avez supprimer cette regle  avec success :</h1>';
    echo "<table border='0'>";
    echo "<tr>";
    echo "<td><b> TITRE  :</b>".$priority['mail_priority_title'];
    echo "</tr>";
    echo "</table>";
    $priorityobj = new mailPriority();
    $priorityobj ->deleteMailPriority($priority['mail_priority_id']);


echo "<hr/>";

}

?>
<a href="index.php?q=mail&categ=priority&sub=all"> <- tous les niveau de priorité</a>