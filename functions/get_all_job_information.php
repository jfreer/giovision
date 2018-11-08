<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$path = $_SERVER['DOCUMENT_ROOT'];
include($path."/giovision/include/db_conx.php");
include($path."/giovision/functions/sanitize.php");

function get_customer_external_jobs($i, $conn, $cust_id, $name, $cell, $email){
	$response = "";
	$active_status = "";
    $sql = "SELECT * FROM `external_jobs` WHERE `cust_id` = '$cust_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id              = clean_input($row["id"]);
            $external_job_id = clean_input($row["external_job_id"]);
            $invoice         = clean_input($row["invoice"]);
            $active          = clean_input($row["active"]);
            $date            = clean_input($row["date"]);

            if ($active == '1') {
            	$active_status = '<span class="role admin" id="eb'.$i.'">In Progress</span>';
            } else {
            	$active_status = '<span class="role member" id="eb'.$i.'">Completed</span>';
            }

            $response .= '<tr>
                            <td style="vertical-align:middle">#E'.$id.'</td>            
				            <td id="ineb'.$i.'">#'.$invoice.'</td>
				            <td>
				                <div class="table-data__info">
				                    <h6>'.$name.'</h6>
				                    <span>
				                        <a href="#" style="color:blue;">'.$cell.'</a>
				                        <br>
				                        <a href="#">'.$email.'</a>
				                    </span>
				                </div>
				            </td>
				            <td>External Jobs</td>
				            <td id="teb'.$i.'">'.$active_status.'</td>
				            <td>'.$date.'</td>
				            <td>
				               <button type="button" class="btn btn-secondary edit-external" status-button="eb'.$i.'" cust="'.$cust_id.'" external="'.$external_job_id.'">View Job</button> 
				            </td>
				        </tr>';
            $i++;
        }
    }

    return $response;
}

function get_customer_internal_jobs($i, $conn, $cust_id, $name, $cell, $email){
	$response = "";
	$active_status = "";
    $sql = "SELECT * FROM `internal_jobs` WHERE `cust_id` = '$cust_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id              = clean_input($row["id"]);
            $internal_job_id = clean_input($row["internal_job_id"]);
            $invoice         = clean_input($row["invoice"]);
            $active          = clean_input($row["active"]);
            $date            = clean_input($row["date"]);

            if ($active == '1') {
            	$active_status = '<span class="role admin" id="ib'.$i.'">In Progress</span>';
            } else {
            	$active_status = '<span class="role member" id="ib'.$i.'">Completed</span>';
            }

            $response .= '<tr>
                            <td style="vertical-align:middle">#I'.$id.'</td>            
				            <td id="inib'.$i.'">#'.$invoice.'</td>
				            <td>
				                <div class="table-data__info">
				                    <h6>'.$name.'</h6>
				                    <span>
				                        <a href="#" style="color:blue;">'.$cell.'</a>
				                        <br>
				                        <a href="#">'.$email.'</a>
				                    </span>
				                </div>
				            </td>
				            <td>Internal Jobs</td>
				            <td id="tib'.$i.'">'.$active_status.'</td>
				            <td>'.$date.'</td>
				            <td>
				              <button type="button" class="btn btn-secondary edit-internal" status-button="ib'.$i.'" cust="'.$cust_id.'" internal="'.$internal_job_id.'">View Job</button> 
				            </td>
				        </tr>';
		    $i++;
        }
    }

     return $response;
}


function get_total_no_of_jobs($conn, $cust_id){
    $sql = "SELECT COUNT(`id`) AS `total_jobs_internal` FROM `internal_jobs`";
    $result = $conn->query($sql);
    $row0 = $result->fetch_assoc();

    $sql = "SELECT COUNT(`id`) AS `total_jobs_external` FROM `external_jobs`";
    $result = $conn->query($sql);
    $row1 = $result->fetch_assoc();

    return $row0["total_jobs_internal"] + $row1["total_jobs_external"];
}

function get_total_no_active_interanl_jobs($conn, $cust_id){
    $sql = "SELECT COUNT(`id`) AS `total_jobs_internal` FROM `internal_jobs`";
    $result = $conn->query($sql);
    $row0 = $result->fetch_assoc();

    return $row0["total_jobs_internal"];
}

function get_total_no_active_external_jobs($conn, $cust_id){
    $sql = "SELECT COUNT(`id`) AS `total_jobs_external` FROM `external_jobs`";
    $result = $conn->query($sql);
    $row1 = $result->fetch_assoc();

    return $row1["total_jobs_external"];
}

function get_total_no_completed_jobs($conn, $cust_id){
    $sql = "SELECT COUNT(`id`) AS `total_jobs_internal` FROM `internal_jobs` WHERE  `active` = '0'";
    $result = $conn->query($sql);
    $row0 = $result->fetch_assoc();

    $sql = "SELECT COUNT(`id`) AS `total_jobs_external` FROM `external_jobs` WHERE  `active` = '0'";
    $result = $conn->query($sql);
    $row1 = $result->fetch_assoc();

    return $row0["total_jobs_internal"] + $row1["total_jobs_external"];
}


$view_all_jobs_table = "";
$sql = "SELECT * FROM `customer`";
$result = $conn->query($sql);
$i = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id                  = clean_input($row["id"]);
        $cust_id             = clean_input($row["cust_id"]);
        $name                = clean_input($row["name"]);
        $cell_no             = clean_input($row["cell_no"]);
        $email               = clean_input($row["email"]);
        $view_all_jobs_table .= get_customer_external_jobs($i, $conn, $cust_id, $name, $cell_no, $email);
        $i++;
        $view_all_jobs_table .= get_customer_internal_jobs($i, $conn, $cust_id, $name, $cell_no, $email);
    }
}

?>