<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$path = $_SERVER['DOCUMENT_ROOT'];
include($path."/giovision/include/db_conx.php");
include($path."/giovision/functions/sanitize.php");

function get_payment_option($payment_method){
	$payment = "";

	if($payment_method == "card"){
		$payment .= '<div class="form-check">
	                   <div class="radio">
	                       <label for="radio1" class="form-check-label ">
	                           <input type="radio" id="radio1" name="payment-input" value="cash" class="form-check-input" disabled>Cash
	                       </label>
	                   </div>
	                   <div class="radio">
	                       <label for="radio2" class="form-check-label ">
	                           <input type="radio" id="radio2" name="payment-input" value="card" class="form-check-input" checked disabled>Card
	                       </label>
	                   </div>
	               </div>';
	} elseif($payment_method == "cash") {
		$payment .= '<div class="form-check">
	                   <div class="radio">
	                       <label for="radio1" class="form-check-label ">
	                           <input type="radio" id="radio1" name="payment-input" value="cash" class="form-check-input" checked disabled>Cash
	                       </label>
	                   </div>
	                   <div class="radio">
	                       <label for="radio2" class="form-check-label ">
	                           <input type="radio" id="radio2" name="payment-input" value="card" class="form-check-input" disabled>Card
	                       </label>
	                   </div>
	               </div>';
	}

	return $payment;
}

if(isset($_GET["cust"]) && !empty($_GET["cust"])){
	$customer_id = clean_input($_GET["cust"]);
	$sql = "SELECT * FROM `customer` WHERE `cust_id` = '$customer_id' LIMIT 1";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        $id                  = clean_input($row["id"]);
	        $cust_id             = clean_input($row["cust_id"]);
	        $name                = clean_input($row["name"]);
	        $residential_address = clean_input($row["residential_address"]);
	        $postal_address      = clean_input($row["postal_address"]);
	        $tel_no              = clean_input($row["tel_no"]);
	        $cell_no             = clean_input($row["cell_no"]);
	        $email               = clean_input($row["email"]);
	        $payment_method      = clean_input($row["payment_method"]);
	        $multichoice_acc     = clean_input($row["multichoice_acc"]);
	        $sabc_license        = clean_input($row["sabc_license"]);
	    }
	}
}
?>