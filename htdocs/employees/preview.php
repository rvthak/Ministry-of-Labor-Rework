<!DOCTYPE html>
<html lang="el">
<head>
<title>Άδειες</title>
	<style>.not-allowed {cursor: not-allowed;}</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../layout/styles/collapsible.css">
	<link rel="icon" href="../images/logo.ico">
</head>

<body id="top">
<!-- ################################################################################################ -->
<div id="fixed">
  <div class="wrapper row0">
    <div id="topbar" class="hoc clear" >
      <div class="fl_right">
        <!-- ################################################################################################ -->
        <ul class="nospace">
          <li><a href="#" title="English"><i class="fas fa-globe"></i> English</a></li>
          <li><a href="../contact/contact.php" title="Επικοινωνία">Επικοινωνια</a></li>
		  <?php
			session_start();
            // Check if the user is logged in, if not then redirect him to login page
            if(!isset($_SESSION["loggedin"])){
              echo '<li><a href="../authentication/login.php" title="Κουμπί Σύνδεσης">Σύνδεση</a></li>';
              echo '<li><a href="../authentication/register.php" title="Κουμπί Εγγραφής">Εγγραφή</a></li>';
            }
            elseif($_SESSION["role_id"] == 1){
              echo '<li><a href="../employee_profile/myemployment.php" class="btn btn-danger" title="Προφίλ εργαζόμενου">Η εργασία μου</a></li>';
              echo '<li><a href="../authentication/logout.php" title = "Αποσύνδεση"><i class="fa fa-sign-out-alt"></i></a></li>';
            }
            else{
              echo '<li><a href="../employer_profile/mybusiness.php" class="btn btn-danger" title="Προφίλ εργοδότη">Η επιχείρησή μου</a></li>';
              echo '<li><a href="../authentication/logout.php" title = "Αποσύνδεση"><i class="fa fa-sign-out-alt"></i></a></li>';
            }
          ?>
          <li id="searchform">
            <div>
              <form action="#" method="post">
                <fieldset>
                  <legend>Quick Search:</legend>
                    <label for="search" style="font-size:0px;">Αναζήτηση</label>
                  <input id="search" type="text" placeholder="Αναζήτηση&hellip;">
                    <button type="submit" title="Υποβολή αναζήτησης"><i class="fas fa-search"></i></button>
                </fieldset>
              </form>
            </div>
          </li>
        </ul>
        <!-- ################################################################################################ -->
      </div>
    </div>
  </div>

  <div class="wrapper row1">
    <header id="header" class="hoc clear">
      <div id="logo" class="fl_left">
          <a href="../index.php"><img src="../images/logo.png" style="height: 65px;" alt="Υπουργείο Εργασίας"></a>
      </div>

      <nav id="mainav" class="fl_right">

        <ul class="clear">

          <li><a class="nodrop" href="../index.php" style="padding-top: 32px; padding-bottom: 30px;">Αρχικη</a></li>

          <li ><a class="drop" href="../employees.php">&nbsp;Εργαζομενοι</a>
            <ul>
            <li><a href="../covid.php#ergazomenoi">Μέτρα λόγω πανδημίας</a></li>
              <li><a href="#">Συμβάσεις</a></li>
              <li><a href="license.php">Άδειες</a></li>
              <li><a href="#">Επιδόματα</a></li>
              <li><a href="#">Απολύσεις</a></li>
            </ul>
          </li>
          <li><a class="drop" href="../employers.php">&nbsp;Εργοδοτες</a>
            <ul>
              <li><a href="../covid.php#ergodotes">Μέτρα λόγω πανδημίας</a></li>
              <li><a href="#">Ασφαλιστικός οδηγός</a></li>
              <li><a href="#">Ρύθμιση οφειλών</a></li>
            </ul>
          </li>
          <li><a class="drop" href="#" style="width: 145px;">&nbsp;Ανεργοι</a>
            <ul>
              <li><a href="#">Δικαιώματα</a></li>
              <li><a href="#">Προϋποθέσεις</a></li>
              <li><a href="#">Δικαιολογητικά</a></li>
            </ul>
          </li>
          <li><a class="drop" href="#">&nbsp;Συνταξιουχοι</a>
            <ul>
              <li><a href="#">Κριτήρια</a></li>
              <li><a href="#">Δικαιολογητικά</a></li>
            </ul>
          </li>
          <li><a class="drop" href="#">&nbsp;Νομοθεσια</a>
          <ul>
            <li><a href="#">Νέα και αλλαγές</a></li>
            <li><a href="#">Εργαζόμενοι</a></li>
            <li><a href="#">Εργοδότες</a></li>
            <li><a href="#">Άνεργοι</a></li>
            <li><a href="#">Συνταξιούχοι</a></li>
          </ul>
          </li>
          <li><a class="nodrop" href="#">Βοηθεια</a></li>
        </ul>
        <!-- ################################################################################################ -->
      </nav>
    </header>
  </div>
</div>
<!-- ################################################################################################ -->
<?php
// Set the correct padding-offset for the breadcrumb if you are connected
if(isset($_SESSION["loggedin"])){
  echo '<div style="padding-bottom: 133px;"></div>';
}
else{
  echo '<div style="padding-bottom: 113px;"></div>';
}
?>
<!-- ################################################################################################ -->
<div class="wrapper row2" style="min-height: 55.8vh;">
    <main class="hoc container clear"> 
    <!-- main body -->
        <div id="comments">
            <h1>Προεπισκόπηση αίτησης άδειας</h1>
            <form action="insert_license.php" method="post">
                <?php

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
                        echo ' <div class="one_half first">
                                    <label for="name_employee">Ονοματεπώνυμο Εργαζόμενου</label>
                                    <input readonly type="text" name="name_employee" id="name_employee" value="'.$name_employee.'" size="22" required>
                                </div>
                    
                                <div class="one_half">
                                    <label for="employee_id">ΑΦΜ Εργαζόμενου<span>*</span></label>
                                    <input readonly type="text" name="employee_id" id="employee_id" value="'.$employee_id.'" size="22">
                                </div>

                                <div class="one_half first">
                                    <label for="business_name">Επιχείρηση<span>*</span></label>
                                    <input readonly type="text" name="business_name" id="business_name" value="'.$business_name.'" size="22">
                                </div>

                                <div class="one_half">
                                    <label for="type">Επιλέξτε τύπο άδειας<span>*</span></label>
                                    <input readonly type="text" name="type" id="type" value="'.$type.'" size="22">
                                </div>

                                <div class="one_half first">
                                    <label for="start_date">Από<span>*</span> <text id="firstDayAlert">Η ημέρα που επιλέξατε έχει περάσει</text> </label>
                                    <input readonly type="date" name="start_date" id="start_date" value="'.$start_date.'" size="22" >
                                </div>

                                <div class="one_half">
                                    <label for="end_date" style="margin-top:8px;">Μέχρι<span>*</span> <text id="secondDayAlert">Η ημέρα που επιλέξατε είναι πριν την αρχική μέρα</text></label>
                                    <input readonly type="date" name="end_date" id="end_date" value="'.$end_date.'" size="22">
                                </div>
                                
                                <div style="float: right;">
                                    &nbsp;
                                    <input type="submit" name="submit" value="Υποβολή" style="background-color: #813DAA; color: #FFFFFF;">
                                </div>';

                    }        
                    // Close connection
                    mysqli_close($link);
                }
                ?>
            </form>
            <div>
            <form action="license.php" method="post">
                <input type="submit" name="submit" value="Επιστροφή">
            </form>
            </div>
        </div>
    </main>
</div>

<!-- ################################################################################################ -->


<div class="wrapper row2">
  <main class="hoc clear"> 

    <div class="content three_quarter first min_info">
      <div class="flex_row">
        <img class="single_logo" src="../images/logo_big.png" alt="Υπουργείο Εργασίας Λόγκο">
        <p class="yp_name"> Υπουργείο Εργασίας και <br> Κοινωνικών Υποθέσεων</p>
        <ul>
          <li><a href="#"> Ρόλος του Υπουργείου </a></li>
          <li><a href="#"> Πολιτική Ηγεσία </a></li>
          <li><a href="#"> Οργανωτική Δομή </a></li>
        </ul>

        <ul>
          <li><a href="#"> Γενική Γραματεία Πρόνοιας </a></li>
          <li><a href="#"> Γενική Γραματεία Κοινωνικής Ασφάλισης </a></li>
          <li><a href="#"> Σώμα Επιθεώρησης Εργασίας </a></li>
        </ul>
      </div>
      
      
      <div class="clear"></div>
    </div>

  </main>
</div>
<!-- ################################################################################################ -->

<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <p class="fl_left unbold" >Copyright &copy; 2020 - All Rights Reserved - <a href="#">https://www.ypakp.gr</a></p>
    <a href="#" ><p class="fl_right unbold">Προσωπικά Δεδομένα και Ασφάλεια</p></a>
  </div>
</div>
<!-- ################################################################################################ -->
<a id="backtotop" href="#top" title="Αρχική"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
<script src="../layout/scripts/collapse.js"></script>
<script src="../layout/scripts/select_type.js"></script>