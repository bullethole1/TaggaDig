<?php
require 'session.php';
require 'database.php';
user_login_failed();

if (!isset($_FILES['upFile']['tmp_name'])) {
    echo "";
} else {
    $image = base64_encode(@file_get_contents($_FILES['upFile']['tmp_name']));
    $image_size = @getimagesize($_FILES['upFile']['tmp_name']);
    if ($image_size == FALSE) {

    } else {
        if (isset($_POST['update'])) {
            //spara ner i sessions
            $_SESSION['objekt']['area'] = $_POST['area'];
            $_SESSION['objekt']['model'] = $_POST['model'];
            $_SESSION['objekt']['firstName'] = $_POST['firstName'];
            $_SESSION['objekt']['lastName'] = $_POST['lastName'];
            $_SESSION['objekt']['email'] = $_POST['email'];
            $_SESSION['objekt']['phoneNumber'] = $_POST['phoneNumber'];
            $_SESSION['objekt']['businessName'] = $_POST['businessName'];
            $_SESSION['objekt']['description'] = $_POST['description'];
            $_SESSION['objekt']['upFile'] = $_FILES['upFile'];
            //hämta info ifrån produkter och pris
            $sql_order = "SELECT `price`, `area`, `model`  FROM `products` WHERE `area` = :arean AND `status` = 1";
            $row = $pdo->prepare($sql_order);
            $row->execute(['arean' => $_POST['area']]);
            $result = $row->fetchAll(\PDO::FETCH_ASSOC);
            $main_order = array('data' => $result);
            echo json_encode($main_order);
        }
    }
    if (isset($_POST['update'])) {
        $stmt_status = $pdo->prepare('UPDATE `products` SET `status` = 0  WHERE `area` = :arean');
        $stmt_status->execute(['arean' => $_POST['area']]);
    }

    $sql = "INSERT INTO `orders` (`area`, `model`, `firstName`, `lastName`, `email`, `phoneNumber`, `businessName`, `description`, `upFile`, `member_id`)\r\n            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stm_insert = $pdo->prepare($sql);
    $stm_insert->bindParam(1, $_SESSION['objekt']['area']);
    $stm_insert->bindParam(2, $_SESSION['objekt']['model']);
    $stm_insert->bindParam(3, $_SESSION['objekt']['firstName']);
    $stm_insert->bindParam(4, $_SESSION['objekt']['lastName']);
    $stm_insert->bindParam(5, $_SESSION['objekt']['email']);
    $stm_insert->bindParam(6, $_SESSION['objekt']['phoneNumber']);
    $stm_insert->bindParam(7, $_SESSION['objekt']['businessName']);
    $stm_insert->bindParam(8, $_SESSION['objekt']['description']);
    $stm_insert->bindParam(9, $image, \PDO::PARAM_LOB);
    $stm_insert->bindParam(10, $_SESSION['userid']);
    $stm_insert->execute();
    $lastid = $pdo->lastInsertId();
}

// hämta area
$sql_area = "SELECT `area`, `id` FROM `products` WHERE `status` = 1";
$row = $pdo->prepare($sql_area);
$row->execute();
$result = $row->fetchAll(\PDO::FETCH_ASSOC);
$main_area = array('data' => $result);
echo json_encode($main_area);

// hämta modelltyper från databas
$sql_model = "SELECT`model`  FROM `products` GROUP BY `model` ";
$row = $pdo->prepare($sql_model);
$row->execute();
$result = $row->fetchAll(\PDO::FETCH_ASSOC);
$main_model = array('data' => $result);
echo json_encode($main_model);