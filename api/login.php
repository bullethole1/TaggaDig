<?php
require_once "session.php";
include_once 'database.php';
$_SESSION['message'] = 'Fel inlogg';
$_SESSION['logged_in'] = $_POST['email'];
failed();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['email'];
    $password = $_POST['password'];
    $krypterad = crypt($password, "salt");
    
    $sql = "SELECT  id, business,  email FROM members WHERE email = :mail AND password = :crypt";
    $row = $pdo->prepare($sql);
    $row->execute(['mail' => $user, 'crypt' => $krypterad]);
    $rows = $row->fetchAll(\PDO::FETCH_ASSOC);
    // $result = $row->fetch(PDO::FETCH_NUM);
    if ($row->rowCount() > 0) {
        // $result = $row->fetch(\PDO::FETCH_NUM);
        $main = array('data' => $rows);
        $_SESSION['userid'] = $rows[0]['id'];
        echo json_encode($main);
    } else {
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