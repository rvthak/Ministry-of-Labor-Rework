<?php
session_start();

// Include config file
require_once "../authentication/config.php";
 
// Define variables and initialize with empty values
$datetime = $text = $name = $phone = $mail = "";
$datetime_err = $text_err = $name_err = $phone_err = $mail_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if datetime is empty
    if(empty(trim($_POST["datetime"]))){
        $datetime_err = "Παρακαλώ επιλέξτε ημερομηνία.";
    } else{
        $datetime = trim($_POST["datetime"]);
    }

    // Check if name is empty
    if(empty(trim($_POST["name"]))){
        $name_err = "Παρακαλώ εισάγετε το όνομά σας.";
    } else{
        $name = trim($_POST["name"]);
    }

    // Check if text is empty
    if(empty(trim($_POST["text"]))){
      $text_err = "Παρακαλώ εισάγετε τον λόγο που κλείνετε ραντεβού.";
    } else{
      $text = trim($_POST["text"]);
    }

    // Check if phone is empty
    if(empty(trim($_POST["phone"]))){
        $phone_err = "Παρακαλώ εισάγετε το τηλέφωνό σας.";
    } else{
        $phone = trim($_POST["phone"]);
    }

    // Check if mail is empty
    if(empty(trim($_POST["mail"]))){
        $mail = NULL;
    } else{
        $mail = trim($_POST["mail"]);
    }

    // Check if user is logged in to set the id
    if(isset($_SESSION["loggedin"])){
        $id = $_SESSION["id"];
    }
    else $id = NULL;

    if(empty($datetime_err) && empty($text_err) && empty($name_err) && empty($phone_err) && empty($mail_err)){
        // Perform query
        $sql = "INSERT INTO rantevou (datetime, user_id, text, name, phone, mail) VALUES ('$datetime', '$id', '$text', '$name', '$phone', '$mail')";
        
        // Redirect user to status message
        if (mysqli_query($link, $sql)) {                           
            $_SESSION['status_rantevou'] = true;
            header("location: ../status_reports/status_message.php");
        }
        else{
            $_SESSION['status_rantevou'] = false;
            header("location: ../status_reports/status_message.php");
        }
    }

    // Close connection
    mysqli_close($link);
}
?>