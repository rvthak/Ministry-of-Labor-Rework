<!DOCTYPE html>
<html lang="el">
<head>
  <title>Ραντεβού</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
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
          <li><a href="contact.php" title="Επικοινωνία"><b>Επικοινωνια</b></a></li>
          <?php
            session_start();
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
        <li><a href="licence.php">ΚΑΤΟΧΥΡΩΣΗ ΡΑΝΤΕΒΟΥ</a></li>
      </ul>
    </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <main class="hoc container clear"> 
  <!-- main body -->
  <div id="comments">
    <h2>Φόρμα καταχώρησης ραντεβού</h2>
    <p>Η εξυπηρέτηση των πολιτών γίνεται μόνο με καθορισμό ραντεβού. 
      <br> Παρακαλώ συμπληρώστε την παρακάτω φόρμα.</p>
    <form action='insert_appointment.php' method='post'>
      <div class="one_half first">   
        <?php
          // After submission, redirect to current page so set SESSION to current page
          $current_page = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
          $_SESSION['redirect_to'] = $current_page;

          require_once "../authentication/config.php";

          //Get datetimes
          $datetime_start = new DateTime('today');
          $datetime_end = new DateTime('+5 day');
          $datetime_start = $datetime_start->format('Y-m-d-H-i-s');
          $datetime_end = $datetime_end->format('Y-m-d-H-i-s');

          $sql = "SELECT datetime FROM rantevou";
          $result = mysqli_query($link, $sql);
          
          echo "<ul id='tmp_storage' style='display: none;'>";
          while($row = mysqli_fetch_assoc($result)){
            $datetime = $row["datetime"];
            if ($datetime >= $datetime_start && $datetime <= $datetime_end){
              echo "<li class='storage_elem'>".$row["datetime"]."</li>";
            } 
          }
          echo "</ul>";

          // Check if the user is logged in
          if(!isset($_SESSION["loggedin"])){
            echo '<p>Αν έχετε λογαριασμό, μπορείτε να
                  <link><a href="../authentication/login.php">συνδεδείτε</a></link>
                  για αυτόματη συμπλήρωση των πεδίων.</p>
                  <div class="one_third first">
                  <label for="name"><strong>Ονοματεπώνυμο/Επωνυμία επιχείρησης<span>*</span></label>
                  <input type="text" name="name" id="name" value="" size="22" required>
                </div>
                <div class="one_third">
                  <label for="phone" style="padding: 11px;">Τηλέφωνο<span>*</span></label>
                  <input type="phone" name="phone" id="phone" value="" size="22">
                </div>
                <div class="one_third first">
                    <label for="datetime" ><strong>Ημερομηνία και ώρα<span>*</span></label>
                    <input type="datetime-local" name="datetime" id="datetime" value="" size=22"" required>
                </div>
                <div class="one_third">
                  <label for="mail" style="padding: 1px;"><strong>Ηλεκτρονικό ταχυδρομείο</label>
                  <input type="mail" name="mail" id="mail" value="" size="22">
                </div>
                <div class="block clear">
                  <label for="text">Λόγοι κλεισίματος ραντεβού</label>
                  <textarea name="text" id="text" cols="10" rows="10"></textarea>
                </div>
                <div style="float: right;">
                  <input type="reset" name="reset" value="Εκκαθάριση">
                  &nbsp;
                  <input type="submit" name="submit" value="Υποβολή" style="background-color: #813DAA; color: #FFFFFF;">
                </div>';    
          }
          else{

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
                  <div class='one_third'>
                    <label for='phone' style='padding: 11px;'>Τηλέφωνο<span>*</span></label>";
                if ($row["phone"] != NULL){
                  $phone = $row["phone"];
                }
                else{
                  $phone = '';
                }
                echo "<input type='phone' name='phone' id='phone' value='".$phone."' size='22'>
                  </div>
                  <div class='one_third first'>
                    <label for='datetime'><strong>Ημερομηνία και ώρα<span>*</span></label>
                    <input type='datetime-local' name='datetime' id='datetime' value='' size='22' required>
                  </div>
                  <div class='one_third'>
                    <label for='mail' style='padding: 1px;'><strong>Ηλεκτρονικό ταχυδρομείο</label>
                    <input type='mail' name='mail' id='mail' value='".$row["email"]."' size='22'>
                  </div>
                  <div class='block clear'>
                    <label for='text'>Λόγοι κλεισίματος ραντεβού</label>
                    <textarea name='text' id='text' cols='25' rows='10'></textarea>
                  </div>
                  <div style='float: right;'>
                    <input type='reset' name='reset' value='Εκκαθάριση'>
                    &nbsp;
                    <input type='submit' name='submit' value='Υποβολή' style='background-color: #813DAA; color: #FFFFFF;'>
                  </div>";
            } else {
                echo "0 results";
            }
            mysqli_close($link);
          }
        ?>        
      </div>
      <div class="one_half" id="date_picker">
        <table cellspacine = "1" cellpadding = "5">
          <thead>
            <tr>
              <th>ΩΡΑ</th>
              <th class="table_header"></th>
              <th class="table_header"></th>
              <th class="table_header"></th>
              <th class="table_header"></th>
              <th class="table_header"></th>
              <th class="table_header"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>8:00</td>
              <td id="08:00_0" onclick="activate(this.id)" class="day_button"> </td>
              <td id="08:00_1" onclick="activate(this.id)" class="day_button"> </td>
              <td id="08:00_2" onclick="activate(this.id)" class="day_button"> </td>
              <td id="08:00_3" onclick="activate(this.id)" class="day_button"> </td>
              <td id="08:00_4" onclick="activate(this.id)" class="day_button"> </td>
              <td id="08:00_5" onclick="activate(this.id)" class="day_button"> </td>
            </tr>
            <tr>
              <td>8:30</td>
              <td id="08:30_0" onclick="activate(this.id)" class="day_button" > </td>
              <td id="08:30_1" onclick="activate(this.id)" class="day_button"> </td>
              <td id="08:30_2" onclick="activate(this.id)" class="day_button"> </td>
              <td id="08:30_3" onclick="activate(this.id)" class="day_button"> </td>
              <td id="08:30_4" onclick="activate(this.id)" class="day_button"> </td>
              <td id="08:30_5" onclick="activate(this.id)" class="day_button"> </td>
            </tr>
            <tr>
              <td>9:00</td>
              <td id="09:00_0" onclick="activate(this.id)" class="day_button"> </td>
              <td id="09:00_1" onclick="activate(this.id)" class="day_button"> </td>
              <td id="09:00_2" onclick="activate(this.id)" class="day_button"> </td>
              <td id="09:00_3" onclick="activate(this.id)" class="day_button"> </td>
              <td id="09:00_4" onclick="activate(this.id)" class="day_button"> </td>
              <td id="09:00_5" onclick="activate(this.id)" class="day_button"> </td>
            </tr>
            <tr>
              <td>9:30</td>
              <td id="09:30_0" onclick="activate(this.id)" class="day_button"> </td>
              <td id="09:30_1" onclick="activate(this.id)" class="day_button"> </td>
              <td id="09:30_2" onclick="activate(this.id)" class="day_button"> </td>
              <td id="09:30_3" onclick="activate(this.id)" class="day_button"> </td>
              <td id="09:30_4" onclick="activate(this.id)" class="day_button"> </td>
              <td id="09:30_5" onclick="activate(this.id)" class="day_button"> </td>
            </tr>
            <tr>
              <td>10:00</td>
              <td id="10:00_0" onclick="activate(this.id)" class="day_button"> </td>
              <td id="10:00_1" onclick="activate(this.id)" class="day_button"> </td>
              <td id="10:00_2" onclick="activate(this.id)" class="day_button"> </td>
              <td id="10:00_3" onclick="activate(this.id)" class="day_button"> </td>
              <td id="10:00_4" onclick="activate(this.id)" class="day_button"> </td>
              <td id="10:00_5" onclick="activate(this.id)" class="day_button"> </td>
            </tr>
            <tr>
              <td>10:30</td>
              <td id="10:30_0" onclick="activate(this.id)" class="day_button"> </td>
              <td id="10:30_1" onclick="activate(this.id)" class="day_button"> </td>
              <td id="10:30_2" onclick="activate(this.id)" class="day_button"> </td>
              <td id="10:30_3" onclick="activate(this.id)" class="day_button"> </td>
              <td id="10:30_4" onclick="activate(this.id)" class="day_button"> </td>
              <td id="10:30_5" onclick="activate(this.id)" class="day_button"> </td>
            </tr>
            <tr>
              <td>11:00</td>
              <td id="11:00_0" onclick="activate(this.id)" class="day_button"> </td>
              <td id="11:00_1" onclick="activate(this.id)" class="day_button"> </td>
              <td id="11:00_2" onclick="activate(this.id)" class="day_button"> </td>
              <td id="11:00_3" onclick="activate(this.id)" class="day_button"> </td>
              <td id="11:00_4" onclick="activate(this.id)" class="day_button"> </td>
              <td id="11:00_5" onclick="activate(this.id)" class="day_button"> </td>
            </tr>
            <tr>
              <td>11:30</td>
              <td id="11:30_0" onclick="activate(this.id)" class="day_button"> </td>
              <td id="11:30_1" onclick="activate(this.id)" class="day_button"> </td>
              <td id="11:30_2" onclick="activate(this.id)" class="day_button"> </td>
              <td id="11:30_3" onclick="activate(this.id)" class="day_button"> </td>
              <td id="11:30_4" onclick="activate(this.id)" class="day_button"> </td>
              <td id="11:30_5" onclick="activate(this.id)" class="day_button"> </td>
            </tr>
            <tr>
              <td>12:00</td>
              <td id="12:00_0" onclick="activate(this.id)" class="day_button"> </td>
              <td id="12:00_1" onclick="activate(this.id)" class="day_button"> </td>
              <td id="12:00_2" onclick="activate(this.id)" class="day_button"> </td>
              <td id="12:00_3" onclick="activate(this.id)" class="day_button"> </td>
              <td id="12:00_4" onclick="activate(this.id)" class="day_button"> </td>
              <td id="12:00_5" onclick="activate(this.id)" class="day_button"> </td>
            </tr>
            <tr>
              <td>12:30</td>
              <td id="12:30_0" onclick="activate(this.id)" class="day_button"> </td>
              <td id="12:30_1" onclick="activate(this.id)" class="day_button"> </td>
              <td id="12:30_2" onclick="activate(this.id)" class="day_button"> </td>
              <td id="12:30_3" onclick="activate(this.id)" class="day_button"> </td>
              <td id="12:30_4" onclick="activate(this.id)" class="day_button"> </td>
              <td id="12:30_5" onclick="activate(this.id)" class="day_button"> </td>
            </tr>
          </tbody>
        </table>
        <p style="text-align: center;"> Πράσινο = Η ώρα είναι διαθέσιμη | Κόκκινο = Η ώρα είναι δεσμευμένη</p>
        <p id="notify">Η ώρα που επιλέξατε δεν είναι διαθέσιμη</p>
      </div>
    </form>
  </div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
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
<a id="backtotop" href="#top" title="Αρχική"><i class="fas fa-chevron-up"></i></a>
  <!-- JAVASCRIPTS -->
  <script src="../layout/scripts/jquery.min.js"></script>
  <script src="../layout/scripts/jquery.backtotop.js"></script>
  <script src="../layout/scripts/jquery.mobilemenu.js"></script>
  <script src="../layout/scripts/moment.js"></script>
  <script src="../layout/scripts/select_date.js"></script>
  </body>
  </html>
