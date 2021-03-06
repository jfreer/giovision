<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$path = $_SERVER['DOCUMENT_ROOT'];
include($path."/giovision/include/db_conx.php");
include($path."/giovision/functions/sanitize.php");

function insert_spare_list($conn, $external_job_id){
   $number = count($_POST["spares-input"]);  
    if($number > 0){  
       for($i=0; $i<$number; $i++){  
       	   $spare_name   = clean_input_db($conn, $_POST["spares-input"][$i]);
       	   $spare_qty    = clean_input_db($conn, $_POST["qty-input"][$i]);
       	   $spare_amount = clean_input_db($conn, $_POST["amount-input"][$i]);
       	   if(!empty($spare_name) && !empty($spare_qty) && !empty($spare_amount)){
              $sql = "INSERT INTO list_of_spares_external (external_job_id, spares, quantity, amount) VALUES('$external_job_id', '$spare_name', '$spare_qty', '$spare_amount')";  
              $conn->query($sql);
       	   } 
       } 
    }    
}

function delete_list_of_spares($conn, $external_job_id){
	$sql = "DELETE FROM list_of_spares_external WHERE `external_job_id` = '$external_job_id'";
	$conn->query($sql);
}

if(isset($_POST) && !empty($_POST["ex_id"]) && isset($_POST["ex_id"])){
	$ex_id       = clean_input_db($conn,$_POST["ex_id"]);
	$invoice     = clean_input_db($conn,$_POST["e-invoice-input"]);
	$article     = clean_input_db($conn,$_POST["e-article-input"]);
	$model_no    = clean_input_db($conn,$_POST["e-model-input"]);
	$fault       = clean_input_db($conn,$_POST["e-fault-input"]);
	$damages     = clean_input_db($conn,$_POST["e-damages-input"]);
	$description = clean_input_db($conn,$_POST["e-description-input"]);
	$aux_equip   = clean_input_db($conn,$_POST["e-aux-input"]);

	$sql = "UPDATE external_jobs SET `article`='$article', `invoice`='$invoice', `model_no`='$model_no', `fault`='$fault', `damages`='$damages', `description`='$description', `aux_equip`='$aux_equip' WHERE `external_job_id` = '$ex_id'";

	if($conn->query($sql) == TRUE){
		delete_list_of_spares($conn, $ex_id);
		insert_spare_list($conn, $ex_id);
		
        echo 'successful';
	} else {
         echo $conn->error;
	}
}
?>