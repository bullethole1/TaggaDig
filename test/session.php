<?php
session_start();
include_once 'database.php';

// om fel inlogg, skriv ut errormedd. 
function error_message(){

if(isset($_SESSION['message'])  ){
 $output = ($_SESSION['message']); 
$_SESSION['message'] = null;
return $output;
}

}


// OM man inte är inloggad skicka tillbaka till start_page.php
function  failed(){
    if(!isset ($_SESSION['logged_in']) ){
        header("Location: start_page.php");
        exit;
    }
}


function admin(){
    if(!isset($_SESSION['usertype'])){
        header("Location: start_page.php");
        exit;
    }
}



// function json($data) {
//     header('Content-Type: application/json');
//     echo json_encode($data);
// }