
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <form action="#" method="POST">
        <input type="text" name="username" value="" placeholder="Användarnamn" /><br>
        <input type="text" name="business" value="" placeholder="Företag"/><br>
        <input type="text" name="firstName" value="" placeholder="Namn" /><br>
        <input type="text" name="lastName" value="" placeholder="Efternamn"/><br>
        <input type="text" name="email" value="" placeholder="E-post"/><br>
        <input type="text" name="phone" value="" placeholder="Telefon" /><br>
        <input type="password" name="password" value="" placeholder="Lösenord"/><br>
        <input type="password" name="passwordsecond" value="" placeholder="fyll i lösenord igen"/><br>
        <button type="submit">Submit</button>
    </form>

    <?php
    include_once('database.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $formArr = array('username', 'business', 'firstName', 'lastName', 'email', 'phone', 'password' );
        $error = false; 
        foreach($formArr AS $row) { 
          if(!isset($_POST[$row]) || empty($_POST[$row])) {
            echo $row.' saknas<br />'; 
            $error = true; 
        }
    }

$phone = $_POST['phone'];
if(preg_match("/[^0-10]/", $phone)) {
  // $phone is valid
}else{
    echo "$phone is not a valid phonenr.";
    die();
}

$email = $_POST['email'];
if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  
} else {
  
  echo("$email is not a valid email address");
    die();
}

    if( $_POST['password'] == $_POST['passwordsecond']){

        if(!$error){
            if(isset($_POST['email']) ) {	
                $sql = "SELECT COUNT(*) AS 'antal_rader' FROM `members`
                WHERE email = :mail";
                $stm_count = $pdo->prepare($sql);
                $stm_count->execute(['mail' => $_POST['email']]);
                foreach( $stm_count as $row ) {
                  $antal_rader = $row['antal_rader'];
              }
              if( $antal_rader > 0 ) {
                echo "Finns redan";
            }else{
                $sql = "INSERT INTO `members` (`username`, `business`, `firstName`, `lastName`, `email`, `phone`, `password`)
                VALUES(:uName, :businessName, :fName, :lName, :mail, :tel, :pass)";


                $stm_insert = $pdo -> prepare($sql);
                $stm_insert -> execute  (['uName' => $_POST['username'],
                    'businessName' => $_POST['business'],
                    'fName' => $_POST['firstName'],
                    'lName' => $_POST['lastName'],
                    'mail' =>  $_POST['email'], 
                    'tel' => $_POST['phone'],
                    'pass' =>  crypt($_POST['password'], "salt")
                     ]);
                echo "Registrerad";
            }
        }
    }
}else {
    echo "lösenord matchar ej";
}

}


?>


</body>
</html>