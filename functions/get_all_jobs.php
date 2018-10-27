<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$path = $_SERVER['DOCUMENT_ROOT'];
include($path."/giovision/include/db_conx.php");
include($path."/giovision/functions/sanitize.php");

function get_total_no_of_open_external_jobs($conn, $cust_id){
    $sql = "SELECT COUNT(`id`) AS `jobs` FROM `external_jobs` WHERE `cust_id` = '$cust_id' AND `active` = '1'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row["jobs"];

}

function get_total_no_of_open_internal_jobs($conn, $cust_id){
    $sql = "SELECT COUNT(`id`) AS `jobs` FROM `internal_jobs` WHERE `cust_id` = '$cust_id' AND `active` = '1'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row["jobs"];

}

function get_total_no_of_customers($conn){
    $sql = "SELECT COUNT(`id`) AS `customers` FROM `customer`";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row["customers"];

}

function get_total_no_of_internal_active_jobs($conn){
    $sql = "SELECT COUNT(`id`) AS `count_internal` FROM `internal_jobs` WHERE `active` = '1'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row["count_internal"];

}

function get_total_no_of_external_active_jobs($conn){
    $sql = "SELECT COUNT(`id`) AS `count_external` FROM `external_jobs` WHERE `active` = '1'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row["count_external"];

}

function get_total_no_of_jobs_completed($conn){
    $sql = "SELECT COUNT(`id`) AS `total_jobs_internal` FROM `internal_jobs` WHERE `active` = '0'";
    $result = $conn->query($sql);
    $row1 = $result->fetch_assoc();

    $sql = "SELECT COUNT(`id`) AS `total_jobs_external` FROM `external_jobs` WHERE `active` = '0'";
    $result = $conn->query($sql);
    $row0 = $result->fetch_assoc();

    return $row1["total_jobs_internal"] + $row0["total_jobs_external"];
}

function get_total_no_of_open_jobs($conn, $cust_id){
    return get_total_no_of_open_external_jobs($conn, $cust_id) + get_total_no_of_open_internal_jobs($conn, $cust_id);
}


function get_all_customer_information($conn){
    $response = "";

    $sql = "SELECT * FROM `customer` ORDER BY `id` DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id                  = clean_input($row["id"]);
            $cust_id             = clean_input($row["cust_id"]);
            $name                = clean_input($row["name"]);
            $residential_address = clean_input($row["residential_address"]);
            $email               = clean_input($row["email"]);
            $cell                = clean_input($row["cell_no"]);

            $response .= '<tr class="tr-shadow">
                            <td>#'.$id.'</td>
                            <td id="name'.$cust_id.'">'.$name.'</td>
                            <td id="email'.$cust_id.'">
                                <span class="block-email">'.$email.'</span>
                            </td>
                            <td class="desc" id="cell'.$cust_id.'">'.$cell.'</td>
                            <td id="address'.$cust_id.'"><span class="block-email">'.$residential_address.'</span></td>
                            <td class="desc">'.get_total_no_of_open_jobs($conn,$cust_id).'</td>
                            <td>
                                <div class="table-data-feature">
                                    <button class="item add_job" data-toggle="modal" id="'.$cust_id.'" data-placement="top" title="Add Job" data-target="#modal'.$id.'">
                                        <i class="zmdi zmdi-plus"></i>
                                    </button>
                                    <button class="item edit_data" id="'.$cust_id.'" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <a href="view-cust-jobs.php?cust='.$cust_id.'">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="View Jobs">
                                            <i class="zmdi zmdi-file-text"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>';

        }
    }

    return $response;
}
?>