<?php
require_once'session.php'; 
include_once'database.php';
failed();
?> 
<!--<!DOCTYPE html>
<html>
    <head>
<meta charset="utf-8">
    </head>
    <body>
    <form action="logout.php" method="POST">

    <button type="submit" name="">LOGGA UT</button>
</form>

<form action="#" method="POST">
    <input type="text" name="business" value="" placeholder="Företag"/><br>
    <input type="text" name="firstName" value="" placeholder="Namn" /><br>
    <input type="text" name="lastName" value="" placeholder="Efternamn"/><br>
    <input type="text" name="email" value="" placeholder="E-post"/><br>
    <input type="text" name="phone" value="" placeholder="Telefon" /><br>
    <input type="password" name="password" value="" placeholder="Lösenord"/><br>
    <input type="password" name="passwordsecond" value="" placeholder="fyll i lösenord igen"/><br>
    <button type="submit" name="update">Submit</button>
</form>-->


<?php
// UPPDATERA ANVÄNDARE
// $_SESSION['email'] = 'email';

//  var_dump($_SESSION['userid']);
// var_dump($_SESSION['mail']);

 
if(isset($_POST['update'])) {	
if(isset( $_SESSION['userid']) ){  

    if (isset($_POST['business'])&& strlen($_POST['business']) > 0) {
                    $updateStm = $pdo->prepare("UPDATE `members` SET `business` = :business WHERE `id`= :id");
                    $updateStm->execute(['business' => $_POST['business'], 'id' => $_SESSION['userid']]);
                    // echo "business uppdat.";
                    // echo "<br>";
                    
    } 
    if (isset($_POST['firstName']) && strlen($_POST['firstName']) > 0) {
                    $updateStm = $pdo->prepare("UPDATE `members` SET `firstName` = :firstName WHERE `id`= :id");
                    $updateStm->execute(['firstName' => $_POST['firstName'], 'id' => $_SESSION['userid']]);
                    // echo "firstname uppdat.";
                    // echo "<br>";
    }

    if (isset($_POST['lastName']) && strlen($_POST['lastName']) > 0) {
                    $updateStm = $pdo->prepare("UPDATE `members` SET `lastName` = :lastName WHERE `id`= :id");
                    $updateStm->execute(['lastName' => $_POST['lastName'], 'id' => $_SESSION['userid']]);
                    // echo "lastname uppdat.";
                    // echo "<br>";
                    

    }
    if (isset($_POST['email'])&& strlen($_POST['email']) > 0) {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
                    $updateStm = $pdo->prepare("UPDATE `members` SET `email` = :email WHERE `id`= :id");
                    $updateStm->execute(['email' => $_POST['email'], 'id' => $_SESSION['userid']]);
                    // echo "email uppdat.";
                    // echo "<br>";
        }
                else {
                    // echo $_POST['email'] . "is not a valid email address";
}     
                    
    }
    if (isset($_POST['phone'])&& strlen($_POST['phone']) > 0) {
                    $updateStm = $pdo->prepare("UPDATE `members` SET `phone` = :phone WHERE `id`= :id");
                    $updateStm->execute(['phone' => $_POST['phone'], 'id' => $_SESSION['userid']]);
                    // echo "phone uppdat.";
                    // echo "<br>";           

    }
   

    if (isset($_POST['password'])&& strlen($_POST['password']) > 0) {
                        $updateStm = $pdo->prepare("UPDATE `members` SET `password` = :password WHERE `id`= :id");
                        $updateStm->execute(['password' => $_POST['password'], 'id' => $_POST['update']]);
                    //     echo "password uppdat.";
                    // echo "<br>";
                        
    }
}

}

// //SE ANVÄNDARINFO
// $sql_user = "SELECT business, firstName, lastName, email, phone  FROM `members` WHERE `id` = {$_SESSION['userid']}  ";
// $row = $pdo->prepare($sql_user);
// $row->execute();
// $resultat=$row->fetchAll(PDO::FETCH_ASSOC);
// $main_user = array('data'=> $resultat);
// echo json_encode($main_user);


// //SE ORDER
// $sql_order = "SELECT *  FROM `orders` WHERE `member_id` = {$_SESSION['userid']}  ";
// $row = $pdo->prepare($sql_order);
// $row->execute();
// $resultat=$row->fetchAll(PDO::FETCH_ASSOC);
// $main_order = array('data'=> $resultat);
// echo json_encode($main_order);





?>
<!--<form action="#" method="POST">
<button type="submit" name="delete_order_member">delete</button>
</form>

 </body>
</html>-->