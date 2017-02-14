<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <form action="#" method="POST">
        
        <input type="text" name="business" value="" placeholder="Företag"/><br>
        <input type="text" name="firstName" value="" placeholder="Namn" /><br>
        <input type="text" name="lastName" value="" placeholder="Efternamn"/><br>
        <input type="text" name="email" value="" placeholder="E-post"/><br>
        <input type="text" name="phone" value="" placeholder="+46" /><br>
        <input type="password" name="password" value="" placeholder="Lösenord"/><br>
        <input type="password" name="passwordsecond" value="" placeholder="fyll i lösenord igen"/><br>
        <button type="submit">Submit</button>
    </form> 
<?php
include_once'database.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $formArr = array('business', 'firstName', 'lastName', 'email', 'phone', 'password' );
        $error = false; 
        foreach($formArr AS $row) { 
          if(!isset($_POST[$row]) || empty($_POST[$row])) {
            // echo $row.' saknas<br />'; 
            $error = true; 
        }
    }


$email = $_POST['email'];
if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  
} else {
  
//   echo("$email is not a valid email address");
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
                echo json_encode(FALSE);
            }else{
                $sql = "INSERT INTO `members` (`business`, `firstName`, `lastName`, `email`, `phone`, `password`, `salt`, `user_type`)
                VALUES( :businessName, :fName, :lName, :mail, :tel, :pass, :salt, '1')";

	function mt_rand_str ($l, $c = 'abcdefghiJKkLmnopQRStuVwxyz1234567890') {
		    for ($s = '', $cl = strlen($c)-1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i);
		    return $s;
		}
        $salt = mt_rand_str(31); 
                $stm_insert = $pdo -> prepare($sql);
                $stm_insert -> execute  ([
                    'businessName' => $_POST['business'],
                    'fName' => $_POST['firstName'],
                    'lName' => $_POST['lastName'],
                    'mail' =>  $_POST['email'], 
                    'tel' => $_POST['phone'],
                    'pass' =>  crypt($_POST['password'], $salt),
                    'salt' => $salt  ]);
                echo json_encode(TRUE);
            }
        }
    }
}else {
    echo json_encode(FALSE);
}

}


?>


</body>
</html>