<?php
require_once 'session.php';
include_once 'database.php';


// hämta alla användare
$sql = "SELECT  `id`, `business`, `firstName`, `lastName`, `email` FROM members WHERE `id` > 0";
$row=$pdo->prepare($sql);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);
$main = array('data'=>$result);

echo json_encode($main); 




?> 