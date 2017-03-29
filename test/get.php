<?php
include_once('database.php');

$id = addslashes( $_REQUEST['id']);

$sql = "SELECT `upFile` FROM `orders` WHERE `orderNr` = $id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$array = $stmt->fetch();
$image = $array['upFile'];

header("Content-Type: image/jpeg");
echo base64_decode($image);
?>