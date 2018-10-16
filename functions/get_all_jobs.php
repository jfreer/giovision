<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$path = $_SERVER['DOCUMENT_ROOT'];
include($path."/giovision/include/db_conx.php");
include($path."/giovision/functions/sanitize.php");

function get_total_no_of_open_external_jobs($conn, $cust_id){
    $sql = "SELECT COUNT(`id`) FROM `external_jobs` WHERE `cust_id` = '$cust_id'";
    $result = $conn->query($sql);
    return $result->num_rows;

}

function get_total_no_of_open_internal_jobs($conn, $cust_id){
    $sql = "SELECT COUNT(`id`) FROM `internal_jobs` WHERE `cust_id` = '$cust_id'";
    $result = $conn->query($sql);
    $result->num_rows;

}

function get_total_no_of_open_jobs($conn, $cust_id){
    return get_total_no_of_open_external_jobs($conn, $cust_id) + get_total_no_of_open_internal_jobs($conn, $cust_id);
}


function get_all_customer_information($conn){
    $response = "";
    $modals = "";

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
                            <td>'.$name.'</td>
                            <td>
                                <span class="block-email">'.$email.'</span>
                            </td>
                            <td class="desc">'.$cell.'</td>
                            <td><span class="block-email">'.$residential_address.'</span></td>
                            <td>
                              <a href="view_cust_jobs.php?cust='.$cust_id.'"><span class="status--process">'.get_total_no_of_open_jobs($conn,$cust_id).'</span></a>
                            </td>
                            <td>
                                <div class="table-data-feature">
                                    <button class="item" data-toggle="modal" data-placement="top" title="Add Job" data-target="#modal'.$id.'">
                                        <i class="zmdi zmdi-plus"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                        <i class="zmdi zmdi-more"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>';

            $modals .= '<div class="modal fade" id="modal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="largeModalLabel">Add New Job</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                       <center>
                                           <blockquote class="blockquote mt-3 text-center">
                                              <p>What Job Do You Want To Create For '.$name.'</p>
                                            </blockquote>
                                           <hr>
                                           <br>
                                           <a href="internal.php?cust='.$cust_id.'">
                                               <button class="au-btn au-btn-icon au-btn--blue"><i class="zmdi zmdi-plus"></i>Add Internal Job Card</button>
                                           </a>&nbsp;&nbsp;&nbsp;
                                           <a href="external.php?cust='.$cust_id.'">
                                               <button class="au-btn au-btn-icon au-btn--blue"><i class="zmdi zmdi-plus"></i>Add External Job Card</button>
                                           </a>
                                       </center>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>';
        }
    }

    return array($response, $modals);
}
?>