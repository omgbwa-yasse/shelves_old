<?php
include 'models/session.class.php';


session_start();
$session= new administrator();
if (isset($_POST['username']) && isset($_POST['password'])) {
   
   $error=$session->login();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<style>
    body {padding: 10%;
    font-family: Arial, sans-serif;
    font-size: 14px;
    background-color: rgba(0, 0, 0, 0.153);
}
form {
    background-color: #fff;
    margin: 0 auto;
    width: 350px;
    padding: 2em;
    border: 1px solid #CCC;
    border-radius: 1em;
    box-shadow: 1px 1px 2px 2px #888888;
}
label {
    display: inline-block;
    width: 90px;
    text-align: right;
}
input[type="text"],
input[type="password"] {
    font: 1em sans-serif;
    width: 250px;
    margin-left:5px;
    height:30px;
    border-radius:5px;
    box-sizing: border-box;
    border: 1px solid #999;
}
input[type="submit"] {
    padding: 0.5em 1em;
    border-radius: 0.5em;
    background-color: #EEE;
    border: none;
    height:30px;
    width: 100px;
}
input[type="submit"]:hover {
    background-color: #CCC;
}
</style>
<body>
    <center>
        <h1 style="margin-bottom:40px;font-size:30px;">Shelves</h1>
        <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
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
</body>
</html>