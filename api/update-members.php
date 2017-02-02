    <!DOCTYPE html>
  <?php
include_once('database.php');
?>  
<html>
    <head>
<meta charset="utf-8">
    </head>
    <body>
<form action="#" method="POST">
    <input type="text" name="id" value="" placeholder="id" /><br>
    <input type="text" name="username" value="" placeholder="Användarnamn" /><br>
    <input type="text" name="business" value="" placeholder="Företag"/><br>
    <input type="text" name="firstName" value="" placeholder="Namn" /><br>
    <input type="text" name="lastName" value="" placeholder="Efternamn"/><br>
    <input type="text" name="email" value="" placeholder="E-post"/><br>
    <input type="text" name="phone" value="" placeholder="Telefon" /><br>
    <input type="password" name="password" value="" placeholder="Lösenord"/><br>
    <input type="password" name="passwordsecond" value="" placeholder="fyll i lösenord igen"/><br>
    <button type="submit" name="update">Submit</button>
</form>


<?php

if(isset($_POST['update'])) {	
    
    
    if (isset($_POST['username'])&& strlen($_POST['username']) > 0) {
                    $updateStm = $pdo->prepare("UPDATE `members` SET `username` = :username WHERE `id`= :id");
                    $updateStm->execute(['username' => $_POST['username'], 'id' => $_POST['id']]);
                    echo "username uppdat.";
                    echo "<br>";
    }
    if (isset($_POST['business'])&& strlen($_POST['business']) > 0) {
                    $updateStm = $pdo->prepare("UPDATE `members` SET `business` = :business WHERE `id`= :id");
                    $updateStm->execute(['business' => $_POST['business'], 'id' => $_POST['id']]);
                    echo "business uppdat.";
                    echo "<br>";
                    
    } 
    if (isset($_POST['firstName']) && strlen($_POST['firstName']) > 0) {
                    $updateStm = $pdo->prepare("UPDATE `members` SET `firstName` = :firstName WHERE `id`= :id");
                    $updateStm->execute(['firstName' => $_POST['firstName'], 'id' => $_POST['id']]);
                    echo "firstname uppdat.";
                    echo "<br>";
    }

    if (isset($_POST['lastName']) && strlen($_POST['lastName']) > 0) {
                    $updateStm = $pdo->prepare("UPDATE `members` SET `lastName` = :lastName WHERE `id`= :id");
                    $updateStm->execute(['lastName' => $_POST['lastName'], 'id' => $_POST['id']]);
                    echo "lastname uppdat.";
                    echo "<br>";
                    

    }
    if (isset($_POST['email'])&& strlen($_POST['email']) > 0) {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
                    $updateStm = $pdo->prepare("UPDATE `members` SET `email` = :email WHERE `id`= :id");
                    $updateStm->execute(['email' => $_POST['email'], 'id' => $_POST['id']]);
                    echo "email uppdat.";
                    echo "<br>";
        }
                else {
                    echo $_POST['email'] . "is not a valid email address";
}     
                    
    }
    if (isset($_POST['phone'])&& strlen($_POST['phone']) > 0) {
                    $updateStm = $pdo->prepare("UPDATE `members` SET `phone` = :phone WHERE `id`= :id");
                    $updateStm->execute(['phone' => $_POST['phone'], 'id' => $_POST['id']]);
                    echo "phone uppdat.";
                    echo "<br>";
                    

    }
   

    if (isset($_POST['password'])&& strlen($_POST['password']) > 0) {
                        $updateStm = $pdo->prepare("UPDATE `members` SET `password` = :password WHERE `id`= :id");
                        $updateStm->execute(['password' => $_POST['password'], 'id' => $_POST['id']]);
                        echo "password uppdat.";
                    echo "<br>";
                        
    };
}
?>


 </body>
</html>