<?php
require_once 'models/mail/MailBasket.class.php';

$mailBasket = new MailBasket();

if ( isset($_POST['mail_basket_title']) && isset($_POST['mail_basket_observation'])) {
 
    $mailBasket -> createMailBasket(NULL,$_POST['mail_basket_title'], $_POST['mail_basket_observation']);
}
?>
<h1>Créer un Mail Basket </h1>

<form  method="POST" action="index.php?q=mail&categ=mailBasket&sub=createMailBasket">
<table>
 
  <tr>
    <td><label for="mail_basket_title">Titre du Mail Basket :</label></td>
    <td><input type="text" id="mail_basket_title" name="mail_basket_title"></td>
  </tr>
  <tr>
    <td><label for="mail_basket_observation">Observation du Mail Basket :</label></td>
    <td><input type="text" id="mail_basket_observation" name="mail_basket_observation"></td>
  </tr>
 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
