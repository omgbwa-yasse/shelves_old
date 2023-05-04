<?php 
echo "Je teste...";

?>
Rechercher par date

<form method="POST" action="index.php?q=repository&categ=search&sub=byDatesResult">
    Date de début : <input type="date" name="date_start"></br>
    Date de fin : <input type="date" name="date_end"></br>
    <input type="submit" value ="Rechercher">
</form>
<hr>