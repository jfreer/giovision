<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$path = $_SERVER['DOCUMENT_ROOT'];
include($path."/giovision/include/db_conx.php");
include($path."/giovision/functions/sanitize.php");

if(isset($_POST)){
	$cust_id             = bin2hex(random_bytes(16));
	$name                = clean_input_db($conn,$_POST["name-input"]);
	$residential_address = clean_input_db($conn,$_POST["residential-input"]);
	$postal_address      = clean_input_db($conn,$_POST["postal-input"]);
	$tel_no              = clean_input_db($conn,$_POST["tel-input"]);
	$cell_no             = clean_input_db($conn,$_POST["cell-input"]);
	$pastel_no           = clean_input_db($conn,$_POST["pastel-input"]);
	$email               = clean_input_db($conn,$_POST["email-input"]);
	$payment_method      = clean_input_db($conn,$_POST["payment-input"]);
	$multichoice_acc     = clean_input_db($conn,$_POST["multichoice-input"]);
	$sabc_license        = clean_input_db($conn,$_POST["sabc-input"]);
	$date                = date("Y-m-d H:i:s");

	$sql = "INSERT INTO customer (cust_id, name, residential_address, postal_address, tel_no, cell_no, pastel_no, email, payment_method, multichoice_acc, sabc_license, date)
	VALUES ('$cust_id', '$name', '$residential_address', '$postal_address', '$tel_no', '$cell_no', '$pastel_no', '$email', '$payment_method', '$multichoice_acc', '$sabc_license', '$date')";

	if ($conn->query($sql) === TRUE) {
	    echo 'successful,'.'<center><h1>Customer Added Successfully</h1><hr><br><a href="internal.php?cust='.$cust_id.'"><button class="au-btn au-btn-icon au-btn--blue"><i class="zmdi zmdi-plus"></i>Add Internal Job Card</button></a>&nbsp;&nbsp;&nbsp;<a href="external.php?cust='.$cust_id.'"><button class="au-btn au-btn-icon au-btn--blue"><i class="zmdi zmdi-plus"></i>Add External Job Card</button></a></center>';
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

}
?>