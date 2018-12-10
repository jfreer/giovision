<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$path = $_SERVER['DOCUMENT_ROOT'];
include($path."/giovision/include/db_conx.php");
include($path."/giovision/functions/sanitize.php");

function fetch_spares_list($conn, $job_id){
  $list_array = array();
  $sql = "SELECT * FROM `list_of_spares_external` WHERE `external_job_id` = '$job_id'";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()){
     array_push($list_array,json_encode($row));
  }
  return $list_array;
}

if(isset($_POST["ex_id"]) && !empty($_POST["ex_id"])){
	$external_id = clean_input($_POST["ex_id"]);
	$sql = "SELECT * FROM `external_jobs` WHERE `external_job_id` = '$external_id' LIMIT 1";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$row["list_of_spares"] = fetch_spares_list($conn, $external_id);
	echo json_encode($row); 
}
?>