<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$path = $_SERVER['DOCUMENT_ROOT'];
include($path."/giovision/include/db_conx.php");
include($path."/giovision/functions/sanitize.php");

function insert_spare_list($conn, $internal_job_id){
   $number = count($_POST["spares-input"]);  
    if($number > 0){  
       for($i=0; $i<$number; $i++){  
       	   $spare_name   = clean_input_db($conn, $_POST["spares-input"][$i]);
       	   $spare_qty    = clean_input_db($conn, $_POST["qty-input"][$i]);
       	   $spare_amount = clean_input_db($conn, $_POST["amount-input"][$i]);
       	   if(!empty($spare_name) && !empty($spare_qty) && !empty($spare_amount)){
	           $sql = "INSERT INTO list_of_spares (internal_job_id, spares, quantity, amount) VALUES('$internal_job_id', '$spare_name', '$spare_qty', '$spare_amount')";  
	           $conn->query($sql);
	       }
        } 
    }    
}

if(isset($_POST)){
	$internal_job_id = bin2hex(random_bytes(16));
	$cust_id         = clean_input_db($conn,$_POST["customer-input"]);
	$invoice         = clean_input_db($conn,$_POST["invoice-input"]);
	$article         = clean_input_db($conn,$_POST["article-input"]);
	$model_no        = clean_input_db($conn,$_POST["model-input"]);
	$fault           = clean_input_db($conn,$_POST["fault-input"]);
	$damages         = clean_input_db($conn,$_POST["damages-input"]);
	$description     = clean_input_db($conn,$_POST["description-input"]);
	$aux_equip       = clean_input_db($conn,$_POST["aux-input"]);
	$date            = date("Y-m-d H:i:s");

	insert_spare_list($conn, $internal_job_id);

	$sql = "INSERT INTO internal_jobs (internal_job_id, cust_id, invoice, article, model_no, fault, damages, description, aux_equip, date) 
	VALUES ('$internal_job_id', '$cust_id', '$invoice', '$article', '$model_no', '$fault', '$damages', '$description', '$aux_equip', '$date')";

	if ($conn->query($sql) === TRUE) {
	    echo 'successful';
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

}
?>