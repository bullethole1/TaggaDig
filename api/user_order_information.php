<?php
require 'session.php';
require 'database.php';
user_login_failed();

$sql_order = "SELECT *  FROM `orders` WHERE `member_id` = {$_SESSION['userid']}  ";
show_user_order_information();