<?php
            echo "<form action='index.php?q=connexion&categ=user&sub=verifyUser' method='post'>
                    <label for='login'>Login:</label>
                    <input type='text' id='pseudo' name='pseudo' required>
                    <label for='password'>Password:</label>
                    <input type='password' id='password' name='password' required>
                    <button type='submit'>Log in</button>
            </form>";
        echo "<a href=\"index.php?q=connexion&categ=user&sub=add\">Creer un compte</a>";
?>