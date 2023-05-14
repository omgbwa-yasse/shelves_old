<?php


        echo "Formulaire de connxion";
?>
<form action='index.php?q=session&categ=user&sub=accessControl' method='post'>
        <label for='pseudo'>Pseudo:</label>
        <input type='text' id='pseudo' name='pseudo' required>
        <label for='password'>Password:</label>
        <input type='password' id='password' name='password' required>
        <button type='submit'>Log in</button>
</form>
<a href="index.php?q=session&categ=user&sub=add">Créer un compte</a>
