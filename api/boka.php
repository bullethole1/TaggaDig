<form action="logout.php" method="POST">

    <button type="submit" name="">LOGGA UT</button>
</form>
<?php
include_once('database.php');
require_once("session.php"); 
require_once("create.php");

// $id = addslashes( $_REQUEST['id']);

// $image = mysql_query("SELECT * FROM `orders` WHERE id = $id");
// $image = mysql_fetch_assoc($image);
// $image = $image['upFile'];

// header ("Content-type: image/jpeg");
// echo $image;
?>