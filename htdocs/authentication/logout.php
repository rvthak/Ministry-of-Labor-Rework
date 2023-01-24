<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect user to previous link
if(isset($_SESSION['redirect_to'])){
    echo "set";
    $url = $_SESSION['redirect_to'];
    unset($_SESSION['redirect_to']);
    header('location:' . $url);
}
else{
    echo "not set";
    header("location: ../index.php");
}
exit;
?>