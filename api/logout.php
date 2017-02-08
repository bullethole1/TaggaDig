<?php 

require_once("session.php"); 
session_destroy();
    header('Refresh: 1;url=connect.php');
    // echo "Du är utloggad";



?>