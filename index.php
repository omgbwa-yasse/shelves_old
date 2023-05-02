<?php
include 'models/connexion.class.php';


session_start();
$session= new session();
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
    width: 300px;
    padding: 1em;
    border: 1px solid #CCC;
    border-radius: 1em;
}
label {
    display: inline-block;
    width: 90px;
    text-align: right;
}
input[type="text"],
input[type="password"] {
    font: 1em sans-serif;
    width: 200px;
    box-sizing: border-box;
    border: 1px solid #999;
}
input[type="submit"] {
    padding: 0.5em 1em;
    border-radius: 0.5em;
    background-color: #EEE;
    border: none;
}
input[type="submit"]:hover {
    background-color: #CCC;
}
</style>
<body>
    <center>
        <h1>Connectez vous</h1>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br><br>
        <input type="submit" value="Login">
    </form></center>
</body>
</html>