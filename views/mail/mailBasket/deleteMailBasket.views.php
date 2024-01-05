<?php
require_once 'models/mail/mailManager.class.php';
require_once 'models/mail/MailBasket.class.php';
$mailBasketManager = new mailManager();
$mailBasket = $mailBasketManager ->mailBasketByID($_GET['id']);
foreach ($mailBasket as $mailBasket) {

    echo '<h1>Vous avez supprimé ce Mail Basket avec succès :</h1>';
    echo "<table border='0'>";
    echo "<tr>";   
    echo "<td><b> ID  :</b>".$mailBasket['mail_basket_id'];
    echo "<tr>";
    echo "<td><b> Titre  :</b>".$mailBasket['mail_basket_title'];
    echo "<tr>";
    echo "<td><b> Observation  :</b>".$mailBasket['mail_basket_observation'];
    echo "<tr>";
    echo "</table>";
    $mailBasketObj = new MailBasket();
    $mailBasketObj ->deleteMailBasket($mailBasket['mail_basket_id']);


echo "<hr/>";

}

?>
<a href="index.php?q=mail&categ=mailBasket&sub=allMailBaskets"> <- tous les Mail Baskets</a>
