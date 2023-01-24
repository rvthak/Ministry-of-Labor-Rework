<?php
session_start();

// Include config file
require_once "../authentication/config.php";
 
// Define variables and initialize with empty values
$employee_id = $business_name = $name_employee = $start_date = $end_date = $type = "";
$employee_id_err = $business_name_err = $name_employee_err = $start_date_err = $end_date_err = $type_err  = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //Receice all input values from the form
    $employee_id = mysqli_real_escape_string($link, trim($_POST["employee_id"]));
    $name_employee = mysqli_real_escape_string($link, trim($_POST["name_employee"]));
    $business_name = mysqli_real_escape_string($link, trim($_POST["business_name"]));
    $start_date = mysqli_real_escape_string($link, trim($_POST["start_date"]));
    $end_date = mysqli_real_escape_string($link, trim($_POST["end_date"]));
    $type = mysqli_real_escape_string($link, trim($_POST["type"]));

	// Check if name_employee is empty
    if(empty($name_employee)){
      $name_employee_err = "Παρακαλώ εισάγετε το ονοματεπώνυμό σας.";
    }
 
    // Check if employee_id is empty
    if(empty($employee_id)){
        $employee_id_err = "Παρακαλώ το ΑΦΜ σας.";
    }

    // Check if business_name is empty
    if(empty($business_name)){
        $business_name_err = "Παρακαλώ εισάγετε το όνομα της επιχείρησης.";
    }

    // Check if start date is empty
    if(empty($start_date)){
        $start_date_err = "Παρακαλώ επιλέξτε μέχρι πότε θα ισχύει η άδεια.";
    }
	
	// Check if end date is empty
	if(empty($end_date)){
		$end_date_err = "Παρακαλώ επιλέξτε μέχρι πότε θα ισχύει η άδεια.";
	}

    // Check if type is empty
    if(empty($type)){
        $type_err = "Παρακαλώ επιλέξτε τον τύπο της άδειας.";
    }

    if(empty($employee_id_err) && empty($name_employee_err) && empty($business_name_err) && empty($end_date_err) && empty($start_date_err) && empty($type_err)){
        // Perform query
        
        if (mysqli_ping($link)) {
            printf ("Our connection is ok!\n");
          } else {
            printf ("Error: %s\n", mysqli_error($link));
          }
        $sql = "INSERT INTO adeies (employee_id, name_employee, business_name, start_date, end_date, type) VALUES ('$employee_id', '$name_employee', '$business_name', '$start_date', '$end_date', '$type')";
        // Redirect user to status message
        if (mysqli_query($link, $sql)) {                           
            $_SESSION['status_adeies'] = true;
            header("location: ../status_reports/status_message.php");
        }
        else{
            //die(mysqli_error($link));
            $_SESSION['status_adeies'] = false;
            header("location: ../status_reports/status_message.php");
        }
    }        
    // Close connection
    mysqli_close($link);
}
?>