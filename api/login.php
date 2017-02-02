 <!DOCTYPE html>
<html>
    <head>
<meta charset="utf-8">
    </head>
    <body>
<form action="login.php" method="POST">

    <button type="submit">LOGGA UT</button>
</form>
 
 
 <?php
session_start();
$host = '127.0.0.1'; 
$db = 'taggadig';
$user = 'root';
$password = 'root';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			 PDO::ATTR_EMULATE_PREPARES   => false  ];

$pdo = new PDO ($dsn, $user, $password, $options);

$_SESSION['username'] = $user;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = $_POST['username'];
    $password = $_POST['password'];
    $krypterad = crypt($password, "salt");
        
    $result = $pdo->prepare($sql = "SELECT * FROM members WHERE username = :uName AND password = :crypt");
    $result->execute(['uName' => $user, 'crypt' =>$krypterad]);
    $rows = $result->fetch(PDO::FETCH_NUM);
    if ($rows > 0){
        echo "hej " . $user;
        }
    else{
        
        header('location: connect.php');
        echo "Du har inte angett rätt inloggningsuppgifter!!";
        
        }
    }

if(isset($_POST['submit'])){
    session_destroy();
    header('location: connect.php');
}

?>
 
</body>
</html>