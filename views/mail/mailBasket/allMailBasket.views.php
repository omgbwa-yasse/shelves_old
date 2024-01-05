<?php
require_once 'models/mail/mailManager.class.php';

?>
<ul class="S_optionSousMenu">
    <li><a href="index.php?q=mail&categ=mailBasket&sub=createMailBasket"> Créer un Mail Basket </a></li>
</ul>

<h1>Mail Baskets</h1>
<table border="2" width="800px">
    <tr>        
        <th>références </th>
        <th>titre</th>
        <th>Observation</th>
        <th colspan =3>action</th>
    </tr>
<?php
$mailBasket = new mailManager();
$allMailBaskets = $mailBasket -> allMailBasket();
foreach($allMailBaskets as $mailBasket){
    echo "<tr>";
    echo "<td>". $mailBasket['mail_basket_id'];
    echo "<td>". $mailBasket['mail_basket_title'];
    echo "<td>". $mailBasket['mail_basket_observation'];
   
   
    echo "<td><a href=\"index.php?q=mail&categ=mailBasket&sub=deleteMailBasket&id=". $mailBasket['mail_basket_id'] ."\">Supprimer</a>";
    echo "<td><a href=\"index.php?q=mail&categ=mailBasket&sub=updateMailBasket&id=". $mailBasket['mail_basket_id'] ."\">Modifier</a>";
    
    

}?>
</table>
