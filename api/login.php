<?php
require_once "session.php";
include_once 'database.php';
$_SESSION['message'] = 'Fel inlogg';
$_SESSION['logged_in'] = $_POST['email'];
failed();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['email'];
    $password = $_POST['password'];

    
    $sql = "SELECT  id, business, password, salt, email, user_type FROM members WHERE email = :mail";
    $row = $pdo->prepare($sql);
    $row->execute(['mail' => $user]);
    $rows = $row->fetchAll(\PDO::FETCH_ASSOC);
    // $result = $row->fetch(PDO::FETCH_NUM);
    if ($row->rowCount() > 0) {
        // $result = $row->fetch(\PDO::FETCH_NUM);
        $main = array('data' => $rows);
        $krypterad = crypt($password, $rows[0]['salt']);
        if($krypterad == $rows[0]['password']){
        $_SESSION['userid'] = $rows[0]['id'];
        $_SESSION['user_type'] =$rows[0]['user_type'];
        echo json_encode($main);
    } 
    }else {
        $_SESSION['message'];
        header('location: connect.php');
        exit;
    }
}
var_dump($_SESSION['userid']);





?>
<!DOCTYPE html>
<html>
    <head>
<meta charset="utf-8">
    </head>
    <body>
<form action="logout.php" method="POST">

    <button type="submit" name="">LOGGA UT</button>
</form>
 
<a href="boka.php">Boka här </a> 
</body>
</html>