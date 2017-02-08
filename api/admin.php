<?php

include_once 'database.php';
require_once "session.php";

echo "<h2> Användare </h2>";
$sql = "SELECT *  FROM `members` ";
$stm_member = $pdo->prepare($sql);
$stm_member->execute([]);
foreach ($stm_member as $row) {
   
    ?> 
    <form  action ="admin.php" method="POST">
     <button type="submit" name="delete" value="<?php  echo $row['id'] ?>"   >TA BORT</button>
     </form>
<?php 
    echo $row['id'] . " ."; 
    echo $row['username'] . " ";
    echo $row['business'] . " ";
    echo $row['firstName'] . " ";
    echo $row['lastName'] . " ";
    echo $row['email'] . " ";
    echo "<br>";
    echo "<br>";
}

echo "<h2> Ordrar </h2>";
$sql = "SELECT *  FROM `orders` ";
$stm_order = $pdo->prepare($sql);
$stm_order->execute([]);
foreach ($stm_order as $row) {
    
    ?> 
    <form  action ="admin.php" method="POST">
     <button type="submit" name="delete_order" value="<?php echo $row['orderNr'] ?>">TA BORT</button>
     </form>
<?php 
    echo $row['orderNr'] . " .";
    echo $row['area'] . " ";
    echo $row['model'] . " ";
    echo $row['firstName'] . " ";
    echo $row['lastName'] . " ";
    echo $row['email'] . " ";
    echo $row['phoneNumber'] . " ";
    echo $row['businessName'] . " ";
    echo $row['description'] . " ";

    echo "<br>";
    echo "<br>";
}


if(isset($_POST['delete_order'])){
    $sql = "DELETE FROM `orders`  WHERE `orders` . `orderNr` = :id";
$stm_delete = $pdo->prepare($sql);
$stm_delete->execute(array ('id' => ($_POST['delete_order'] ) ));
echo "tagit bort";
}


if(isset($_POST['delete'])){
    $sql = "DELETE FROM `members`  WHERE `members` . `id` = :id_number";
$stm_delete = $pdo->prepare($sql);
$stm_delete->execute(array ('id_number' => ($_POST['delete'] ) ));
echo "tagit bort";
}


?>