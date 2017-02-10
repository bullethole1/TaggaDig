<?php
require_once "session.php";
include_once 'database.php';

if(isset($_POST['delete_order'])){
    $sql = "DELETE FROM `orders`  WHERE `orders` . `orderNr` = :id";
$stm_delete = $pdo->prepare($sql);
$stm_delete->execute(array ('id' => ($_POST['delete_order'] ) ));
// echo "tagit bort";
}

?>