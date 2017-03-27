<?php
require 'session.php';
require 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<form action="login.php" method="POST" name="login">
    <input type="text" name="email" value="" placeholder="E-post"/><br>
    <input type="password" name="password" value="" placeholder="Lösenord"/><br>
    <button type="submit" name="login">Logga in</button>
</form>

<?php

echo error_message(); // kalla på sessionfunktion

session_destroy();
?>


</body>
</html>


