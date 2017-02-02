<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>TaggaDigTest</title>
    <style>
        body {
            background-color: beige;
        }
        table, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php
            include_once('database.php');
    ?>
            <form action="delete.php" method="post">
                <input type="text" name="username" placeholder="Användarnamn"><br>
                <input type="text" name="business" placeholder="Företag"><br>
                <input type="text" name="firstName" placeholder="Namn"><br>
                <input type="text" name="lastName" placeholder="Efternamn"><br>
                <input type="text" name="email" placeholder="Email"><br>
                <input type="text" name="phone" placeholder="Telefonummer"><br>
                <input type="text" name="password" placeholder="lösenord"><br>
                <button type="submit">Submit</button>
            </form>
            
            <?php
            if (isset($_POST['username'])) {
                    $insertStm = $pdo->prepare("INSERT INTO `members` (`username`, `business`, `firstName`, `lastName`, `email`, `phone`, `password`)
            VALUES(:uName, :bName, :fName,  :lName, :mail, :phoneNumb, :pass )");
                    $insertStm->execute(['uName' => $_POST['username'], 'bName' => $_POST['business'], 'fName' => $_POST['firstName'], 'lName' => $_POST['lastName'], 'mail' => $_POST['email'], 'phoneNumb' => $_POST['phone'], 'pass' => $_POST['password']]);
                    echo "Du har lagt in en order!";
                }

            
            ?>
            <?php
            if (isset($_POST['id'])) {
                $deleteStm = $pdo->prepare("DELETE FROM `members` WHERE `id` = :id");
                $deleteStm->execute(['id' => $_POST['id']]);
            }
            $stm_select = $pdo->prepare('SELECT * FROM `members`');
            $stm_select->execute([]);
            echo "<table>
            <tr>
                <th>username</th>
                <th>business</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>email</th>
                <th>phonumber</th>
            </tr>";
            foreach( $stm_select as $row ) {
                $id = $row['id'];
                $username = $row['username'];
                $businessName = $row['business'];
                $firstName = $row['firstName'];
                $lastName = $row['lastName'];
                $email = $row['email'];
                $phoneNumber = $row['phone'];
                $password = $row['password'];
                echo    "<tr>
                <td>$username</td>
                <td>$businessName</td>
                <td>$firstName</td>
                <td>$lastName</td>
                <td>$email</td>
                <td>$phoneNumber</td>
                <td><form action=\"delete.php\" method=\"post\">
                    <input type=\"hidden\" name=\"id\" value=\"$id\">
                    <input type=\"submit\" name=\"submit\" value=\"Delete\">
                </td>
            </tr>";
        }
        echo "</table>";
        ?>
    </body>
    </html>