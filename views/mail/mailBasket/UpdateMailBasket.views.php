<?php
require_once 'models/mail/MailBasket.class.php';
require_once 'models/mail/mailManager.class.php';

$mailBasketManager = new mailManager();

if (isset($_POST['mail_basket_id']) && isset($_POST['mail_basket_title']) && isset($_POST['mail_basket_observation'])) { 
    echo '<h1>UPDATED';
    $mailBasket = new MailBasket();
    $mailBasket -> updateMailBasket($_GET['id'],$_POST['mail_basket_id'],$_POST['mail_basket_title'], $_POST['mail_basket_observation']);
   
}   
    $mailBasket = $mailBasketManager ->mailBasketByID($_GET['id']) ;
    foreach ($mailBasket as $mailBasket) {
?>
<h1>Modifier un Mail Basket </h1>

<form  method="POST" action="index.php?q=mail&categ=mailBasket&sub=updateMailBasket&id=<?=$_GET['id']?>">
<table>
   <tr>
    <td><label for="mail_basket_id">ID :</label></td>
    <td><input type="text" id="mail_basket_id" name="mail_basket_id" value="<?= htmlspecialchars($mailBasket['mail_basket_id'], ENT_QUOTES); ?>" disabled></td>
  </tr>
  <tr>
    <td><label for="mail_basket_title">Titre du Mail Basket :</label></td>
    <td><input type="text" id="mail_basket_title" name="mail_basket_title" value="<?= htmlspecialchars($mailBasket['mail_basket_title'], ENT_QUOTES); ?>" ></td>
  </tr>
  <tr>
    <td><label for="mail_basket_observation">Observation du Mail Basket :</label></td>
    <td><input type="text" id="mail_basket_observation" name="mail_basket_observation" value="<?= htmlspecialchars($mailBasket['mail_basket_observation'], ENT_QUOTES); ?>" /></td>
  </tr>
 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
<?php
    }
    ?>
