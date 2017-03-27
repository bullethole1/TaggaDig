<?php
require 'database.php';
require 'session.php';
failed();     // kom inte åt försen inlogg
$_SESSION['logged_in'] = $_POST['email'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<form action="#" method="POST">
    <button type="submit">Bekräfta</button>
</form>

</body>
</html>