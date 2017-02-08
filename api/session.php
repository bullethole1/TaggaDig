<?php
session_start();

// om fel inlogg, skriv ut errormedd. 
function error_message(){

if(isset($_SESSION['message'])  ){
 $output = ($_SESSION['message']); 
$_SESSION['message'] = null;
return $output;
}

}


// OM man inte är inloggad skicka tillbaka till connect.php
function  failed(){
    if(!isset ($_SESSION['logged_in']) ){
        header("Location: connect.php");
        exit;
    }
}

function json($data) {
    header('Content-Type: application/json');
    echo json_encode($data);
}