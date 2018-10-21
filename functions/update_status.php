<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$path = $_SERVER['DOCUMENT_ROOT'];
include($path."/giovision/include/db_conx.php");
include($path."/giovision/functions/sanitize.php");

function get_status_code($conn, $job_id, $job_type){

	$job_type_db = '';
	$job_id_db = '';
	$active_status_change = '';
    
    if($job_type == 'internal'){
    	$job_type_db = 'internal_jobs';
    	$job_id_db   = 'internal_job_id';

    } elseif ($job_type == 'external') {
       	$job_type_db  = 'external_jobs';
       	$job_id_db    = 'external_job_id';
    }

	$sql = "SELECT active FROM $job_type_db WHERE `$job_id_db` = '$job_id' LIMIT 1";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$active = $row["active"];

	if($active == '1'){
		$active_status_change = '0';

	} elseif ($active == '0') {
		$active_status_change = '1';
		
	}
	
	return $active_status_change;

}

if(isset($_POST) && !empty($_POST["input_job_id"]) && isset($_POST["input_job_id"]) && !empty($_POST["input_job_type"]) && isset($_POST["input_job_type"])){
	$job_type_db = '';
	$job_id_db = '';

	$job_id    = clean_input_db($conn,$_POST["input_job_id"]);
	$job_type  = clean_input_db($conn,$_POST["input_job_type"]);
	$new_active_status = get_status_code($conn, $job_id, $job_type)

	if($job_type == 'internal'){
		$job_type_db = 'internal_jobs';
		$job_id_db   = 'internal_job_id';

	} elseif ($job_type == 'external') {
	   	$job_type_db  = 'external_jobs';
	   	$job_id_db    = 'external_job_id';
	}

	$sql = "UPDATE $job_type_db SET `active`='$new_active_status' WHERE `$job_id_db` = '$job_id'";

	if($conn->query($sql) == TRUE){
        echo $new_active_status;
	} else {
         echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>