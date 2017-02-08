<?php 
    //ob_start();
    include_once('database.php');
    require_once("session.php"); 
    failed();     // kom inte åt försen inlogg
  

if(!isset($_FILES['upFile']['tmp_name']) )
    echo "";
else
{
  $image = base64_encode(@file_get_contents( $_FILES['upFile']['tmp_name']));
//   $image_name = addslashes($_FILES['upFile']['name']);  
  $image_size = @getimagesize($_FILES['upFile']['tmp_name']);

  if($image_size == FALSE)
  echo "Försök igen";

else{ if(isset ($_POST['update'])){ //spara ner i sessions
            
            $_SESSION['objekt']['area'] = $_POST['area'];
            $_SESSION['objekt']['model'] = $_POST['model'];
            $_SESSION['objekt']['firstName'] = $_POST['firstName'];
            $_SESSION['objekt']['lastName'] = $_POST['lastName'];
            $_SESSION['objekt']['email'] = $_POST['email'];
            $_SESSION['objekt']['phoneNumber'] = $_POST['phoneNumber'];
            $_SESSION['objekt']['businessName'] = $_POST['businessName'];
            $_SESSION['objekt']['description'] = $_POST['description'];
            $_SESSION['objekt']['upFile'] = $_FILES['upFile'];


 // $stmt_status = $pdo->prepare('UPDATE `products` SET `status` = 0  WHERE `id` = :uid');
 // $stmt_status->execute(['uid' => $_POST['area']]);
    

    //hämta info ifrån produkter och pris
    $sql = "SELECT *  FROM `products` WHERE `area` = :arean AND `status` = 1";
    $stm_price = $pdo -> prepare($sql); 
    $stm_price -> execute ([ 'arean' => $_POST['area'] ]);
    foreach($stm_price as $row){
        $price = $row['price'];
        $area = $row['area'];
        $model = $row['model'];
    echo "Order: <br>";
    echo "Pris: $price<br>";
    echo "Område: $area<br>";
     echo "Model: $model<br>";
//     echo "<form action=\"#\" method=\"POST\">
// <button type=\"submit\" name=\"confirm\"> Bekräfta </button>
// </form>";

 
    }  
 }

// if(isset($_POST['confirm'])){

            $sql = "INSERT INTO `orders` (`area`, `model`, `firstName`, `lastName`, `email`, `phoneNumber`, `businessName`, `description`, `upFile`)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stm_insert = $pdo -> prepare($sql);
            $stm_insert->bindParam(1, $_SESSION['objekt']['area']);
            $stm_insert->bindParam(2, $_SESSION['objekt']['model']);
            $stm_insert->bindParam(3, $_SESSION['objekt']['firstName']);
            $stm_insert->bindParam(4, $_SESSION['objekt']['lastName']);
            $stm_insert->bindParam(5, $_SESSION['objekt']['email']);
            $stm_insert->bindParam(6, $_SESSION['objekt']['phoneNumber']);
            $stm_insert->bindParam(7, $_SESSION['objekt']['businessName']);
            $stm_insert->bindParam(8, $_SESSION['objekt']['description']);
            $stm_insert->bindParam(9, $image, PDO::PARAM_LOB);

            $stm_insert->execute();
           $lastid = $pdo->lastInsertId();
   echo " <p> Din bild: </p> <img src=get.php?id=$lastid width='200px'>";   

        // }   

}
}
     
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<form action="#" method="POST" enctype="multipart/form-data">
<input id="areas" name="area" value="" placeholder="Område" /><br>
 <datalist id="areas"> 
  <?php
  $result = $pdo->query("SELECT `area`, `id` FROM `products`");
   foreach($result as $row){
       $area = $row['area'];
       $id = $row['id'];
         echo "<option value=\"$id\">$area</option>";
        
   }

?>
  </datalist>
  <input list="model" name="model" value="" placeholder="Model" /><br>
  <datalist id="model">
  <?php        $result = $pdo->query("SELECT `model` FROM `products` GROUP BY `model` ");
   foreach($result as $row){
       $model = $row['model'];
         echo "<option value=\"$model\">";
   }
   ?>
  </datalist>
 <input type="text" name="firstName" value="" placeholder="Namn" /><br>
 <input type="text" name="lastName" value="" placeholder="Efternamn"/><br>
 <input type="text" name="email" value="" placeholder="E-post"/><br>
 <input type="text" name="phoneNumber" value="" placeholder="Telefon"/><br>
 <input type="text" name="businessName" value="" placeholder="Företag"/><br>
    <input type="text" name="description" value="" placeholder="Beskrivning"/><br>
    <input type="file" name="upFile" value="" placeholder="Ladda up fil" /><br>

   <button type="submit" name="update">Boka</button>