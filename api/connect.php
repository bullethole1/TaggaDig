<?php 

session_start();
?>
<!DOCTYPE html>
<html>
    <head>
<meta charset="utf-8">
    </head>
    <body>
<form action="login.php" method="POST">
     <input type="text" name="username" value="" placeholder="Användarnamn" /><br>
     <input type="password" name="password" value="" placeholder="Lösenord"/><br> 
    <button type="submit" name="login">Logga in</button>
</form>

<?php 
if(isset($_SESSION['message'])  ){
 echo ($_SESSION['message']); 
$_SESSION['message'] = null;
}

session_destroy();
?>


</body>
</html>


