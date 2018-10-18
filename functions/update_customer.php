<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$path = $_SERVER['DOCUMENT_ROOT'];
include($path."/giovision/include/db_conx.php");
include($path."/giovision/functions/sanitize.php");

if(isset($_POST) && !empty($_POST["cust_id"]) && isset($_POST["cust_id"])){
	$cust_id             = clean_input_db($conn,$_POST["cust_id"]);
	$name                = clean_input_db($conn,$_POST["name-input-u"]);
	$residential_address = clean_input_db($conn,$_POST["residential-input-u"]);
	$postal_address      = clean_input_db($conn,$_POST["postal-input-u"]);
	$tel_no              = clean_input_db($conn,$_POST["tel-input-u"]);
	$cell_no             = clean_input_db($conn,$_POST["cell-input-u"]);
	$email               = clean_input_db($conn,$_POST["email-input-u"]);
	$payment_method      = clean_input_db($conn,$_POST["payment-input-u"]);
	$multichoice_acc     = clean_input_db($conn,$_POST["multichoice-input-u"]);
	$sabc_license        = clean_input_db($conn,$_POST["sabc-input-u"]);

	$sql = "UPDATE customer SET `name`='$name', `residential_address`='$residential_address', `postal_address`='$postal_address', `tel_no`='$tel_no', `cell_no`='$cell_no', `email`='$email',
	`payment_method`='$payment_method', `multichoice_acc`='$multichoice_acc', `sabc_license`='$sabc_license' WHERE `cust_id` = '$cust_id'";

	if($conn->query($sql) == TRUE){
        echo 'successful';
	} else {
         echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>