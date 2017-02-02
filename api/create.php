
    <!DOCTYPE html>
<html>
    <head>
<meta charset="utf-8">
    </head>
    <body>
<form action="#" method="POST">
    <input type="text" name="firstName" value="" placeholder="Namn" /><br>
    <input type="text" name="lastName" value="" placeholder="Efternamn"/><br>
    <input type="text" name="email" value="" placeholder="Epost" /><br>
    <input type="text" name="phoneNumber" value="" placeholder="Telefonnr"/><br>
    <input type="text" name="businessName" value="" placeholder="Företagsnman"/><br>
    <input type="text" name="description" value="" placeholder="Beskrivning" /><br>
    <input type="file" name="upFile" value="" placeholder="Ladda upp en fil" id="fileUp"/><br>
    
    <button type="submit">Submit</button>
</form>


<?php 
$host = '127.0.0.1'; 
$db = 'tagga_dig';
$user = 'root';
$password = 'root';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			 PDO::ATTR_EMULATE_PREPARES   => false  ];

$pdo = new PDO ($dsn, $user, $password, $options);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$formArr = array('firstName', 'lastName', 'email', 'phoneNumber', 'businessName', 'description', 'upFile');
$error = false; 
foreach($formArr AS $row) { 
  if(!isset($_POST[$row]) || empty($_POST[$row])) {
    echo $row.' saknas<br />'; 
    $error = true; 
  }
}

if(!$error){
if(isset($_POST['email']) ) {	
    $sql = "SELECT COUNT(*) AS 'antal_rader' FROM `orders`
WHERE email = :mail";
	$stm_count = $pdo->prepare($sql);
	$stm_count->execute(['mail' => $_POST['email']]);
	foreach( $stm_count as $row ) {
		$antal_rader = $row['antal_rader'];
	}
    if( $antal_rader > 0 ) {
        echo "Finns redan";
    }else{
        $sql = "INSERT INTO `orders` (`firstName`, `lastName`, `email`, `phoneNumber`, `businessName`, `description`, `upFile`)
VALUES(:fName, :lName, :mail,  :tel, :business, :descriptionText, :file )";


$stm_insert = $pdo -> prepare($sql);
$stm_insert -> execute(['fName' => $_POST['firstName'],
                        'lName' => $_POST['lastName'],
                        'mail' => $_POST['email'],
                        'tel' => $_POST['phoneNumber'],
                        'business' => $_POST['businessName'],
                        'descriptionText' => $_POST['description'],
                        'file' => $_POST['upFile'] ]);
                        echo "hej";
}
}
}
}

?>

 </body>
</html>