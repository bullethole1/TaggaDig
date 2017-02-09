<?php

include_once 'database.php';
require_once "session.php";
?>
<!--<h2> Användare </h2> -->    

<?php
// hämta alla användare
$sql = "SELECT  `id`, `business`, `firstName`, `lastName`, `email` FROM members WHERE `id` > 0";
$row=$pdo->prepare($sql);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);
$main = array('data'=>$result);

echo json_encode($main); 
?> 
  
<!--<h2> Ordrar </h2> -->
<?php
// hämta alla ordrar

$sql_order = "SELECT *  FROM `orders` WHERE `orderNr` > 0 ";
$row = $pdo->prepare($sql_order);
$row->execute();
$resultat=$row->fetchAll(PDO::FETCH_ASSOC);
$main_order = array('data'=> $resultat);
echo json_encode($main_order);


if(isset($_POST['delete_order'])){
    $sql = "DELETE FROM `orders`  WHERE `orders` . `orderNr` = :id";
$stm_delete = $pdo->prepare($sql);
$stm_delete->execute(array ('id' => ($_POST['delete_order'] ) ));
// echo "tagit bort";
}


if(isset($_POST['delete'])){
    $sql = "DELETE FROM `members`  WHERE `members` . `id` = :id_number";
$stm_delete = $pdo->prepare($sql);
$stm_delete->execute(array ('id_number' => ($_POST['delete'] ) ));
// echo "tagit bort";
}


?>