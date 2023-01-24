<?php
// Initialize the session
session_start();
 
// Include config file
require_once "../authentication/config.php";
 
// Define variables and initialize with empty values
$employee_id = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $employee_id = trim($_POST["employee_id"]);

    // to prevent mysql injection
    $employee_id = stripcslashes($employee_id);
    $employee_id = mysqli_real_escape_string($link, $employee_id);
}
?>

<!DOCTYPE html>
<html lang="el">
<head>
  <title>Εργαζόμενοι επιχείρησης</title>
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
          <li><a href="../contact/contact.php" title="Επικοινωνία">Επικοινωνια</a></li>
          <li><a href="mybusiness.php" class="btn btn-danger" title="Προφίλ εργοδότη">Η επιχείρησή μου</a></li>
          <li><a href="../authentication/logout.php" title = "Αποσύνδεση"><i class="fa fa-sign-out-alt"></i></a></li>
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

<div style="padding-bottom: 130px;"></div>

<!-- ################################################################################################ -->
<div class="wrapper bgded overlay gradient" style="z-index: 1; background-color:rgb(0, 0, 0);">
    <div id="breadcrumb" class="hoc clear"> 
      <ul>
        <li><a href="../index.php" title="home icon"><i class="fa fa-home"></i></a></li>
        <li><a href="mybusiness.php">Η ΕΠΙΧΕΙΡΗΣΗ ΜΟΥ</a></li>
        <li><a href="business_employees.php">ΑΛΛΑΓΗ ΚΑΤΑΣΤΑΣΗΣ ΕΡΓΑΖΟΜΕΝΩΝ</a></li>
      </ul>
    </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <main class="hoc container clear">
    <div class="content three_quarter">
        <h1>Αλλαγή κατάστασης εργαζομένου</h1>
        <p>Μπορείτε να αλλάξετε την κατάσταση του ακόλουθου εργαζομένου με κλικ στα κατάλληλα πεδία και Υποβολή.</p>
        <?php
          // Define variables and initialize with empty values
          $status = $start_date = $end_date = "";
          $id = $_SESSION["id"];
          $_SESSION["employee_id"] = $employee_id;

          $sql = "SELECT status, start_date, end_date FROM business_employees where business_id = '$id' and employee_id = '$employee_id'";
          $result = mysqli_query($link, $sql);

          if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);

              $status = $row["status"];
              $start_date = $row["start_date"];
              $end_date = $row["end_date"];
          }
          else {
            echo "0 results";
          }

          $sql = "SELECT name FROM users where id = '$employee_id'";
          $result = mysqli_query($link, $sql);

          if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $name= $row["name"];
          }
          else{
            echo "0 results";
          }

          mysqli_close($link);
        ?>
        <form action="update_business_employees.php" method="post">
          </table>
            <div class="scrollable">
            <table>
              <tbody>
                <tr>
                    <td>Ονοματεπώνυμο</td>
                    <?php echo "<td>$name</td>"; ?>
                </tr>
                <tr>
                    <td>ΑΦΜ</td>
                    <?php echo "<td>$employee_id</td>"; ?>
                </tr>
                <tr>
                    <td>Αρχείο Σύμβαση εργασίας</td>
                    <td><a href='#'>Σύμβαση εργασίας</a></td>
                </tr>
                <tr>
                    <td>Κατάσταση εργαζομένου</td>
                    <td>
                      <select id='status' name='status'>
                        <option value='<?php echo "$status"; ?>'><?php echo "$status"; ?></option>
                        <option value='Ενεργή'>Ενεργή</option>
                        <option value='Αναβολή'>Αναβολή</option>
                        <option value='Τηλεργασία'>Τηλεργασία</option>
                      </select>
                    </td>
                </tr>
                <tr>
                    <td>Από</td>
                    <td><label for='start_date' style='display:none;'>Αρχική Ημερομηνία</label>
                    <input type = 'date' name='start_date' id='start_date' value='<?php echo "$start_date"; ?>'></td>
                </tr>
                <tr>
                    <td>Μέχρι</td>
                    <td><label for='end_date' style='display:none;'>Τελική Ημερομηνία</label>
                    <input type = 'date' name='end_date' id='end_date' value='<?php echo "$end_date"; ?>'></td>
                </tr>
              </tbody>
            </table>
            <div id="comments">
              <div style='float: right;'>
                <input type='submit' name='submit' value='Υποβολή' style='background-color: #813DAA; color: #FFFFFF;'>
              </div>
            </div>
          </div>
        </form>
    </div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc clear"> 
    <div class="content three_quarter first min_info">
      <div class="flex_row">
        <img class="single_logo" src="../images/logo_big.png" alt="Υπουργειο εργασίας λογότυπο">
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
    <p class="fl_left">Copyright &copy; 2020 - All Rights Reserved - <a href="#">https://www.ypakp.gr</a></p>
    <a href="#" ><p class="fl_right">Προσωπικά Δεδομένα και Ασφάλεια</p></a>
  </div>
</div>
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<a id="backtotop" href="#top" title="chevron"><i class="fas fa-chevron-up"></i></a>
<!-- ################################################################################################ -->

<!-- JAVASCRIPTS -->
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>

</body>
</html>