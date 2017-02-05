<?php 
    
    include_once('database.php');
    require_once("session.php"); 
    failed();     // kom inte åt försen inlogg

    

        if(isset ($_POST['update'])){    // spara ner inputsen i sessions så att de kan $_POST:as en gång till när man trycker på bekräfta

            $_SESSION['objekt']['area'] = $_POST['area'];
            $_SESSION['objekt']['firstName'] = $_POST['firstName'];
            $_SESSION['objekt']['lastName'] = $_POST['lastName'];
            $_SESSION['objekt']['email'] = $_POST['email'];
            $_SESSION['objekt']['phoneNumber'] = $_POST['phoneNumber'];
            $_SESSION['objekt']['businessName'] = $_POST['businessName'];
            $_SESSION['objekt']['description'] = $_POST['description'];
            $_SESSION['objekt']['upFile'] = $_POST['upFile'];


// // bildfilen
// $file = $_FILES['upFile']['tmp_name'];

// if(!isset($file)){
//     echo "Välj en fil.";
// }else{
// $image = addslashes( file_get_contents( $_FILES['upFile']['tmp_name']));
// $image_name =addslashes( $_FILES['upFile']['name']);
// $image_size = getimagesize($_FILES['upFile']['tmp_name']);

// if($image_size == FALSE){
//     echo "detta är ingen bild";
// }else{
//   if  (!$sql_image = ("INSERT INTO `orders`  VALUES ('', '$image_name', '$image')"));{
//       echo "Problem att ladda upp fil";
//   }else {
//       $lastid = mysql_insert_id();
//       echo "bild uppladdad <img src=boka.php?id=1>"; 
//   }
          
// }

// }

// hämta det man har fyllt i till bekräfta knappen
    $sql = "SELECT *  FROM `products` WHERE `area` = :arean";
    $stm_price = $pdo -> prepare($sql); 
    $stm_price -> execute ([ 'arean' => $_POST['area'] ]);
    foreach($stm_price as $row){
        $price = $row['price'];
        $area = $row['area'];
    echo "Pris: $price<br>";
    echo "Område: $area<br>";
    echo "<form action=\"#\" method=\"POST\">
<button type=\"submit\" name=\"confirm\"> Bekräfta </button>
</form>";
    }  

        }
        
//när man trycker på bekräfta skapa denna ordern
if(isset($_POST['confirm'])){

            $sql = "INSERT INTO `orders` (`area`, `firstName`, `lastName`, `email`, `phoneNumber`, `businessName`, `description`, `upFile`)
            VALUES(:arean, :fName, :lName, :mail,  :tel, :business, :descriptionText, :files )";
            $stm_insert = $pdo -> prepare($sql);
            $stm_insert -> execute([
                'arean' => $_SESSION['objekt']['area'],
                'fName' =>  $_SESSION['objekt']['firstName'],
                'lName' =>$_SESSION['objekt']['lastName'],
                'mail' =>  $_SESSION['objekt']['email'],
                'tel' =>  $_SESSION['objekt']['phoneNumber'],
                'business' =>  $_SESSION['objekt']['businessName'],
                'descriptionText' => $_SESSION['objekt']['description'],
                'files' =>    $_SESSION['objekt']['upFile'] ]);
            
        }        



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<form action="#" method="POST" >
<input list="areas" name="area" value="" placeholder="Område" /><br>
  <datalist id="areas">
  <?php // hämta information från produkter till bokaformuläret
  $result = $pdo->query("SELECT `area` FROM `products` ");
   foreach($result as $row){
       $area = $row['area'];
         echo "<option value=\"$area\">";
   }

?>
  </datalist> 
 <input type="text" name="firstName" value="" placeholder="Namn" /><br>
 <input type="text" name="lastName" value="" placeholder="Efternamn"/><br>
 <input type="text" name="email" value="" placeholder="E-post"/><br>
 <input type="text" name="phoneNumber" value="" placeholder="Telefon"/><br>
 <input type="text" name="businessName" value="" placeholder="Företag"/><br>
    <input type="text" name="description" value="" placeholder="Beskrivning"/><br>
  <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
<input type="file"  name="upFile" id="userfile"> </br>

   <button type="submit" name="update">Boka</button>
</form>
    <?php 






// if(isset($_FILES['upFile']) ){
//     $file = $_FILE['upFile'];
//     print_r($file);
// }

//     if ($_SERVER['REQUEST_METHOD'] == 'POST'){

//         $formArr = array('firstName', 'lastName', 'email', 'phoneNumber', 'businessName', 'description', 'upFile');
//         $error = false; 
//         foreach($formArr AS $row) { 
//           if(!isset($_POST[$row]) || empty($_POST[$row])) {
//             echo $row.' saknas<br />'; 
//             $error = true; 
//         }
//     }
//     $email = $_POST['email'];
// if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  
// } else {
  
//   echo("$email is not a valid email address");
//     die();
// }

    

// }

// if(isset ($_POST['area'])){
// $result_ = $pdo->query("SELECT `price` FROM `products` ");

//    foreach($result_ as $row){
//        $area = $row['price'];
//     echo $area;
//    }
// }

// if(isset ($_POST['update'])){
//     $sql = "INSERT INTO `orders` (`area`, `firstName`, `lastName`, `email`, `phoneNumber`, `businessName`, `description`, `upFile`)
//             VALUES(:arean, :fName, :lName, :mail,  :tel, :business, :descriptionText, :file )";
// $stm_insert = $pdo -> prepare($sql);
//             $stm_insert -> execute([
//                 'arean' => $_POST['area'],
//                 'fName' => $_POST['firstName'],
//                 'lName' => $_POST['lastName'],
//                 'mail' => $_POST['email'],
//                 'tel' => $_POST['phoneNumber'],
//                 'business' => $_POST['businessName'],
//                 'descriptionText' => $_POST['description'],
//                 'file' => $_POST['upFile'] ]);
            
//      }

?>

</body>
</html>