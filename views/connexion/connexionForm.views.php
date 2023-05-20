<html>
<head>
        <title>My Shelves</title>
        <link href="template/css/style.css" rel="stylesheet">
</head>
        <body>
<center>
<div class="connexion">
<?php
        if(isset($_GET['error']) ){
                switch($_GET['error']){
                        case "1" : echo "Mot de passe erronée";
                        break;
                        case "2" : echo "Compte non existant";
                        break;
                        default : echo "Veuiller contacter l'administrateur ...";
                }
        }
        echo "<h1>My Shelves</h1>";
?>
<div>
<form action='index.php?q=session&categ=user&sub=accessControl' method='post'>
        <table>
        <tr>
                <td><label for='pseudo'>Pseudo:</label></td>
                <td><input type='text' id='pseudo' name='pseudo' required></td>
        </tr>
        <tr>
                <td><label for='password'>Password:</label></td>
                <td><input type='password' id='password' name='password' required></td>
        </tr>
        </table>
        <button type='submit'>Log in</button><button type='submit'>Log Out</button>
</form>
</div>
<a href="index.php?q=session&categ=user&sub=add">Créer un compte</a>
</div>
</center>
</body>
</html>