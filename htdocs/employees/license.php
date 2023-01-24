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
			// Set redirect_to SESSION to redirect to this page after logout or login
			$current_page = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			$_SESSION['redirect_to'] = $current_page;
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

<div class="wrapper bgded overlay gradient" style="background-color: black; ">
  <div id="breadcrumb" class="clear" style="margin-left: 160px; "> 
    <!-- ################################################################################################ -->
    <ul>
      <li><a href="../index.php" title="Αρχική"><i class="fa fa-home"></i></a></li>
      <li><a href="../employees.php">ΕΡΓΑΖΟΜΕΝΟΙ</a></li>
      <li><a href="license.php">ΑΔΕΙΕΣ</a></li>
    </ul>
    <!-- ################################################################################################ -->
  </div>
</div>

<div style="width: 80%; margin: auto;">
	<h1 style="font-size: 19px; padding-top: 35px; text-align: center;">  Από την σελίδα αυτή, μπορείτε να συμπληρώσετε και να υποβάλετε ηλεκτρονικά την αίτηση για οποιαδήποτε από τις διαθέσιμες άδειες έχετε ανάγκη </h1>
	<div style="padding: 20px; border-top: 2px solid black;"></div>
</div>

<div class="stack_container">
	<div class="left_stack" style="margin-left: 8%;">
		<div style="padding-left: 40px; font-family: Arial; width: 60%;">	
			

			<h2 style="font-family: Arial;"> <b> Ποιά είδη αδειών υπάρχουν διαθέσιμα; </b> </h2>
		</div>

		<ul id="collapse_list">
			<li> 
				<button type="button" class="collapsible"><h3>&nbsp;Ετήσια άδεια</h3></button>
				<div class="content_col">
					<p> Ολοι οι εργαζόμενοι οι οποίοι συνδέονται με σύμβαση ή σχέση εργασίας ορισμένου ή αορίστου χρόνου, 
					δικαιούνται να λάβουν ετήσια άδεια με αποδοχές απο την έναρξη της απασχόλησής τους σε συγκεκριμένη υπόχρεη 
					επιχείρηση. Η άδεια αυτή χορηγείται από τον εργοδότη αναλογικώς(ποσοστό) με βάση το χρονικό 
					διάστημα που ασχολήθηκε ο εργαζόμενος στον εργοδότη αυτό.Η αναλογία της χορηγούμενης άδειας υπολογίζεται 
					βάσει ετήσιας άδειας 20 εργασίμων ημερών επί πενθημέρου εβδομαδιαίας εργασίας και 24 εργασίμων ημερών  
					επί εξαημέρου η οποία αντιστοιχεί σε 12μήνες συνεχούς απασχόλησης.
					</p> 
					<h3 style="text-align: center;"> Δεν απαιτείται κάποιο δικαιολογητικό </h3>
				</div>
			</li>

			<li> 
				<button type="button" class="collapsible"><h4>&nbsp;Άδεια άνευ αποδοχών</h4></button>
				<div class="content_col"><p> Για την άδεια άνευ αποδοχών, δεν υπάρχει διάταξη που να προβλέπει τη χορηγησή της ή να ρυθμίζει γενικά το θέμα αυτό. Στην περίπτωση που ο εργαζόμενος ζητήσει άδεια άνευ
				αποδοχών, προκειμένου να τη λάβει, θα πρέπει να υπάρξει σύμφωνη γνώμη του εργοδότη, ο οποίος στα πλαίσια των αρχών της καλής πίστης και εκτιμώντας τις οικογενειακές, κοινωνικές ανάγκες και υποχρεώσεις του εργαζόμενου μπορεί να χορηγεί άδεια άνευ αποδοχών.
				Κατά το διάστημα χορήγησης άδειας άνευ αποδοχών, η σύμβαση εργασίας δε λύεται, απλώς αναστέλλεται η ισχύς της. Ο εργοδότης υποχρεούται να αποδεχθεί τις υπηρεσίες του εργαζόμενου μετά τη λήξη της άδεις άνευ αποδοχών.
				Tο ΝΣΚ (Γνωμοδ. 557/63) δέχεται ότι: η χορήγησή της δεν αποστερεί τον εργαζόμενο από το δικαίωμα να ζητήσει (βάσει του ΑΝ 539/45), την ετήσια με αποδοχές άδεια του, προκειμένου σύμφωνα με το σκοπό του νόμου, να παρασχεθεί σ’ αυτόν η δυνατότητα να αναπαυθεί με αυξημένα οικονομικά μέσα προς αναπλήρωση των αναλωθεισών στην εργασία του σωματικών ή πνευματικών του δυνάμεων.
				</p> 
				<h5 style="text-align: center;"> Δεν απαιτείται κάποιο δικαιολογητικό </h5>
				</div>
			</li>

			<li> 
				<button type="button" class="collapsible"><h1> &nbsp;Άδεια Λόγω Ασθένειας</h1></button>
				
				<div class="content_col">
					<p> Για να μπορέσει ένας εργαζόμενος να υπόκειται στις διατάξεις περί ασθενείας, θα πρέπει οπωσδήποτε να έχει εξεταστεί και να του έχει χορηγηθεί αποδεικτικό ασθενείας από γιατρό του αρμόδιου ασφαλιστικού φορέα.</p> 
					<h2> Απαραίτητα δικαιλογητικά </h2>
					<ol>
						<li>
							<p> Προς απόδειξη της ασθένειάς, αρκεί η βεβαίωση από ιδιώτη γιατρό</p>
						</li>
					</ol>
				</div>	
			</li>


			<li> 
				<button type="button" class="collapsible"><h1> &nbsp;Άδεια εμβολιασμού κατά του COVID-19</h1></button>
				
				<div class="content_col">
					<p> Όλοι οι εργαζόμενοι έχουν το δικαίωμα να πάρουν ειδική (πληρωμένη) άδεια από την εργασία τους διάρκειας μίας εργάσιμης μέρας για να "θωρακίσουν" τους εαυτούς τους από τον COVID-19, και να προστατεύσουν τα άτομα γύρω τους. </p> 
					<h2 style="text-align: center;"> Δεν απαιτείται κάποιο δικαιολογητικό, ο υπεύθυνος Ιατρός θα ολοκληρώσει τη διαδικασία για εσάς</h2>
				</div>	
			</li>

			<li> 
				<button type="button" class="collapsible"><h1>&nbsp;Άδεια Γονικής Φροντίδας</h1></button>
				<div class="content_col"><p> Ατομικό δικαίωμα για έως 4 μήνες γονικής άδειας, εκ των οποίων 2 μήνες είναι μη μεταβιβάσιμοι μεταξύ γονέων και αμείβονται. Το επίπεδο αμοιβής και το όριο ηλικίας του παιδιού καθορίζεται από το 92/85/ΕΟΚ και εξαρτάται από το είδος της εργασίας.

				</p> 
				<h2> Απαραίτητα δικαιλογητικά </h2>
				<ol>
					<li>
						<p> Πιστοποιητικό γέννησης του τέκνου από οποιοδήποτε ΚΕΠ</p>
					</li>
				</ol></div>
			</li>

			<li> 
				<button type="button" class="collapsible"><h1>&nbsp;Άδεια Μητρότητας</h1></button>
				<div class="content_col"><p> Οι εργαζόμενες μητέρες δικαιούνται άδεια μητρότητας συνολικής διάρκειας 17 εβδομάδων. Οι 8 εβδομάδες χορηγούνται υποχρεωτικά πριν την πιθανή ημερομηνία τοκετού, και οι υπόλοιπες 9 μετά τον τοκετό. Σε περίπτωση που ο τοκετός πραγματοποιηθεί σε προγενέστερη από την πιθανή ημερομηνία, το υπόλοιπο της άδειας χορηγείται μετά τον τοκετό, ώστε να συμπληρωθούν οι 17 εβδομάδες (Ε.Γ.Σ.Σ.Ε.2000-2001 άρθρο 7).
				</p> 
				<h2> Απαραίτητα δικαιλογητικά </h2>
				<ol>
					<li>
						<p> Ιατρική γνωμάτευση από τον υπεύθυνο γυναικολόγο που να επιβεβαιώνει την εγκυμοσύνη</p>
					</li>
				</ol></div>
			</li>

			<li>
				<button type="button" class="collapsible"><h1>&nbsp;Άδειες Γάμου και Γέννησης παιδιού</h1></button>

				<div class="content_col"><p> Ολοι οι εργαζόμενοι, οποιασδήποτε ειδικότητας και κλάδου δικαιούνται: (ΕΓΣΣΕ 1993– ΕΓΣΣΕ 2000)
					<ul>
						<li><p> Άδεια γάμου έξι (6) εργασίμων ημερών αν εργάζονται εξαήμερο και πέντε (5) εργασίμων ημερών αν εργάζονται πενθήμερο.</p></li>
						<li><p> Αδεια δύο (2) ημερών στον πατέρα για γέννηση  παιδιού.</p></li>
					</ul>
					Την άδεια γάμου δικαιούνται όλοι οι μισθωτοί, άνδρες και γυναίκες, ανεξαρτήτως του χρόνου υπηρεσίας τους στον εργοδότη χωρίς καμία άλλη προϋπόθεση εκτός από τη σύναψη του γάμου. Την άδεια γάμου δικαιούται ο μισθωτός κάθε φορά που θα συνάψει νόμιμο γάμο (θρησκευτικό ή πολιτικό). Παρόμοια ισχύουν και για την άδεια γέννησης παιδιού, δηλαδή δεν απαιτείται καμία άλλη προϋπόθεση για τη χορήγησή της (προϋπηρεσία στον ίδιο εργοδότη κ.λπ.) παρά είναι αρκετό το γεγονός γέννησης του παιδιού. Οι άδειες αυτές είναι με αποδοχές και  χορηγούνται κατά το χρόνο που συντελούνται τα γεγονότα αυτά (γάμος ή γέννηση παιδιού αντίστοιχα), μετά από αίτηση του εργαζόμενου. Αν δεν ζητηθεί κατά την τέλεση του γεγονότος ο μισθωτός δεν έχει δικαίωμα αξίωσης χορήγησής της σε άλλο χρόνο ή αποζημίωσής της σε χρήμα ενώ δεν συμψηφίζεται με την ετήσια κανονική άδεια.
				</p> 
				<h2> Απαραίτητα δικαιλογητικά </h2>
				<p> Για Άδειες Γάμου: </p>
				<ol>
					<li>
						<p>Δεν απαιτείται κάποιο δικαιολογητικό, παρόλα αυτά ο ενδιαφερόμενος υποχρεούται να παραδόσει στον εργοδότη του ενα φωτοαντίγραφο του συμβολαίου γάμου εντός 15 εργάσιμων ημερών.</p>
					</li>
				</ol>
				
				<p> Για Άδειες Γέννησης παιδιού: </p>
				<ol>
					<li>
						<p>Πιστοποιητικό οικογενειακής κατάστασης που μπορεί να βρεθεί σε οποιοδήποτε ΚΕΠ</p>
					</li>
				</ol></div>	
			</li>

		</ul>
	</div>
	<!-- ################################################################################################ -->
	<div class="right_stack" style="margin-left: 5%;">
	  <main class="clear file_form"> 
	    <!-- main body -->
	    <!-- ################################################################################################ -->
	    <div class="content"> 
	      <!-- ################################################################################################ -->
	      
	      <div id="comments" >
	        
			<h2>Φόρμα ηλεκτρονικής αίτησης άδειας</h2>
			<form action="preview.php" method="post">
				<?php
				// Check if the user is logged in
				if(!isset($_SESSION["loggedin"]) || (isset($_SESSION["loggedin"]) && $_SESSION["role_id"]==2)){
					echo '<p style="color:red;">Για να συμπληρώσετε και να υποβάλετε τη φόρμα, χρειάζεται να 
							<link><a href="../authentication/login.php"><b>συνδεθείτε</b></a></link>
							 ως εργαζόμενος.</p>
							<div class="one_half first">
							<label for="name">Ονοματεπώνυμο Εργαζόμενου</label>
							<input readonly class="not-allowed" type="text" name="name" id="name" value="" size="22" required>
						</div>
			
						<div class="one_half">
							<label for="afm">ΑΦΜ Εργαζόμενου<span>*</span></label>
							<input readonly class="not-allowed" type="url" name="afm" id="afm" value="" size="22">
						</div>
						<div class="one_half first">
							<label for="business">Επιχείρηση<span>*</span></label>
							<input readonly class="not-allowed" type="url" name="url" id="business" value="" size="22">
						</div>
						<div class="first">
							<label>Χρονικό διάστημα άδειας<span>*</span></label>
							<label for="start">Από<span>*</span></label>
							<input readonly class = "not-allowed" type="date" name="date" id="start" value="" size="22">
							<label for="end">Μέχρι<span>*</span></label>
							<input readonly class = "not-allowed" type="date" name="date" id="end" value="" size="22">
						</div>
			
						<div class="first">
							<label for="custom-select">Επιλέξτε τύπο άδειας<span>*</span></label>
								<select type="custom-select"  class="not-allowed" name="custom-select" id="custom-select" value="" style="width: 100%; height: 40px;">
									<option value="0">Τύπος άδειας:</option>
									<option value="Ετήσια άδεια">Ετήσια άδεια</option>
									<option value="Αδεια Ανευ">Άδεια άνευ αποδοχών</option>
									<option value="Άδεια λόγω ασθένειας">Άδεια λόγω ασθένειας</option>
									<option value="Άδεια εμβολιασμού">Άδεια εμβολιασμού κατά του COVID-19</option>
									<option value="Άδεια γονικής φροντίδας">Άδεια γονικής φροντίδας</option>
									<option value="Άδεια μητρότητας">Άδεια μητρότητας</option>
									<option value="Άδεια γάμου">Άδεια γάμου</option>
									<option value="Άδεια γέννησης τέκνου">Άδεια γέννησης τέκνου</option>
									
									<!-- Μπορούμε να έχουμε 2 πεδια επιλογής αδειων, ένα με τις γενικές κατηγορίες άδειας και ένα άλλο με τις πιο συγκεκριμένες? ) -->
								</select>
						</div>';    
				}
				else{
					// Include config file
					require_once "../authentication/config.php";
					// Create connection to get the name
					mysqli_select_db($link, "users");
					$id = $_SESSION["id"];
					$sql = "SELECT name FROM users where id = '$id'";
					$result = mysqli_query($link, $sql);

					if (mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_assoc($result);
						// output data of each row
						echo ' <div class="one_half first">
								<label for="name_employee">Ονοματεπώνυμο Εργαζόμενου</label>
								<input readonly type="text" name="name_employee" id="name_employee" value="'.$row["name"].'" size="22" required>
							</div>
				
							<div class="one_half">
								<label for="employee_id">ΑΦΜ Εργαζόμενου<span>*</span></label>
								<input readonly type="text" name="employee_id" id="employee_id" value="'.$id.'" size="22">
							</div>';

						// Create connection to get the name of the businness as select option
						mysqli_select_db($link, "business_employees");
						$sql = "SELECT business_name FROM business_employees where employee_id = '$id'";
						$result2 = mysqli_query($link, $sql);

						echo '
							<div class="one_half first">
								<label for="business_name">Επιχείρηση<span>*</span></label>
								<select type="custom-select" name="business_name" id="business_name" value="" style="width: 100%; height: 40px;">
						';

						while($row2 = mysqli_fetch_assoc($result2)){
							echo '
								<option value="'.$row2["business_name"].'">'.$row2["business_name"].'</option>
							';
						}

						echo '
						</select>
						</div>
						<div class="first">
							<label for="date"><b>Χρονικό διάστημα άδειας:</b><span>*</span></label>
							<label for="start_date">Από<span>*</span> <text id="firstDayAlert">Η ημέρα που επιλέξατε έχει περάσει</text> </label>
							<input type="date" name="start_date" id="start_date" value="" size="22" >

							<label for="end_date" style="margin-top:8px;">Μέχρι<span>*</span> <text id="secondDayAlert">Η ημέρα που επιλέξατε είναι πριν την αρχική μέρα</text></label>
							<input type="date" name="end_date" id="end_date" value="" size="22">
						</div>
			
						<div class="first">
							<label for="custom-select">Επιλέξτε τύπο άδειας<span>*</span></label>
								<select type="custom-select" name="type" id="type_of_leave" onchange="showDocs(this);" style="width: 100%; height: 40px;">
									<option value="0">Τύπος άδειας:</option>
									<option value="Ετήσια άδεια">Ετήσια άδεια</option>
									<option value="Αδεια Ανευ Aποδοχών">Άδεια άνευ αποδοχών</option>
									<option value="Άδεια λόγω Aσθένειας">Άδεια λόγω ασθένειας</option>
									<option value="Άδεια εμβολιασμού κατά του COVID-19">Άδεια εμβολιασμού κατά του COVID-19</option>
									<option value="Άδεια γονικής φροντίδας">Άδεια γονικής φροντίδας</option>
									<option value="Άδεια μητρότητας">Άδεια μητρότητας</option>
									<option value="Άδεια γάμου">Άδεια γάμου</option>
									<option value="Άδεια γέννησης τέκνου">Άδεια γέννησης τέκνου</option>

									<!-- Μπορούμε να έχουμε 2 πεδια επιλογής αδειών, ένα με τις γενικές κατηγορίες άδειας και ένα άλλο με τις πιο συγκεκριμένες? ) -->
								</select>
						</div>

						<div id="conf_doc_container">
							<label id="conf_doc_label" for="conf_doc">Ανεβάστε το απαραίτητο δικαιολογητικό <span style="color:red;"> σε μορφή .pdf </span>:<br> (<span id="descriptor"> </span>) </label>
							<input type="file" id="conf_doc" name="conf_doc" accept=".pdf">
						</div>
			
						<div style="float: right;">
							<input type="reset" name="reset" value="Εκκαθάριση">
							&nbsp;
							<input type="submit" name="submit" value="Συνέχεια" style="background-color: #813DAA; color: #FFFFFF;">
						</div>
						';
					} 
					else {
						echo "0 results";
					}
					mysqli_close($link);
				}
				?> 
	        </form>
	      </div>
	      <!-- ################################################################################################ -->
	    </div>
	    <!-- ################################################################################################ -->
	    <div class="clear"></div>
	  </main>
	</div>
</div>

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

<script type="text/javascript">

var currentDate = new Date();
var first = new Date();
var second = new Date();

currentDate = new Date();
currentDate = currentDate.toLocaleDateString('gr-GR');
currentDate = currentDate.split("/");

var curDay = currentDate[1];
if( curDay.length == 1){
	curDay = 0 + curDay;
}

var curMonth = currentDate[0];
if( curMonth.length == 1){
	curMonth = 0 + curMonth;
}

var curYear = currentDate[2];

currentDate =  curYear + "-" + curMonth + "-" + curDay;
console.log( "Current Date: " + currentDate);

// Check if the first given day has passed
document.getElementById("start_date").addEventListener("change", function() {
    var input = this.value;
    var dateEntered = new Date(input);
    console.log( "First Selected Day: " + input);

    // if the day has passed
    if ( input.localeCompare(currentDate)<0 ){
    	this.value = currentDate; 	// Reset the input
    	dayAlert("firstDayAlert"); 	// And let the user know whats wrong
    }
    else{ // Else there is no reason to show an error
    	removeAlert("firstDayAlert");
    	first = input;
    }
    
});

// Check if the second day is later than the first one
document.getElementById("end_date").addEventListener("change", function() {
    var input = this.value;
    var dateEntered = new Date(input);
    console.log( "Second Selected Day: " + input);

    // If second day is before first
    if ( input.localeCompare(first)<0 ){
    	this.value = first; 		// Reset the input
    	dayAlert("secondDayAlert"); 	// And let the user know whats wrong
    }
    else{ // Else there is no reason to show an error
    	removeAlert("secondDayAlert");
    	second = input;
    }

});

function dayAlert(id){
	document.getElementById(id).style.display = "block";
}

function removeAlert(id){
	document.getElementById(id).style.display = "none";
}


</script>

</body>
</html>
