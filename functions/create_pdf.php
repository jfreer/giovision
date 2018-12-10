<?php
ob_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$path = $_SERVER['DOCUMENT_ROOT'];
include($path."/giovision/include/db_conx.php");
include($path."/giovision/functions/sanitize.php");

function fetch_customer($conn, $cust_id){
	$response = "";
	$customer_id = clean_input($cust_id);
	$sql = "SELECT * FROM customer WHERE `cust_id` = '$customer_id' LIMIT 1";
  echo $sql;
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

	        $response .= '<h3 align="center">Customer Information</h3><br /><br /> 
                           <table border="1" cellspacing="0" cellpadding="5">
                           <tbody>
                             <tr>
                               <th scope="row"><strong>Name: </strong></th>
                               <td>'.$name.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>Email: </strong></th>
                               <td>'.$email.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>Cell No: </strong></th>
                               <td>'.$cell_no.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>Tel No: </strong></th>
                               <td>'.$tel_no.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>Residential Address: </strong></th>
                               <td>'.$residential_address.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>Postal Address: </strong></th>
                               <td>'.$postal_address.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>Payment Method: </strong></th>
                               <td>'.$payment_method.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>Multichoice Account No: </strong></th>
                               <td>'.$multichoice_acc.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>SABC License: </strong></th>
                               <td>'.$sabc_license.'</td>
                             </tr>
                           </tbody>
                       </table>';
  
	    }
	} 

	return $response;
}


function fetch_spares_list_internal($conn, $job_id){
  $response = "";
  $active_status = "";
    $sql = "SELECT * FROM `list_of_spares_internal` WHERE `internal_job_id` = '$job_id'";
    $result = $conn->query($sql);

    $response .= '<h3 align="center">List Of Spares</h3><br /><br /> 
                   <table border="1" cellspacing="0" cellpadding="5">
                   <thead>
                       <tr>
                           <th><strong>Spares</strong></th>
                           <th><strong>Quantity</strong></th>
                           <th><strong>Amount</strong></th>
                       </tr>
                   </thead>
                   <tbody>';

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id              = clean_input($row["id"]);
            $internal_job_id = clean_input($row["internal_job_id"]);
            $spares          = clean_input($row["spares"]);
            $quantity        = clean_input($row["quantity"]);
            $amount          = clean_input($row["amount"]);

            $response .= '<tr>
                            <td>'.$spares.'</td>
                            <td>'.$quantity.'</td>
                            <td>R'.$amount.'</td>
                         </tr>';
                          
        }
    }

    $response .=  '</tbody>
                </table>';  


    return $response;
}

function fetch_spares_list_external($conn, $job_id){
  $response = "";
  $active_status = "";
    $sql = "SELECT * FROM `list_of_spares_external` WHERE `external_job_id` = '$job_id'";
    $result = $conn->query($sql);

    $response .= '<h3 align="center">List Of Spares</h3><br /><br /> 
                   <table border="1" cellspacing="0" cellpadding="5">
                   <thead>
                       <tr>
                           <th><strong>Spares</strong></th>
                           <th><strong>Quantity</strong></th>
                           <th><strong>Amount</strong></th>
                       </tr>
                   </thead>
                   <tbody>';

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id              = clean_input($row["id"]);
            $internal_job_id = clean_input($row["internal_job_id"]);
            $spares          = clean_input($row["spares"]);
            $quantity        = clean_input($row["quantity"]);
            $amount          = clean_input($row["amount"]);

            $response .= '<tr>
                            <td>'.$spares.'</td>
                            <td>'.$quantity.'</td>
                            <td>R'.$amount.'</td>
                         </tr>';
                          
        }
    }

    $response .=  '</tbody>
                </table>';  


    return $response;
}

function fetch_customer_internal_job($conn, $job_id){
  $response = "";
  $active_status = "";
    $sql = "SELECT * FROM `internal_jobs` WHERE `internal_job_id` = '$job_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id          = clean_input($row["internal_job_id"]);
            $article     = clean_input($row["article"]);
            $model_no    = clean_input($row["model_no"]);
            $fault       = clean_input($row["fault"]);
            $damages     = clean_input($row["damages"]);
            $description = clean_input($row["description"]);
            $aux_equip   = clean_input($row["aux_equip"]);
            $date        = clean_input($row["date"]);

            $response .= '<h3 align="center">Internal Job Information</h3><br /><br /> 
                           <table border="1" cellspacing="0" cellpadding="5">
                           <tbody>
                             <tr>
                               <th scope="row"><strong>Article: </strong></th>
                               <td>'.$article.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>Model No: </strong></th>
                               <td>'.$model_no.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>Aux Equipment With: </strong></th>
                               <td>'.$aux_equip.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>Fault: </strong></th>
                               <td>'.$fault.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>Damages: </strong></th>
                               <td>'.$damages.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>Description: </strong></th>
                               <td>'.$description.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>Date Issued: </strong></th>
                               <td>'.$date.'</td>
                             </tr>
                           </tbody>
                       </table>';  

        }
    }
    $response .= fetch_spares_list_internal($conn, $job_id);
    return $response;
}

function fetch_customer_external_job($conn, $job_id){
  $response = "";
  $active_status = "";
    $sql = "SELECT * FROM `external_jobs` WHERE `external_job_id` = '$job_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id          = clean_input($row["internal_job_id"]);
            $article     = clean_input($row["article"]);
            $model_no    = clean_input($row["model_no"]);
            $fault       = clean_input($row["fault"]);
            $damages     = clean_input($row["damages"]);
            $description = clean_input($row["description"]);
            $aux_equip   = clean_input($row["aux_equip"]);
            $date        = clean_input($row["date"]);

            $response .= '<h3 align="center">External Job Information</h3><br /><br /> 
                           <table border="1" cellspacing="0" cellpadding="5">
                           <tbody>
                             <tr>
                               <th scope="row"><strong>Article: </strong></th>
                               <td>'.$article.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>Model No: </strong></th>
                               <td>'.$model_no.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>Aux Equipment With: </strong></th>
                               <td>'.$aux_equip.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>Fault: </strong></th>
                               <td>'.$fault.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>Damages: </strong></th>
                               <td>'.$damages.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>Description: </strong></th>
                               <td>'.$description.'</td>
                             </tr>
                             <tr>
                               <th scope="row"><strong>Date Issued: </strong></th>
                               <td>'.$date.'</td>
                             </tr>
                           </tbody>
                       </table>';  

        }
    }
    $response .= fetch_spares_list_external($conn, $job_id);
    return $response;
}

function fetch_job_table($conn, $job_id, $cust_id, $type){
	$response = "";
	$response .= fetch_customer($conn, $cust_id);

	if($type == "external"){
       $response .= fetch_customer_external_job($conn, $job_id);

	} elseif ($type == "internal") {
       $response .= fetch_customer_internal_job($conn, $job_id);
  }
  
	return $response;
}


if(isset($_POST["create_pdf"]) && isset($_POST["cust_id"]) && isset($_POST["job_id"]) && isset($_POST["job_type"]) && !empty($_POST["cust_id"]) && 
	!empty($_POST["job_id"]) && !empty($_POST["job_type"])){ 

	  $job_id  = clean_input($_POST["job_id"]);
	  $cust_id = clean_input($_POST["cust_id"]);
	  $type    = clean_input($_POST["job_type"]);

    require_once('tcpdf/tcpdf.php');  
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $obj_pdf->SetCreator(PDF_CREATOR);  
    $obj_pdf->SetTitle("Job Information");  
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $obj_pdf->SetDefaultMonospacedFont('helvetica');  
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
    $obj_pdf->setPrintHeader(false);  
    $obj_pdf->setPrintFooter(false);  
    $obj_pdf->SetAutoPageBreak(TRUE, 10);  
    $obj_pdf->SetFont('helvetica', '', 12);  
    $obj_pdf->AddPage();  
    $content = fetch_job_table($conn, $job_id, $cust_id, $type);
    $obj_pdf->writeHTML($content);
    ob_end_clean();
    $obj_pdf->Output('Invoice.pdf', 'I');

 }   
?>