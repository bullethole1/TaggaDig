<?php 
    include_once'database.php';
    require_once'session.php'; 
    failed();     // kom inte åt försen inlogg
    $_SESSION['logged_in'] = $_POST['email'];

// $_SESSION['email'] = $user_email;



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<form action="#" method="POST">
<button type="submit">Bekräfta </button>
</form>

</body>
</html>