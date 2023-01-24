<?php
// Initialize the session
session_start();
 
// Include config file
require_once "../authentication/config.php";
 
// Define variables and initialize with empty values
$text = $name = $phone = $mail = "";
$text_err = $name_err = $phone_err = $mail_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

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
        $mail_err = "Παρακαλώ εισάγετε το email σας.";
    } else{
        $mail = trim($_POST["mail"]);
    }
    
    if(empty($text_err) && empty($name_err) && empty($mail_err)){
        echo "Το μήνυμά σας καταχωρήθηκε με επιτυχία! Θα επικοινωνήσουμε μαζί σας σύντομα.";
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="el">
<head>
  <title>Επικοινωνία</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link rel="icon" href="../images/logo.ico">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div id="fixed">
  <div class="wrapper row0">
    <div id="topbar" class="hoc clear" >
      <div class="fl_right">
        <!-- ################################################################################################ -->
        <ul class="nospace">
          <li><a href="#" title="English"><i class="fas fa-globe"></i> English</a></li>
          <li><a href="contact.php" title="Επικοινωνία"><b>Επικοινωνια</b></a></li>
          <?php
            // Set redirect_to SESSION to redirect to this page after logout or login
            $current_page = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $_SESSION['redirect_to'] = $current_page;
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
              <li><a href="../employees/license.php">Άδειες</a></li>
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
<div class="wrapper bgded overlay gradient" style="z-index: 1; background-color:rgb(0, 0, 0);">
    <div id="breadcrumb" class="hoc clear"> 
      <ul>
        <li><a href="../index.php" title="Αρχική"><i class="fa fa-home"></i></a></li>
        <li><a href="contact.php">ΕΠΙΚΟΙΝΩΝΙΑ</a></li>
      </ul>
    </div>
</div>

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<div class="wrapper row3">
    <section id="cta" class="hoc container clear"> 
      <!-- ################################################################################################ -->
      <ul class="nospace clear">
        <li class="one_quarter first">
          <div class="block clear"><a href="#" title="Τηλέφωνο"><i class="fas fa-phone"></i></a> <span><strong>Τηλεφωνικό Κέντρο:</strong> +30 213 1516649 <br> +30 213 1516651</span></div>
        </li>
        <li class="one_quarter">
          <div class="block clear"><a href="#" title="mail"><i class="fas fa-envelope"></i></a> <span><strong>Στείλτε μας mail:</strong>support@ypakp.gov</span></div>
        </li>
        <li class="one_quarter">
          <div class="block clear"><a href="#" title="Ρολόι"><i class="fas fa-clock"></i></a> <span><strong>Δευτέρα - Σάββατο:</strong> 08:00 πμ - 18:00 μμ</span></div>
        </li>
        <li class="one_quarter">
          <div class="block clear"><a href="#" title="Τοποθεσία"><i class="fas fa-map-marker-alt"></i></a> <span><strong>Επισκεφθείτε μας:</strong><a href="appointment.php">Λόγω covid-19 θα χρειαστεί να κλείσετε ραντεβού</a></span></div>
        </li>
      </ul>
      <!-- ################################################################################################ -->
    </section>
</div>

<div class="wrapper row2">
  <main class="hoc" style="padding: 40px 0;">
    <div class="stack_container">
      <div class="left_stack">
        <p style="padding-top: 80px;"> Από τη σελίδα αυτή μπορείτε να ενημερωθείτε για το ωράριο επικοινωνίας του Υπουργείου Εργασίας, καθώς και να βρείτε όλους τους διαθέσιμους τρόπους να επικοινωνήσετε μαζί μας για οποιοδήποτε πρόβλημα αντιμετωπίζετε. Το Τηλεφωνικό μας Κέντρο λειτρουργεί 24 ώρες το 24ωρο, 7 ημέρες την εβδομάδα. Εναλλακτικά μπορείτε να μας στείλετε ηλεκτρονικά μηνύματα μέσω email ή μέσω της <a href="#comments"> <b> Φόρμας Ηλεκτρονικής Επικοινωνίας</b></a>, ή ακόμα και να <a href="appointment.php"><b>Κλείσετε Ραντεβού</b></a> για να σας εξυπηρετήσουμε από κοντά. </p>
        <p style=" font-size: 14px; "> <strong> <span style="color: red;">Σημαντικό:</span> Λόγω του COVID-19, εξυπηρετούμε από κοντά, ΑΠΟΚΛΕΙΣΤΙΚΑ κατόπιν ραντεβού για αποφυγή συνωστισμών.</strong></p>
      </div>
      <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6289.825616947389!2d23.732251170982742!3d37.97916407808143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a1bd275a0f4fa3%3A0x80822910b9ca8294!2zzqXPgM6_z4XPgc6zzrXOr86_IM6Vz4HOs86xz4POr86xz4IsIM6azr_Ouc69z4nOvc65zrrOrs-CIM6Rz4PPhs6szrvOuc-DzrfPgiDOus6xzrkgzprOv865zr3Pic69zrnOus6uz4IgzpHOu867zrfOu861zrPOs8-FzrfPgiwgzqTOvM6uzrzOsSDOnM63z4TPgc-Ozr_PhSDOmi7Okc6bLs6f!5e0!3m2!1sen!2sgr!4v1610474582114!5m2!1sen!2sgr" width="600" height="450" frameborder="0" style="border:0; padding-bottom: 40px; width: 600px; padding-left: 100px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div>
    
  </main> 
  
</div>

<!-- ################################################################################################ -->
<div class="wrapper row3">
    <main class="hoc container clear"> 
        <div class="content three_quarter">
            <div id="comments">
                <h2>Ηλεκτρονική επικοινωνία</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <?php
                // Check if the user is logged in, if not then redirect him to login page
                if(!isset($_SESSION["loggedin"])){
                  echo '<p>Αν έχετε λογαριασμό, μπορείτε να
                        <link><a href="authentication/login.php">συνδεδείτε</a></link>
                        για αυτόματη συμπλήρωση των πεδίων.</p>
                        <div class="one_third first">
                        <label for="name"><strong>Ονοματεπώνυμο/Επωνυμία επιχείρησης<span>*</span></label>
                        <input type="text" name="name" id="name" value="" size="22" required>
                      </div>
                      <div class="one_third" style="margin-top:20px;">
                        <label for="phone">Τηλέφωνο</label>
                        <input type="phone" name="phone" id="phone" value="" size="22">
                      </div>
                      <div class="one_third" style="margin-top:20px;">
                        <label for="mail"><strong>Ηλεκτρονικό ταχυδρομείο<span>*</span></label>
                        <input type="mail" name="mail" id="mail" value="" size="22" required>
                      </div>
                      <div class="block clear">
                        <label for="text">Λόγος επικοινωνίας <span>*</span></label>
                        <textarea name="text" id="text" cols="25" rows="10" required></textarea>
                      </div>
                      <div style="float: right;">
                        <input type="reset" name="reset" value="Εκκαθάριση">
                        &nbsp;
                        <input type="submit" name="submit" value="Αποστολή" style="background-color: #813DAA; color: #FFFFFF;">
                      </div>';
                }
                else{
                  $name = $email = $phone = "";

                  // Create connection
                  mysqli_select_db($link, "users");
                  $id = $_SESSION["id"];
                  $sql = "SELECT name, email, phone FROM users where id = '$id'";
                  $result = mysqli_query($link, $sql);

                  if (mysqli_num_rows($result) > 0) {
                      $row = mysqli_fetch_assoc($result);
                      // output data of each row
                      echo " <div class='one_third first'>
                      <label for='name'><strong>Ονοματεπώνυμο/Επωνυμία επιχείρησης<span>*</span></label>
                      <input type='text' name='name' id='name' value=' ".$row["name"]."' size='22' required>
                    </div>
                    <div class='one_third' style='margin-top:20px;'>
                      <label for='phone'>Τηλέφωνο</label>";
                      if ($row["phone"] != NULL){
                        $phone = $row["phone"];
                      }
                      else{
                        $phone = '';
                      }
                      echo "<input type='phone' name='phone' id='phone' value='".$phone."' size='22'>
                    </div>
                    <div class='one_third' style='margin-top:20px;'>
                      <label for='mail'><strong>Ηλεκτρονικό ταχυδρομείο <span>*</span></label>
                      <input type='mail' name='mail' id='mail' value='".$row["email"]."' size='22' required>
                    </div>
                    <div class='block clear'>
                      <label for='text'>Λόγος επικοινωνίας <span>*</span></label>
                      <textarea name='text' id='text' cols='25' rows='10' required></textarea>
                    </div>
                    <div style='float: right;'>
                      <input type='reset' name='reset' value='Εκκαθάριση'>
                      &nbsp;
                      <input type='submit' name='submit' value='Αποστολή' style='background-color: #813DAA; color: #FFFFFF;'>
                    </div>";
                  } else {
                      echo "0 results";
                  }
                  mysqli_close($link);
                }
                ?>
                </form>
            </div>
        </div>
        <div class="clear"></div>
    </main>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <main class="hoc clear"> 
    <div class="content three_quarter first min_info">
      <div class="flex_row">
        <img class="single_logo" src="../images/logo_big.png" alt="Υπουργείο Εργασίας Λόγκο">
        <p class="yp_name unbold"> Υπουργείο Εργασίας και <br> Κοινωνικών Υποθέσεων</p>
        <ul class="unbold">
          <li><a  href="#"> Ρόλος του Υπουργείου </a></li>
          <li><a href="#"> Πολιτική Ηγεσία </a></li>
          <li><a href="#"> Οργανωτική Δομή </a></li>
        </ul>

        <ul class="unbold">
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
  <a id="backtotop" href="#top" title="Πίσω στην κορυφή"><i class="fas fa-chevron-up"></i></a>
  <!-- JAVASCRIPTS -->
  <script src="../layout/scripts/jquery.min.js"></script>
  <script src="../layout/scripts/jquery.backtotop.js"></script>
  <script src="../layout/scripts/jquery.mobilemenu.js"></script>
  </body>
  </html>
