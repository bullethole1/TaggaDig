<?php
require 'session.php';
require 'database.php';
user_login_failed();

if (isset($_POST['update'])) {
    if (isset($_SESSION['userid'])) {

        if (isset($_POST['business']) && !empty($_POST['business']) && $_POST['firstName'] && !empty($_POST['firstName'])
            && $_POST['lastName'] && !empty($_POST['lastName']) && $_POST['email'] && !empty($_POST['email'])
            && $_POST['phone'] && !empty($_POST['phone']) && $_POST['password'] && !empty($_POST['password'])
        ) {
            $updateStm = $pdo->prepare("UPDATE `members` SET `business` = :business, `firstName` = :firstName,
            `lastName` = :lastName, `email` = :email, `phone` = :phone, `password` = :password  WHERE `id`= :id");
            $updateStm->execute(['business' => $_POST['business'], 'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'], 'email' => $_POST['email'], 'phone' => $_POST['phone'],
                'password' => $_POST['password'], 'id' => $_SESSION['userid']]);
        }
    }

}