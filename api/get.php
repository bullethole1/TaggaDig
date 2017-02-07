<?php

    	$dbHost = 'localhost';
		$db = 'taggaDig';
		$dbUser = 'root';
		$password = 'root';
		$charset = 'utf8';
		$dsn = "mysql:host=$dbHost;dbname=$db;charset=$charset";
		$options = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
					PDO::ATTR_EMULATE_PREPARES   => false  ];

	try {
    	$pdo = new PDO($dsn, $dbUser, $password, $options);
	} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
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