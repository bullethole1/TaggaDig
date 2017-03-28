<?php
require 'session.php';
require 'database.php';

if ($_SESSION['user_type'] == 0) {

    $sql = "SELECT  `id`, `business`, `firstName`, `lastName`, `email` FROM members WHERE `id` > 0";
    $row = $pdo->prepare($sql);
    $row->execute();
    $result = $row->fetchAll(PDO::FETCH_ASSOC);
    $main = array('data' => $result);

    echo json_encode($main, JSON_UNESCAPED_UNICODE);

}