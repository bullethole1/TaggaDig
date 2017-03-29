<?php 

require_once'session.php'; 
session_destroy();
    header('Refresh: 1;url=start_page.php');
    // echo "Du är utloggad";



?>