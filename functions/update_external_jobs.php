<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$path = $_SERVER['DOCUMENT_ROOT'];
include($path."/giovision/include/db_conx.php");
include($path."/giovision/functions/sanitize.php");

if(isset($_POST) && !empty($_POST["ex_id"]) && isset($_POST["ex_id"])){
	$ex_id       = clean_input_db($conn,$_POST["ex_id"]);
	$invoice     = clean_input_db($conn,$_POST["invoice-input-e"]);
	$description = clean_input_db($conn,$_POST["description-input-e"]);


	$sql = "UPDATE external_jobs SET `description`='$description', `invoice`='$invoice' WHERE `external_job_id` = '$ex_id'";

	if($conn->query($sql) == TRUE){
        echo 'successful';
	} else {
         echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>