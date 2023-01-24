<?php
session_start();

// Include config file
require_once "../authentication/config.php";
 
// Define variables and initialize with empty values
$email = $phone = "";
$email_err = $phone_err = "";

$id = $_SESSION["id"];
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = mysqli_real_escape_string($link, trim($_POST["email"]));
    $phone = mysqli_real_escape_string($link, trim($_POST["phone"]));

    // Check if email is empty
    if(empty($email)){
        $email_err = "Παρακαλώ επιλέξτε ημερομηνία.";
    }

    // Check if phone is empty
    if(empty($phone)){
        $phone_err = "Παρακαλώ εισάγετε το όνομά σας.";
    }

    // to prevent mysql injection
    $email = stripcslashes($email);
    $phone = stripcslashes($phone);

    /* check if server is alive */
    if (mysqli_ping($link)) {
      printf ("Our connection is ok!\n");
    } else {
      printf ("Error: %s\n", mysqli_error($link));
    }

    if(empty($email_err) && empty($phone_err)){
        // Perform query
        $sql = "UPDATE users SET email = '$email', phone = '$phone' WHERE id = '$id'";
        // Redirect user to email message
        if (mysqli_query($link, $sql)) {                           
          $_SESSION['status_user_data'] = true;
          header("location: ../status_reports/status_message.php");
        }
        else{
          $_SESSION['status_user_data'] = false;
          header("location: ../status_reports/status_message.php");
        }
    }        
    // Close connection
    mysqli_close($link);
}
?>