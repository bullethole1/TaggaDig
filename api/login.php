<?php
require 'session.php';
require 'database.php';
$_SESSION['message'] = 'Fel inlogg';
$_SESSION['logged_in'] = $_POST['email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT  id, business, password, salt, email, user_type FROM members WHERE email = :mail";
    $row = $pdo->prepare($sql);
    $row->execute(['mail' => $user]);
    $rows = $row->fetchAll(\PDO::FETCH_ASSOC);

    if ($row->rowCount() > 0) {

        $main = array('data' => $rows);
        $encrypted = crypt($password, $rows[0]['salt']);
        if($encrypted == $rows[0]['password']){
        $_SESSION['userid'] = $rows[0]['id'];
        $_SESSION['user_type'] =$rows[0]['user_type'];
        echo json_encode($main);
    } 
    }else {
        echo json_encode($_SESSION['message']);
        header('location: start_page.php');
        exit;
    }
}