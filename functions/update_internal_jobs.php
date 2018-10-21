<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$path = $_SERVER['DOCUMENT_ROOT'];
include($path."/giovision/include/db_conx.php");
include($path."/giovision/functions/sanitize.php");

function insert_spare_list($conn, $internal_job_id){
   $number = count($_POST["spares-input-i"]);  
    if($number > 0){  
       for($i=0; $i<$number; $i++){  
       	   $spare_name   = clean_input_db($conn, $_POST["spares-input-i"][$i]);
       	   $spare_qty    = clean_input_db($conn, $_POST["qty-input-i"][$i]);
       	   $spare_amount = clean_input_db($conn, $_POST["amount-input-i"][$i]);
           $sql = "INSERT INTO list_of_spares (internal_job_id, spares, quantity, amount) VALUES('$internal_job_id', '$spare_name', '$spare_qty', '$spare_amount')";  
           $conn->query($sql);
       } 
    }    
}

function delete_list_of_spares($conn, $internal_job_id){
	$sql = "DELETE FROM list_of_spares WHERE `internal_job_id` = '$internal_job_id'";
	$conn->query($sql);
}

if(isset($_POST) && !empty($_POST["in_id"]) && isset($_POST["in_id"])){
	$in_id       = clean_input_db($conn,$_POST["in_id"]);
	$article     = clean_input_db($conn,$_POST["article-input-i"]);
	$model_no    = clean_input_db($conn,$_POST["model-input-i"]);
	$fault       = clean_input_db($conn,$_POST["fault-input-i"]);
	$damages     = clean_input_db($conn,$_POST["damages-input-i"]);
	$description = clean_input_db($conn,$_POST["description-input-i"]);
	$aux_equip   = clean_input_db($conn,$_POST["aux-input-i"]);

	$sql = "UPDATE internal_jobs SET `article`='$article', `model_no`='$model_no', `fault`='$fault', `damages`='$damages', `$description`='$description', `aux_equip`='$aux_equip' WHERE 
	`internal_job_id` = '$in_id'";

	if($conn->query($sql) == TRUE){
		delete_list_of_spares($conn, $internal_job_id);
		insert_spare_list($conn, $internal_job_id);
		
        echo 'successful';
	} else {
         echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>