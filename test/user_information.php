<?php
require_once'session.php'; 
include_once'database.php';
failed();


//SE ANVÄNDARINFO
$sql_user = "SELECT business, firstName, lastName, email, phone  FROM `members` WHERE `id` = {$_SESSION['userid']}  ";
$row = $pdo->prepare($sql_user);
$row->execute();
$resultat=$row->fetchAll(PDO::FETCH_ASSOC);
$main_user = array('data'=> $resultat);
echo json_encode($main_user, JSON_UNESCAPED_UNICODE);

?> 