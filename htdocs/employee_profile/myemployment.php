<?php
  session_start();

  // Unset redirect_to SESSION to redirect to index after logout
  unset($_SESSION['redirect_to']);
?>

<!DOCTYPE html>
<html lang="el">
<head>
  <title>Η εργασία μου</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link rel="icon" href="../images/logo.ico">
</head>
<body id="top" onload="select('op1');">
<!-- ################################################################################################ -->

<div id="fixed">
  <div class="wrapper row0">
    <div id="topbar" class="hoc clear" >
      <div class="fl_right">
        <!-- ################################################################################################ -->
        <ul class="nospace">
          <li><a href="#" title="English"><i class="fas fa-globe"></i> English</a></li>
          <li><a href="../contact/contact.php" title="Επικοινωνία">Επικοινωνια</a></li>
          <li><a href="myemployment.php" class="btn btn-danger" title="Προφίλ εργαζόμενου">Η εργασία μου</a></li>
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
        <li><a href="../index.php" title="Αρχικη"><i class="fa fa-home"></i></a></li>
        <li class="active"> <a href="ergasia.php" style="font-size: inherit;">Η ΕΡΓΑΣΙΑ ΜΟΥ</a></li>
      </ul>
    </div>
</div>

<div class="wrapper row2">
  <main class=" clear"> 

    <div class="side" style="top: 200px; left: 30px;">
      <a href="#" id="op1" onclick="activate('op1')">Εργασιακή κατάσταση</a>
      <a href="#" id="op2" onclick="activate('op2')">Τα στοιχεία μου</a>
      <a href="#" id="op3" onclick="activate('op3')">Τα Ραντεβού μου</a>
      <a href="#" id="op4" onclick="activate('op4')">Ηλεκτρονικές υπηρεσίες</a>
      <a href="#" id="op5" onclick="activate('op5')">Ιστορικό Αδειών</a>
    </div>

    <div class="main_content">

      <div class="content " id="katastasi"> 
        <h1>Εργασιακή κατάσταση</h1>
        <div class="scrollable">
            <table>
                <thead>
                    <tr>
                        <th>Επιχείρηση</th>
                        <th>Αρχείο Σύμβασης Εργασίας</th>
                        <th>Κατάσταση</th>
                        <th>Χρονικό διάστημα</th>
                    </tr>
                </thead>
                <tbody>
                  <?php

                  $employee_id = $_SESSION["id"];

                  // Include config file
                  require_once "../authentication/config.php";

                  $sql = "SELECT business_id, status, start_date, end_date FROM business_employees where employee_id = '$employee_id'";
                  $result = mysqli_query($link, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)){
                      $sql = "SELECT name FROM users where id = ".$row["business_id"]."";
                      $result2 = mysqli_query($link, $sql);
                      $row2 = mysqli_fetch_assoc($result2);
                      echo "<tr>
                              <td>".$row2["name"]."</td>
                              <td><a href='#'>Σύμβαση εργασίας</a></td>
                              <td>".$row["status"]."</td>";
                      if ($row["end_date"] == "0000-00-00" || $row["end_date"] == NULL)
                        $end_date = "Δεν έχει οριστεί";
                      else
                        $end_date = $row["end_date"];
                      echo    "<td>".$row["start_date"]." - ".$end_date."</td>
                            </tr>";

                            
                    }
                  }
                  else {
                    echo "0 results";
                  }
                  
                  ?>
                </tbody>
            </table>    
        </div>
      </div>
      <div></div>

      <div class="content member" id="stoixeia">
        <h1>Τα στοιχεία μου</h1>
        <div class="scrollable">
        <?php
          
          // Define variables and initialize with empty values
          $name = $email = $phone = "";
          $id = $_SESSION["id"];

          // Create connection to get the name
          $sql = "SELECT name, email, phone FROM users where id = '$id'";
          $result = mysqli_query($link, $sql);
          if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $name = $row["name"];
            $email = $row["email"];
            $phone = $row["phone"];
          }
          else {
            echo "0 results";
          }

        ?>
          <table>
            <tbody>
              <tr>
                  <td>Ονοματεπώνυμο</td>
                  <?php echo "<td>$name</td>"; ?>
              </tr>
              <tr>
                  <td>ΑΦΜ</td>
                  <?php echo "<td>$id</td>"; ?>
              </tr>
              <tr>
                  <td>Email</td>
                  <?php echo "<td>$email</td>"; ?>
              </tr>
              <tr>
                  <td>Τηλέφωνο</td>
                  <?php echo "<td>$phone</td>"; ?>
              </tr>
            </tbody>
          </table>
          <div id="comments">
          <div style='float: right;'>
            <form action="user_data.php">
              <input type='submit' name='submit' value='Τροποποίηση στοιχείων' style='background-color: #813DAA; color: #FFFFFF;'>
            </form>
          </div>
        </div>
        </div>
      </div>

      <div class="content member" id="ta_rantevou_mou">
        <h1>Τα Ραντεβού μου</h1>
        <p>Εδώ εμφανόζονται τα ραντεβού με το Υπουργείο Εργασίας που βρίσκονται σε ισχύ.</p>
        <?php
          $cur_dt = date('Y-m-d H:i:s');

          // Create connection to get the name
          $sql = "SELECT datetime, text FROM rantevou WHERE user_id = '$id' ";
          $result = mysqli_query($link, $sql);

          if (mysqli_num_rows($result) > 0) {
            echo "<table>
                  <thead>
                    <tr>
                      <th>Ημερομηνία και ώρα</th>
                      <th>Λόγοι ραντεβού</th>
                    </tr>
                  </thead>
                  <tbody>";
            while($row = mysqli_fetch_assoc($result)){
              $datetime = $row["datetime"];
              if ($datetime >= $cur_dt){
                echo "<tr>
                      <td>".$row["datetime"]."</td>
                      <td>".$row["text"]."</td>
                    </tr>";
              } 
            }
            echo "</tbody>
                </table>";

          }
          else {
            echo "Δεν υπάρχουν δεσμευμένα ραντεβού.";
          }
        ?>
      </div>
    
      <div class="content member" id="yphresies">
        <h1>Ηλεκτρονικές υπηρεσίες</h1>
        <ul class="clear">
          <li><a href="../employees/license.php">Αίτηση άδειας</a></li>
          <li><a href="#">Αίτηση για επίδομα</a></li>
          <li><a href="#">Αίτηση για ένταξη στο ταμείο ανεργίας</a></li>
          <li><a href="#">Υποβολή οικειοθελούς αποχώρησης από την εργασία μου</a></li>
          <li><a href="#">Αίτηση για σύνταξη</a></li>
        </ul>
      </div>

      <div class="content member" id="istoriko_adeion">
        <h1>Ιστορικό αδειών</h1>
        <p>Εδώ εμφανόζονται οι άδειες σε εκκρεμότητα με την αντίστοιχη επιχείρηση στην οποία εργάζεστε:</p>
        <?php

          // Create connection to get the name
          $sql = "SELECT business_name, start_date, end_date, type FROM adeies WHERE employee_id = '$id' and confirmed = 0";
          $result = mysqli_query($link, $sql);

          if (mysqli_num_rows($result) > 0) {
            echo "<table>
                  <thead>
                    <tr>
                      <th>Επιχείρηση</th>
                      <th>Τύπος άδειας</th>
                      <th>Από</th>
                      <th>Μέχρι</th>
                    </tr>
                  </thead>
                  <tbody>";
            while($row = mysqli_fetch_assoc($result)){
              echo "<tr>
                    <td>".$row["business_name"]."</td>
                    <td>".$row["type"]."</td>
                    <td>".$row["start_date"]."</td>
                    <td>".$row["end_date"]."</td>
                  </tr>";
              
            }
            echo "</tbody>
                </table>";

          }
          else {
            echo "Δεν υπάρχει άδεια σε εκκρεμότητα.";
          }
        ?>

        <p><br>Εδώ εμφανόζονται όλες οι άδειες που έχετε πάρει με την αντίστοιχη επιχείρηση στην οποία εργάζεστε:</p>
        <?php

          // Create connection to get the name
          $sql = "SELECT business_name, start_date, end_date, type FROM adeies WHERE employee_id = '$id' and confirmed = 1";
          $result = mysqli_query($link, $sql);

          if (mysqli_num_rows($result) > 0) {
            echo "<table>
                  <thead>
                    <tr>
                      <th>Επιχείρηση</th>
                      <th>Τύπος άδειας</th>
                      <th>Από</th>
                      <th>Μέχρι</th>
                    </tr>
                  </thead>
                  <tbody>";
            while($row = mysqli_fetch_assoc($result)){
              echo "<tr>
                    <td>".$row["business_name"]."</td>
                    <td>".$row["type"]."</td>
                    <td>".$row["start_date"]."</td>
                    <td>".$row["end_date"]."</td>
                  </tr>";
              
            }
            echo "</tbody>
                </table>";

          }
          else {
            echo "Δεν έχετε πάρει καμία άδεια.";
          }
          
          mysqli_close($link);
        ?>       
      </div>

    </div>
  </main>
</div>

<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc clear"> 

    <div class="content three_quarter first min_info">
      <div class="flex_row">
        <img class="single_logo" src="../images/logo_big.png" alt="λογότυπο Υπουργείου">
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

<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <p class="fl_left">Copyright &copy; 2020 - All Rights Reserved - <a href="#">https://www.ypakp.gr</a></p>
    <a href="#" ><p class="fl_right">Προσωπικά Δεδομένα και Ασφάλεια</p></a>
  </div>
</div>

<a id="backtotop" href="#top" title="επιστροφή στην κορυφή"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<script type = "text/javascript">

var op_list = ['op1', 'op2', 'op3', 'op4', 'op5'];
var id_list = ['#katastasi', '#stoixeia', '#ta_rantevou_mou', '#yphresies', '#istoriko_adeion'];

</script>

<script src="../layout/scripts/select.js"></script>

</body>
</html>