<?php
require 'session.php';
require 'database.php';

if (isset($_POST['delete'])) {
    $sql = "DELETE FROM `members`  WHERE `members` . `id` = :id_number";
    $stm_delete = $pdo->prepare($sql);
    $stm_delete->execute(array('id_number' => ($_POST['delete'])));
}