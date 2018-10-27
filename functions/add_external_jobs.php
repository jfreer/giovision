<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$path = $_SERVER['DOCUMENT_ROOT'];
include($path."/giovision/include/db_conx.php");
include($path."/giovision/functions/sanitize.php");

if(isset($_POST)){
	$external_job_id     = bin2hex(random_bytes(16));
	$cust_id             = clean_input_db($conn,$_POST["customer-input"]);
	$invoice             = clean_input_db($conn,$_POST["invoice-input"]); 
	$description         = clean_input_db($conn,$_POST["description-input"]);
	$date                = date("Y-m-d H:i:s");

	$sql = "INSERT INTO external_jobs (external_job_id, cust_id, invoice, description, date) VALUES ('$external_job_id', '$cust_id', '$invoice','$description', '$date')";

	if ($conn->query($sql) === TRUE) {
	    echo 'successful';
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

}
?>