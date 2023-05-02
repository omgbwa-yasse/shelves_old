
<center>
<h1 style="margin-bottom:40px;font-size:30px;">Shelves</h1>
        <?php if (isset($error)): ?><p>
<?php echo $error; ?></p><?php endif; ?>

<form method="post" action="">
        <label for="username">Utilisateur</label>
        <input type="text" name="username" id="username">
        <br><br>
        <label for="password">Mot de passe </label>
        <input type="password" name="password" id="password">
        <br><br>
        <input type="submit" value="Connexion">
</form>
    
<p>Collecter, classer, conserver et communiquer simplement vos archives</p>
<div style="margin-top:22%;">Version 1.0 : Gestionnaire opensource des services de préarchivage</div>
</center>
