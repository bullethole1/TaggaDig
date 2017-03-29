<?php
require_once'session.php'; 
include_once'database.php';
user_login_failed();
//SE ORDER
$sql_order = "SELECT *  FROM `orders` WHERE `member_id` = {$_SESSION['userid']}  ";
$row = $pdo->prepare($sql_order);
$row->execute();
$resultat=$row->fetchAll(PDO::FETCH_ASSOC);
$main_order = array('data'=> $resultat);
echo json_encode($main_order, JSON_UNESCAPED_UNICODE);

?> 