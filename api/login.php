<?php

require_once "session.php";
include_once 'database.php';
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

<?php 
$_SESSION['message'] = 'Fel inlogg';
$_SESSION['logged_in'] = $_POST['email'];
failed();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['email'];
    $password = $_POST['password'];
    $krypterad = crypt($password, "salt");
    $sql = "SELECT `business`, id , email FROM members WHERE email = :mail AND password = :crypt";
    $row = $pdo->prepare($sql);
    $row->execute(['mail' => $user, 'crypt' => $krypterad]);
    $result = $row->fetchAll(\PDO::FETCH_ASSOC);
    $main = array('data' => $result);
    $_SESSION['userid'] = $result[0]['id'];
    // $_SESSION['mail'] = $result[0]['email'];
    // echo $result[0]['id'];
    echo json_encode($main);
}
// if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//     $user = $_POST['email'];
//     $password = $_POST['password'];
//     $krypterad = crypt($password, "salt");
//     $result = $pdo->prepare($sql = "SELECT * FROM members WHERE email = :mail AND password = :crypt");
//     $result->execute(['mail' => $user,
//                       'crypt' =>$krypterad]);
//     $rows = $result->fetch(PDO::FETCH_NUM);
//     if ($rows > 0){
//         $statement = $pdo->query('SELECT `business` FROM `members`');
//         foreach($statement as $row){
//             $business = $row['business'];
//         }
//         echo "Välkommen " . $business;
//         }
//     else{
//         $_SESSION['message'];
//         header('location: connect.php');
//         exit;
//         }
//     }
// require_once("create.php");
?>
 
</body>
</html>