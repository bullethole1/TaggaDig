<?php 
session_start();
session_destroy();
    header('Refresh: 1;url=connect.php');
    echo "Du är utloggad";



?>