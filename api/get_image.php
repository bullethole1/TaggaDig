<?php
require 'database.php';

$id = addslashes($_REQUEST['id']);

$sql = "SELECT `upFile` FROM `orders` WHERE `orderNr` = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$array = $stmt->fetch();
$image = $array['upFile'];

if (!empty($image)) {
    header("Content-Type: image/jpeg");
    echo base64_decode($image);
} else {
    echo 'no image was found';
}