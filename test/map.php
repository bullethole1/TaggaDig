<!-- <!DOCTYPE>
<html>
 <head>
   
    
     <meta charset="utf-8">
     <title>Map php</title>
     <style>
   
 
   .border{border:0.5px solid grey;
   width:250px;
   float:left;
   display:inline;
   margin-right:10px;
   
   }

   h3{
       font-size:1.0em;
       font-family:verdana;
   }
	.red{
			background-color: red;
            color:white;
		}
   .green{
       background-color:green;
       color:white;
   }

   
   </style>
 </head>   
  <body>  
    <?php

    	$dbHost = 'localhost';
		$db = 'taggaDig';
		$dbUser = 'root';
		$password = 'root';
		$charset = 'utf8';
		$dsn = "mysql:host=$dbHost;dbname=$db;charset=$charset";
		$options = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
					PDO::ATTR_EMULATE_PREPARES   => false  ];

	try {
    	$pdo = new PDO($dsn, $dbUser, $password, $options);
	} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>
<form action="#" method="POST">
    <input type="submit" name="Centralstationen" value="Centralstationen"></input>

    <input type="submit" name="Brunnsparken" value="Brunnsparken"></input>

    <input type="submit" name="ÖstraHamngatan" value="Östra Hamngatan"></input>

    <input type="submit" name="Grönsakstorget" value="Grönsakstorget"></input>

    <input type="submit" name="Korsvägen" value="Korsvägen"></input>

    <input type="submit" name="Kungsportsplatsen" value="Kungsportsplatsen"></input>

    <input type="submit" name="Götaplatsen" value="Götaplatsen"></input>

    <input type="submit" name="Vasastan" value="Vasastan"></input>

    <input type="submit" name="Svingeln" value="Svingeln"></input>
</form>

<?php 
if(isset($_POST['Brunnsparken'])){ 
    $stm = $pdo->prepare('SELECT `model`,`area`, `size ( " )`,`reach`, `price`, `status`, `GPS` FROM `products` WHERE `area` = "Brunnsparken"
    GROUP BY `status`');
            $stm -> execute([]);}

else if (isset($_POST['Centralstationen'])){ 
    $stm = $pdo->prepare('SELECT `model`,`area`, `size ( " )`,`reach`, `price`, `status`, `GPS` FROM `products` WHERE `area` = "Centralstationen" 
    GROUP BY `status` ');
            $stm -> execute([]);} 

else if (isset($_POST['ÖstraHamngatan'])){ 
    $stm = $pdo->prepare('SELECT `model`,`area`, `size ( " )`,`reach`, `price`, `status`, `GPS` FROM `products` WHERE `area` = "Östra Hamngatan" 
    GROUP BY `status` ');
            $stm -> execute([]);}  

else if (isset($_POST['Grönsakstorget'])){ 
    $stm = $pdo->prepare('SELECT `model`,`area`, `size ( " )`,`reach`, `price`, `status`, `GPS` FROM `products` WHERE `area` = "Grönsakstorget"
    GROUP BY `status` ');
            $stm -> execute([]);}  

else if (isset($_POST['Korsvägen'])){ 
    $stm = $pdo->prepare('SELECT `model`,`area`, `size ( " )`,`reach`, `price`, `status`, `GPS` FROM `products` WHERE `area` = "Korsvägen" 
    GROUP BY `status` ');
            $stm -> execute([]);} 

else if (isset($_POST['Kungsportsplatsen'])){ 
    $stm = $pdo->prepare('SELECT `model`,`area`, `size ( " )`,`reach`, `price`, `status`, `GPS` FROM `products` WHERE `area` = "Kungsportsplatsen"
    GROUP BY `status` ');
            $stm -> execute([]);} 

else if (isset($_POST['Götaplatsen'])){ 
    $stm = $pdo->prepare('SELECT `model`,`area`, `size ( " )`,`reach`, `price`, `status`, `GPS` FROM `products` WHERE `area` = "Götaplatsen"
    GROUP BY `status` ');
            $stm -> execute([]);}                                                                      

else if (isset($_POST['Vasastan'])){ 
    $stm = $pdo->prepare('SELECT `model`,`area`, `size ( " )`,`reach`, `price`, `status`, `GPS` FROM `products` WHERE `area` = "Vasastan"
    GROUP BY `status` ');
            $stm -> execute([]);}

else if (isset($_POST['Svingeln'])){ 
    $stm = $pdo->prepare('SELECT `model`,`area`, `size ( " )`,`reach`, `price`, `status`, `GPS` FROM `products` WHERE `area` = "Svingeln"
    GROUP BY `status` ');
            $stm -> execute([]);}                       
     
foreach($stm as $row ) {
    echo "<div class=\"border\">";
    $status = $row['status'];
    $place = $row['GPS'];
    $area = $row['area'];
    $model = $row['model'];
    $size = $row['size ( " )'];
    $reach = $row['reach'];
    $price = $row['price'];
	echo "<h3>Område:$area</h3>";  
	echo "<h3>Modell:$model</h3>";  
	echo "<h3>Storlek:$size\"</h3>";
	echo "<h3>Räckvidd:$reach</h3>";
	echo "<h3>Pris:$price:-</h3>";

  if($status == true) { 
	echo "<h3 class=\"green\">Ledig</h3>";

  }else 
	{echo "<h3 class=\"red\">Upptagen</h3>";  
        }
    
    echo "</div>";        
        
}
    echo "<iframe src=\"$place\" width=\"100%\" height=\"450\" frameborder=\"0\" allowfullscreen></iframe>";
   
  
?>


    </body>
    </html> -->