<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_name("Giovision");
    session_start();
}

if(!isset($_SESSION['auth'])){ header('Location: login.php'); die();}

?>