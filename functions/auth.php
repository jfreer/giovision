<?php
session_name("Giovision");
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$path = $_SERVER['DOCUMENT_ROOT'];
include($path."/giovision/include/db_conx.php");
include($path."/giovision/functions/sanitize.php");

if(isset($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"])){

	$username = clean_input_db($conn, $_POST["username"]);
	$password = clean_input_db($conn, $_POST["password"]);

	$salted = "SobHtXGkh5MtfJOFdUkRam7bm4PrLdsY".$password."OYfKd8Py8jQU9x0IcGp8rp3JeskeO0mo";

	$hashed = hash('sha512', $salted);

	$sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$hashed'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$_SESSION['auth'] = TRUE;
			if(clean_input($row['admin']) == '1'){
               	$_SESSION['isAdmin']  = TRUE;
			} elseif (clean_input($row['admin']) == '0'){
			    $_SESSION['isAdmin']  = FALSE;	
			} 
	     	$_SESSION['username'] = clean_input($row['username']);
	     	$_SESSION['name'] = clean_input($row['name']);
	    }
	    echo "successful";
	} else {
		echo "The Username Or Password Is Incorrect Please Try Again.";
	}

} else {
	echo "Please Enter A Username And Password.";
}

?>