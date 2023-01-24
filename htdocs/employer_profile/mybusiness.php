<?php
  session_start();

  // Unset redirect_to SESSION to redirect to index after logout
  unset($_SESSION['redirect_to']);
?>

<!DOCTYPE html>
<html lang="el">
<head>
  <title>Η Επιχείρησή μου</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link rel="icon" href="../images/logo.ico">
</head>
<body id="top" onload="select('op1');">
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
                    <label for="search" style="display: none;">Αναζήτηση</label>
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
        <li><a href="../index.php" title="home"><i class="fa fa-home"></i></a></li>
        <li><a href="mybusiness.php">Η ΕΠΙΧΕΙΡΗΣΗ ΜΟΥ</a></li>
      </ul>
    </div>
</div>
<!-- ################################################################################################ -->
<div class="side" style="top: 250px; left: 50px; ">
  <a href="#" id="op1" onclick="activate('op1')" style="font-size: 16px;" >Στοιχεία επιχείρησης</a>
  <a href="#" id="op2" onclick="activate('op2')" style="font-size: 16px;" >Εργαζόμενοι</a>
  <a href="#" id="op3" onclick="activate('op3')" style="font-size: 16px;">Άδειες σε εκκρεμότητα</a>
  <a href="#" id="op4" onclick="activate('op4')" style="font-size: 16px;">Ραντεβού</a>
  <a href="#" id="op5" onclick="activate('op5')" style="font-size: 16px;">Ηλεκτρονικές υπηρεσίες</a>
  
</div>
<!-- ################################################################################################ -->
<div class="wrapper row2 dynamic_segment" style="padding-left:380px;">
  <main class="hoc container clear"> 

    <!-- ################################################################################################ -->
    <div class="content three_quarter" id="stoixeia"> 
      <h1>Στοιχεία επιχείρησης</h1>
      <?php        
        // Include config file
        require_once "../authentication/config.php";
        
        // Define variables and initialize with empty values
        $name = $year = $status = $office = $region = $end_mng = "";
        $id = $_SESSION["id"];

        $sql = "SELECT business_name, year, status, office, region, end_mng FROM business_data where id = $id";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);

          $name = $row["business_name"];
          $_SESSION["business_name"] = $name;
          $year = $row["year"];
          $status = $row["status"];
          $office = $row["office"];
          $region = $row["region"];
          $end_mng = $row["end_mng"];
        }
        else {
          echo "0 results";
        }
      ?>
      <div class="scrollable">
        <table>
          <tbody>
            <tr>
                <td>Επωνυμία</td>
                <?php echo "<td>$name</td>"; ?>
            </tr>
            <tr>
                <td>ΑΦΜ επιχείρησης</td>
                <?php echo "<td>$id</td>"; ?>
            </tr>
            <tr>
                <td>Έτος ίδρυσης</td>
                <?php echo "<td>$year</td>"; ?>
            </tr>
            <tr>
                <td>Κατάσταση επιχείρησης</td>
                <?php echo "<td>$status</td>"; ?>
            </tr>
            <tr>
                <td>Έδρα επιχείρησης</td>
                <?php echo "<td>$office</td>"; ?>
            </tr>
            <tr>
                <td>Νομός - Περιφέρεια</td>
                <?php echo "<td>$region</td>"; ?>
            </tr>
            <tr>
                <td>Λήξη διαχειριστικής περιόδου</td>
                <?php echo "<td>$end_mng</td>"; ?>
            </tr>
          </tbody>
        </table>
        <div id="comments">
          <div style='float: right;'>
            <form action="business_data.php">
              <input type='submit' name='submit' value='Τροποποίηση στοιχείων' style='background-color: #813DAA; color: #FFFFFF;'>
            </form>
          </div>
        </div>
      </div>
      <!-- ################################################################################################ -->
      <h1><br><br><br>Εργαζόμενοι</h1>
      <div class="scrollable" id="ergazomenoi">
        <table>
          <thead>
            <tr>
              <th>Ονοματεπώνυμο</th>
              <th>ΑΦΜ</th>
              <th>Αρχείο Σύμβασης Εργασίας</th>
              <th>Κατάσταση</th>
              <th>Χρονικό διάστημα</th>
            </tr>
          </thead>
          <tbody>
          <?php

            $id = $_SESSION["id"];

            $sql = "SELECT employee_id, status, start_date, end_date FROM business_employees where business_id = '$id'";
            $result = mysqli_query($link, $sql);

            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)){
                $sql = "SELECT name FROM users where id = ".$row["employee_id"]."";
                $result2 = mysqli_query($link, $sql);
                $row2 = mysqli_fetch_assoc($result2);
                echo "<tr id = '".$row["employee_id"]."'>
                      <td>".$row2["name"]."</td>
                      <td><label for ='".$row["employee_id"]."' style = 'display: none;'>ΑΦΜ</label>
                      <input readonly type = 'text' name='employee_id' id='".$row["employee_id"]."' value='".$row["employee_id"]."'></td>
                      <td><a href='#'>Σύμβαση εργασίας</a></td>
                      <td>".$row["status"]."</td>";
                if ($row["end_date"] == "0000-00-00" || $row["end_date"] == NULL)
                  $end_date = "Δεν έχει οριστεί";
                else
                  $end_date = $row["end_date"];
                echo  "<td>".$row["start_date"]." - ".$end_date."</td>
                      <td ><button style='padding: 10px;' onclick='submitRowAsForm(".$row["employee_id"].")'>Τροποποίηση</button></td>
                      </tr>";
              }
            }
            else {
              echo "0 results";
            }
            
          ?>
          <script>
          function submitRowAsForm(idRow) {

            form = document.createElement("form"); // CREATE A NEW FORM TO DUMP ELEMENTS INTO FOR SUBMISSION
            form.method = "post"; // CHOOSE FORM SUBMISSION METHOD, "GET" OR "POST"
            form.action = "business_employees.php"; // TELL THE FORM WHAT PAGE TO SUBMIT TO
            $("#"+idRow).children().each(function() { // GRAB ALL CHILD ELEMENTS OF <TD>'S IN THE ROW IDENTIFIED BY idRow, CLONE THEM, AND DUMP THEM IN OUR FORM
                  console.log("#"+idRow);
                  $(this).clone().appendTo(form);

              });
              
            $(document.body).append(form);
            form.submit(); // NOW SUBMIT THE FORM THAT WE'VE JUST CREATED AND POPULATED
          }
          </script>
          </tbody>
        </table>         
      </div>

      <div class="content member" id="adeies">
        <h1>Άδειες σε εκκρεμότητα</h1>
        <p>Εδώ εμφανόζονται οι αιτήσεις αδειών για να τις δεχτείτε ή να τις απορρίψετε.</p>
        <?php

          // Create connection to get the name
          $sql = "SELECT employee_id, name_employee, start_date, end_date, type FROM adeies WHERE business_name = '".$_SESSION["business_name"]."' and confirmed = 0";
          $result = mysqli_query($link, $sql);

          if (mysqli_num_rows($result) > 0) {
            echo "<table>
                  <thead>
                    <tr>
                      <th>Όνομα εργαζομένου</th>
                      <th>ΑΦΜ</th>
                      <th>Τύπος άδειας</th>
                      <th>Από</th>
                      <th>Μέχρι</th>
                    </tr>
                  </thead>
                  <tbody>";
            while($row = mysqli_fetch_assoc($result)){
              echo "<tr>
                    <td>".$row["name_employee"]."</td>
                    <td>".$row["employee_id"]."</td>
                    <td>".$row["type"]."</td>
                    <td>".$row["start_date"]."</td>
                    <td>".$row["end_date"]."</td>
                    <td><button style='padding: 4px 10px;' >Αποδοχή</button></td>
                    <td><button style='padding: 4px 10px;' >Απόρριψη</button></td>
                  </tr>";
              
            }
            echo "</tbody>
                </table>";

          }
          else {
            echo "Δεν υπάρχουν άδειες με εκκρεμότητα.";
          }
        ?>
      </div>

      <div class="content member" id="ta_rantevou_mou">
        <h1>Ραντεβού</h1>
        <p>Εδώ εμφανόζονται τα ραντεβού του εργοδότη της επιχείρησης με το Υπουργείο Εργασίας που βρίσκονται σε ισχύ.</p>
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
          
          mysqli_close($link);
        ?>
      </div>

      <div class="scrollable"  id="yphresies">
        <h1><br><br>Ηλεκτρονικές υπηρεσίες</h1>
        <ul class="clear">
          <li><a href="#">Πιστοποίηση εργοδοτών</a></li>
          <li><a href="#">Ηλεκτρονική υποβολή ΑΠΔ</a></li>
          <li><a href="#">Ασφαλιστική ενημερότητα</a></li>
          <li><a href="#">Ρύθμιση οφειλών</a></li>
				  <li><a href="#">Υπολογισμός έκπτωσης ασφαλιστικών εισφορών</a></li>
        </ul>
      </div>

    </div>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc clear"> 
    <div class="content three_quarter first min_info">
      <div class="flex_row">
        <img class="single_logo" src="../images/logo_big.png" alt = "Υπουργείο εργασίας 2">
        <p class="yp_name"> Υπουργείο Εργασίας και <br> Κοινωνικών Υποθέσεων</p>
        <ul>
          <li><a href="../status_reports/under_construction.html"> Ρόλος του Υπουργείου </a></li>
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
    <a href="#"><p class="fl_right">Προσωπικά Δεδομένα και Ασφάλεια</p></a>
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

<script type = "text/javascript">

var op_list = ['op1', 'op2', 'op3', 'op4', 'op5'];
var id_list = ['#stoixeia', '#ergazomenoi', '#adeies' , '#ta_rantevou_mou', '#yphresies'];

var lock=0;

function scroll(id, target){
  $('html, body').animate({
    scrollTop: $(id_list[target]).offset().top - 270
  }, 500);
}

function bold(id){ 
  element = document.getElementById(id);
  var text = document.getElementById(id).innerText;
  document.getElementById(id).innerHTML = text.bold();
}

function unbold(id) { 
  element = document.getElementById(id);
  var text = document.getElementById(id).innerText;
  document.getElementById(id).innerHTML = text;
}

function select(id){
  var index=0;
  // Deactivate all elements
  for (var i = 0; i < op_list.length; i++) {
    //console.log("Deactivating id:" + op_list[i]);
    unbold(op_list[i]);
    if(op_list[i]==id){
      index=i;
    }
  }
  //console.log("Activating id:" + id);

  // And activate the clicked one
  bold(id);

  return index;
}

function activate(id){
  if(!lock){
    console.log( id + ": locking");
    // Lock the scrolling functions
    lock = 1;
    
    // Select the option
    var index = select(id);

    // Safely Scroll to the desired point
    scroll(id,index);

    // Unlock after the scrolling animation has completed
    setTimeout(() => { lock = 0; console.log( id + ": unlocking"); }, 500);
  }
}


// For auto-select of option during scrolling 
// Conflicts with simple select() :(

window.onscroll = function() {
  if (!lock){
    offsetTop = this.scrollY;
    console.log(this.scrollY);

    if (offsetTop>=0 && offsetTop<300) {
      select('op1');
    }
    else if(offsetTop>=300 && offsetTop<600){
      select('op2');
    }
    else if(offsetTop>=600 && offsetTop<900){
      select('op3');
    }
    else if(offsetTop>=900 && offsetTop<999){
      select('op4');
    }
    else if(offsetTop>=999){
      select('op5');
    }
  }
}

</script>

</body>
</html>