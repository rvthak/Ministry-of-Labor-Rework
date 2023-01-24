<?php

// Initialize the session
session_start();

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$id = $password = $confirm_password = $name = $email = $phone = "";
$id_err = $password_err = $confirm_password_err = $name_err = $email_err = $phone_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //Receice all input values from the form
    $id = mysqli_real_escape_string($link, trim($_POST["id"]));
    $password = mysqli_real_escape_string($link, trim($_POST["password"]));
    $name = mysqli_real_escape_string($link, trim($_POST["name"]));
    $email = mysqli_real_escape_string($link, trim($_POST["email"]));
    $phone = mysqli_real_escape_string($link, trim($_POST["phone"]));
 
    mysqli_select_db($link, "users");

    // Validate id
    if(empty($id)){
        $id_err = "<text style='color:red; margin-left: 215px;'>Παρακαλώ εισάγετε το ΑΦΜ σας.</text>";
    } else{

        if ($result = mysqli_query($link, "SELECT * FROM users WHERE id = '$id'")){
            $row = mysqli_fetch_array($result);
            if(mysqli_num_rows($result) == 1){
                $id_err = "<text style='color:red;'><br>Υπάρχει ήδη λογαριασμός με αυτό το ΑΦΜ.</text>";
            }
        }
    }
        
    // Validate password
    if(empty($password)){
        $password_err = "<text style='color:red; margin-left: 41px;' >Παρακαλώ εισάγετε κωδικό πρόσβασης.</text>";     
    } elseif(strlen($password) < 6){
        $password_err = "<text style='color:red;'><br>Ο κωδικός πρόσβασης πρέπει να έχει τουλάχιστον 6 χαρακτήρες.</text>";
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "<text style='color:red;'><br>Παρακαλώ επιβεβαιώστε τον κωδικό πρόσβασης.</text>";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "<text style='color:red;'><br>Οι κωδικοί πρόσβασης δεν ταιριάζουν.</text>";
        }
    }

    // Validate name
    if(empty($name)){
        $name_err = "<text style='color:red; margin-left:44px;' >Παρακαλώ εισάγετε το ονοματεπώνυμό σας.</text>";     
    }

    // Validate email
    if(empty($email)){
        $email_err = "<text style='color:red; margin-left:52px;'>Παρακαλώ εισάγετε το email σας.</text>";     
    }
    
    // Check input errors before inserting in database
    if(empty($id_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err) && empty($email_err)){
        /* check if server is alive */
        if (mysqli_ping($link)) {
            printf ("Our connection is ok!\n");
        } else {
            printf ("Error: %s\n", mysqli_error($link));
        }

        // Prepare an insert statement
        $sql = "INSERT INTO users (id, name, password, email, phone) VALUES ('$id', '$name', '$password', '$email', '$phone')";

        // Redirect user to login page
        if (mysqli_query($link, $sql)) {                           
            $_SESSION['status_login'] = true;
            header("location: login.php");
        }
        else{
            $_SESSION['status_login'] = false;
            header("location: login.php");
        }
        
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <title>Εγγραφή</title>
    <link href="../layout/styles/register.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="../images/logo.ico">
</head>
<body>
<main>
    <div class="wrapper " >
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="border: none;">
        <div class="container hoc">
            <h1>Εγγραφή</h1>
            <p>Παρακαλώ συμπληρώστε την παρακάτω φόρμα για να δημιουργήσετε λογαριασμό στην ιστοσελίδα του Υπουργείου Εργασίας & Κοινωνικών Υποθέσεων.</p>
            <p>Τα πεδία με <span style='color:red;'>*</span> είναι υποχρεωτικά.</p>
            <hr>

            <label for="name"><strong>Ονοματεπώνυμο<span style='color:red;'>*</span></strong></label> <span class="help-block"><?php echo $name_err; ?></span>
            <input id="name" type="text" placeholder="Το ονοματεπώνυμό σας" name="name" class="
            form-control" value="<?php echo $name; ?>" >

            <label for="afm"><strong>ΑΦΜ<span style='color:red;'>*</span></strong></label>
            <span class="help-block"><?php echo $id_err; ?></span>
            <input id="afm" type="text" placeholder="Το ΑΦΜ σας" name="id" class="form-control" value="<?php echo $id; ?>" >

            <label for="mail"><strong>Ηλεκτρονικό Ταχυδρομείο<span style='color:red;'>*</span></strong></label>
            <span class="help-block"><?php echo $email_err; ?></span>
            <input id="mail" type="text" placeholder="Το email σας"  name="email" class="" value="<?php echo $email; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" >

            <label for="phone"><strong>Τηλέφωνο</strong></label>
            <span class="help-block"><?php echo $phone_err; ?></span>
            <input id="phone" type="text" placeholder="Το τηλέφωνό σας"  name="phone" class="form-control" value="<?php echo $phone; ?>">
            

            <label for="pass"><strong>Κωδικός Πρόσβασης<span style='color:red;'>*</span></strong></label> <span class="help-block"><?php echo $password_err; ?></span>
            <input id="pass" type="password" placeholder="Έγκυρος κωδικός πρόσβασης πάνω από 6 χαρακτήρες" name="password" class="form-control" value="<?php echo $password; ?>">
            

            <label for="confirm"><strong>Επιβεβαίωση κωδικού πρόσβασης<span style='color:red;'>*</span></strong></label>
            <span class="help-block"><?php echo $confirm_password_err; ?></span>
            <input id="confirm" type="password" placeholder="Επιβεβαίωση κωδικού" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
            

            <hr>
            <p style="font-size: 15.4px;">Με τη δημιουργία λογαρισμού, αποδέχεστε τους <a href="#">Όρους & Προϋποθέσεις</a>.</p>

            <button type="submit" class="registerbtn">Δημιουργία λογαριασμού</button>

            <p>Έχετε ήδη λογαριασμό; <a href="login.php">Συνδεθείτε εδώ</a>.</p>
        </div>
        </form>
    </div>
</main>
</body>
</html>
