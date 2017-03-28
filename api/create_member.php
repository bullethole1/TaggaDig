<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $formArr = array('business', 'firstName', 'lastName', 'email', 'phone', 'password');
    $error = false;

    foreach ($formArr AS $row) {
        if (!isset($_POST[$row]) || empty($_POST[$row])) {
            $error = true;
        }
    }

    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

        echo json_encode("$email is not a valid email address");
    } else {

        if ($_POST['password'] == $_POST['passwordsecond']) {
            if (!$error) {
                if (isset($_POST['email'])) {
                    $sql = "SELECT * FROM `members` WHERE email = :mail";
                    $stm_count = $pdo->prepare($sql);
                    $stm_count->execute(['mail' => $_POST['email']]);
                    $antal_rader = $stm_count->rowCount();
                    if ($antal_rader > 0) {
                        $sql = "INSERT INTO `members` (`business`, `firstName`, `lastName`, `email`, `phone`, `password`, `salt`, `user_type`)
                                VALUES( :businessName, :fName, :lName, :mail, :tel, :pass, :salt, '1')";

                        $salt = mt_rand_str(31);
                        $stm_insert = $pdo->prepare($sql);
                        $stm_insert->execute([
                            'businessName' => $_POST['business'],
                            'fName' => $_POST['firstName'],
                            'lName' => $_POST['lastName'],
                            'mail' => $_POST['email'],
                            'tel' => $_POST['phone'],
                            'pass' => crypt($_POST['password'], $salt),
                            'salt' => $salt]);
                        $password_true = "passwords match";
                        echo json_encode($password_true);
                    }
                }
            }
        } else {
            $password_false = "'passwords does not match'";
            echo json_encode($password_false);
        }
    }
}