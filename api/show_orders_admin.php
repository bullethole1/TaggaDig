<?php
require_once "session.php";
include_once 'database.php';
// hämta alla ordrar

$sql_order = "SELECT *  FROM `orders` WHERE `orderNr` > 0 ";
$row = $pdo->prepare($sql_order);
$row->execute();
$resultat=$row->fetchAll(PDO::FETCH_ASSOC);
$main_order = array('data'=> $resultat);
echo json_encode($main_order);

?>