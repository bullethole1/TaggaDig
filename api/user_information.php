<?php
require 'session.php';
require 'database.php';
user_login_failed();


//SE ANVÄNDARINFO
$sql_user = "SELECT business, firstName, lastName, email, phone  FROM `members` WHERE `id` = :sessionId";
function show_user_order_information()
{
    global $pdo;
    global $sql;
    $row = $pdo->prepare($sql);
    $row->execute(['id' => $_SESSION['userid']]);
    $result = $row->fetchAll(\PDO::FETCH_ASSOC);
    $main_order = array('data' => $result);
    echo json_encode($main_order, JSON_UNESCAPED_UNICODE);
}