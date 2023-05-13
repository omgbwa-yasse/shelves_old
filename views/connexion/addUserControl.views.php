<?php
echo $_POST['pseudo'];
echo "<br>";
echo $_POST['name'];
echo "<br>";
echo $_POST['surname'];
echo "<br>";
if($_POST['password1'] == $_POST['password2']){
    $_POST['password'] = sha1(sha1($_POST['password1']).$rock);
    echo $_POST['password'];
}
echo "<br>";
echo $_POST['birthday'];
?>