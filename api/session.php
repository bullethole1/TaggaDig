<?php
session_start();
require 'database.php';

// om fel inlogg, skriv ut errormedd. 
function error_message()
{

    if (isset($_SESSION['message'])) {
        $output = ($_SESSION['message']);
        $_SESSION['message'] = null;
        return $output;
    }

}


// OM man inte är inloggad skicka tillbaka till start_page.php
function user_login_failed()
{
    if (!isset ($_SESSION['logged_in'])) {
        header("Location: start_page.php");
        exit;
    }
}


function admin_login_failed()
{
    if (!isset($_SESSION['usertype'])) {
        header("Location: start_page.php");
        exit;
    }
}