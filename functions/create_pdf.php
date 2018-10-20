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

	        $response .= '<h3 align="center">Customer Information</h3><br /><br /> 
                           <table border="1" cellspacing="0" cellpadding="5">
                           <thead>
                             <tr>
                               <th scope="col">Name</th>
                               <th scope="col">Description</th>
                             </tr>
                           </thead>
                           <tbody>
                             <tr>
                               <th scope="row">Name: </th>
                               <td>'.$name.'</td>
                             </tr>
                             <tr>
                               <th scope="row">Email: </th>
                               <td>'.$email.'</td>
                             </tr>
                             <tr>
                               <th scope="row">Cell No: </th>
                               <td>'.$cell_no.'</td>
                             </tr>
                             <tr>
                               <th scope="row">Tel No: </th>
                               <td>'.$tel_no.'</td>
                             </tr>
                             <tr>
                               <th scope="row">Residential Address: </th>
                               <td>'.$residential_address.'</td>
                             </tr>
                             <tr>
                               <th scope="row">Postal Address: </th>
                               <td>'.$postal_address.'</td>
                             </tr>
                             <tr>
                               <th scope="row">Payment Method: </th>
                               <td>'.$payment_method.'</td>
                             </tr>
                             <tr>
                               <th scope="row">Multichoice Account No: </th>
                               <td>'.$multichoice_acc.'</td>
                             </tr>
                             <tr>
                               <th scope="row">SABC License: </th>
                               <td>'.$sabc_license.'</td>
                             </tr>
                           </tbody>
                       </table>';
  
	    }
	}

	return $response;
}

function fetch_customer_external_job($conn, $id, $cust_id){
	$response = "";
	$active_status = "";
    $sql = "SELECT * FROM `external_jobs` WHERE `id`='$id' AND `cust_id` = '$cust_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id              = clean_input($row["id"]);
            $external_job_id = clean_input($row["external_job_id"]);
            $description     = clean_input($row["description"]);
            $active          = clean_input($row["active"]);
            $date            = clean_input($row["date"]);

            $response .= '<h3 align="center">External Job Information</h3><br /><br /> 
                           <table border="1" cellspacing="0" cellpadding="5">
                           <thead>
                             <tr>
                               <th scope="col">Name</th>
                               <th scope="col">Description</th>
                             </tr>
                           </thead>
                           <tbody>
                             <tr>
                               <th scope="row">Description: </th>
                               <td>'.$description.'</td>
                             </tr>
                             <tr>
                               <th scope="row">Date Issued: </th>
                               <td>'.$date.'</td>
                             </tr>
                           </tbody>
                       </table>';  

        }
    }

    return $response;
}

function fetch_job_table($conn, $id, $cust_id, $type){
	$response = "";
	$response .= fetch_customer($conn, $cust_id);

	if($type == "external"){
       $response .= fetch_customer_external_job($conn, $id, $cust_id);
	}

	return $response;
}

print_r($_POST);
if(isset($_POST["create_pdf"]) && isset($_POST["job-input-id"]) && isset($_POST["cust-input-id"]) && isset($_POST["job-input-type"]) && !empty($_POST["job-input-id"]) && 
	!empty($_POST["cust-input-id"]) && !empty($_POST["job-input-type"])){ 

	  $id = clean_input($_POST["job-input-id"]);
	  $cust_id = clean_input($_POST["cust-input-id"]);
	  $type = clean_input($_POST["job-input-type"]);

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
      $content = fetch_job_table($conn, $id, $cust_id, $type);
      $obj_pdf->writeHTML($content);
      ob_end_clean();
      $obj_pdf->Output('Invoice'.$id.'.pdf', 'I');

 }  
?>