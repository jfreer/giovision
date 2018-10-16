<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 function clean_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
 }
 function clean_input_db($db,$data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         $data = mysqli_real_escape_string($db, $data);
         return $data;
 }

?>