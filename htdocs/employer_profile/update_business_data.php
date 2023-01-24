<?php
session_start();
// Include config file
require_once "../authentication/config.php";
 
// Define variables and initialize with empty values
$name = $status = $office = $region = $end_mng = "";
$name_err = $status_err = $office_err = $region_err = $end_mng_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if business name is empty
    if(empty(trim($_POST["business_name"]))){
        $name_err = "Παρακαλώ γράψτε το όνομα της επιχείρησης.";
    } else{
        $name = trim($_POST["business_name"]);
    }

    // Check if status is empty
    if(empty(trim($_POST["status"]))){
        $status_err = "Παρακαλώ εισάγετε την κατάσταση της επιχείρησης.";
    } else{
        $status = trim($_POST["status"]);
    }

    // Check if office is empty
    if(empty(trim($_POST["office"]))){
        $office_err = "Παρακαλώ την έδρα της επιχείρησης.";
    } else{
        $office = trim($_POST["office"]);
    }

    // Check if region is empty
    if(empty(trim($_POST["region"]))){
        $region_err = "Παρακαλώ εισάγετε την περιοχή της επιχείρησης.";
    } else{
        $region = trim($_POST["region"]);
    }

    // Check if end_mng is empty
    if(empty(trim($_POST["end_mng"]))){
        $end_mng_err = "Παρακαλώ εισάγετε τη λήξη διαχειριστικής περιόδου.";
    } else{
        $end_mng = trim($_POST["end_mng"]);
    }

    /* check if server is alive */
    if (mysqli_ping($link)) {
      printf ("Our connection is ok!\n");
    } else {
      printf ("Error: %s\n", mysqli_error($link));
    }

    $id = $_SESSION["id"];
    if(empty($name_err) && empty($status_err) && empty($office_err) && empty($region_err) && empty($end_mng_err)){
        // Perform query
        $sql = "UPDATE business_data SET business_name='$name', status='$status', office='$office', region='$region', end_mng='$end_mng' WHERE id = '$id'";                        
        
        // Redirect user to status message
        if (mysqli_query($link, $sql)) {                           
            $_SESSION['status_business_data'] = true;
            header("location: ../status_reports/status_message.php");
        }
        else{
            $_SESSION['status_business_data'] = false;
            header("location: ../status_reports/status_message.php");
        }
    }        
    // Close connection
    mysqli_close($link);
}
?>