<?php
require 'session.php';
require 'database.php';
failed();


//SE ANVÄNDARINFO
$sql_user = "SELECT business, firstName, lastName, email, phone  FROM `members` WHERE `id` = :sessionId";
$row = $pdo->prepare($sql_user);
$row->execute(['sessionId' => $_SESSION['userid']]);
$resultat = $row->fetchAll(PDO::FETCH_ASSOC);
$main_user = array('data' => $resultat);
echo json_encode($main_user, JSON_UNSCAPE_UNICODE);