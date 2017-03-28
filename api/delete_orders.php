<?php
require 'session.php';
require 'database.php';

if (isset($_POST['delete_order'])) {
    $sql = "DELETE FROM `orders`  WHERE `orders` . `orderNr` = :id";
    $stm_delete = $pdo->prepare($sql);
    $stm_delete->execute(array('id' => ($_POST['delete_order'])));
}
if (isset($_POST['delete_order'])) {
    $stmt_status = $pdo->prepare('UPDATE `products` SET `status` = 1  WHERE `area` = :arean');
    $stmt_status->execute(['arean' => $_POST['area']]);
}