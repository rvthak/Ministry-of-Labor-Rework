<?php
session_start();

// Include config file
require_once "../authentication/config.php";
 
// Define variables and initialize with empty values
$status = $start_date = $end_date = "";
$status_err = $start_date_err = $end_date = "";

$id = $_SESSION["id"];
$employee_id = $_SESSION["employee_id"];
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $status = mysqli_real_escape_string($link, trim($_POST["status"]));
    $start_date = mysqli_real_escape_string($link, trim($_POST["start_date"]));
    $end_date = mysqli_real_escape_string($link, trim($_POST["end_date"]));

    // Check if status is empty
    if(empty($status)){
        $status_err = "Παρακαλώ επιλέξτε ημερομηνία.";
    }

    // Check if start_date is empty
    if(empty($start_date)){
        $start_date_err = "Παρακαλώ εισάγετε το όνομά σας.";
    }

    // to prevent mysql injection
    $status = stripcslashes($status);
    $start_date = stripcslashes($start_date);
    $end_date = stripcslashes($end_date);

    /* check if server is alive */
    if (mysqli_ping($link)) {
      printf ("Our connection is ok!\n");
    } else {
      printf ("Error: %s\n", mysqli_error($link));
    }

    if(empty($status_err) && empty($start_date_err)){
        // Perform query
        $sql = "UPDATE business_employees SET status = '$status', start_date = '$start_date', end_date = '$end_date' WHERE business_id = '$id' and employee_id = '$employee_id'";
        // Redirect user to status message
        if (mysqli_query($link, $sql)) {                           
          $_SESSION['status_business_employees'] = true;
          header("location: ../status_reports/status_message.php");
        }
        else{
          $_SESSION['status_business_employees'] = false;
          header("location: ../status_reports/status_message.php");
        }
    }        
    // Close connection
    mysqli_close($link);
}
?>