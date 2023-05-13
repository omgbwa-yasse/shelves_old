<?php
require_once 'models/session.class.php';

if (isset($_POST['submit'])) {
    $administrator = new administrator();
    $log=$administrator->login($_POST['pseudo'],$_POST['password']);
if ($log==true){
        //header("Location: " . $_SERVER['REQUEST_URI']);
       // exit;
}
else{
        echo "<h1> Wrong username or password </h1>";
}
}


echo "<form action='' method='post'>
    <label for='login'>Login:</label>
    <input type='text' id='pseudo' name='pseudo' required>
    <label for='password'>Password:</label>
    <input type='password' id='password' name='password' required>
    <button type='submit' name='submit'>Log in</button>
</form>";
?>