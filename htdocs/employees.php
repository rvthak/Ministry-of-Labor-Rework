<!DOCTYPE html>
<html lang="el">
<head>
  <title>Εργαζόμενοι</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
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
          <li><a href="contact/contact.php" title="Επικοινωνία">Επικοινωνια</a></li>
          <?php
            session_start();
            // Set redirect_to SESSION to redirect to this page after logout or login
            $current_page = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $_SESSION['redirect_to'] = $current_page;
            // Check if the user is logged in, if not then redirect him to login page
            if(!isset($_SESSION["loggedin"])){
              echo '<li><a href="authentication/login.php" title="Κουμπί Σύνδεσης">Σύνδεση</a></li>';
              echo '<li><a href="authentication/register.php" title="Κουμπί Εγγραφής">Εγγραφή</a></li>';      
            }
            elseif($_SESSION["role_id"] == 1){
              echo '<li><a href="employee_profile/myemployment.php" class="btn btn-danger" title="Προφίλ εργαζόμενου">Η εργασία μου</a></li>';
              echo '<li><a href="authentication/logout.php" title = "Αποσύνδεση"><i class="fa fa-sign-out-alt"></i></a></li>';
            }
            else{
              echo '<li><a href="employer_profile/mybusiness.php" class="btn btn-danger" title="Προφίλ εργοδότη">Η επιχείρησή μου</a></li>';
              echo '<li><a href="authentication/logout.php" title = "Αποσύνδεση"><i class="fa fa-sign-out-alt"></i></a></li>';
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
          <a href="index.php"><img src="images/logo.png" style="height: 65px;" alt="Υπουργείο Εργασίας"></a>
      </div>

      <nav id="mainav" class="fl_right"> 

        <ul class="clear">

          <li><a class="nodrop" href="index.php" style="padding-top: 32px; padding-bottom: 30px;">Αρχικη</a></li>

          <li class="active"><a class="drop" href="employees.php">&nbsp;Εργαζομενοι</a>
            <ul>
              <li><a href="covid.php#ergazomenoi">Μέτρα λόγω πανδημίας</a></li>
              <li><a href="#">Συμβάσεις</a></li>
              <li><a href="employees/license.php">Άδειες</a></li>
              <li><a href="#">Επιδόματα</a></li>
              <li><a href="#">Απολύσεις</a></li>
            </ul>
          </li>
          <li><a class="drop" href="employers.php">&nbsp;Εργοδοτες</a>
            <ul>
              <li><a href="covid.php#ergodotes">Μέτρα λόγω πανδημίας</a></li>
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
<div class="wrapper bgded overlay gradient" style="z-index: 1; background-color:rgb(0, 0, 0);">
    <div id="breadcrumb" class="hoc clear"> 
      <ul>
        <li><a href="../index.php" title="Αρχική"><i class="fa fa-home"></i></a></li>
        <li class="active"> <a href="ergodotes.php" style="font-size: inherit;">ΕΡΓΑΖΟΜΕΝΟΙ</a></li>
      </ul>
    </div>
</div>

<!-- ################################################################################################ -->

<div class="one_quarter first" style="position: fixed; top: 300px; left: 90px; z-index: 3;">
	<h1>Ηλεκτρονικές υπηρεσίες</h1>
    <ul class="clear" style="font-size: 16px;">
      <li><a href="employees/license.php">Αίτηση άδειας</a></li>
      <li><a href="#">Αίτηση για επίδομα</a></li>
      <li><a href="#">Αίτηση για ένταξη <br>στο ταμείο ανεργίας</a></li>
      <li><a href="#">Υποβολή οικειοθελούς αποχώρησης <br> από την εργασία μου (Παραίτηση)</a></li>
      <li><a href="#">Αίτηση για σύνταξη</a></li>
    </ul>
</div>

<div class="wrapper row2" style="min-height:520px; ">
	<section class="hoc container clear"> 
    <div class="one_quarter first" style="opacity: 0;">
      <h1>Ηλεκτρονικές υπηρεσίες</h1>
      <ul class="clear">
        <li><a href="employees/license.php">Δήλωση της αποστάσεως εργασίας</a></li>
        <li><a href="#">Δήλωση της αναβολής εργασίας</a></li>
        <li><a href="#">Ρύθμιση οφειλών</a></li>
        <li><a href="#">Υπολογισμός έκπτωσης ασφαλιστικών εισφορών</a></li>
      </ul>
    </div>
	  <div class="three_quarter">
			<ul class="nospace group prices">
			<li class="one_third ">
			<article><i class="fas fa-exclamation"></i>
				<h1 class="heading">Μέτρα λόγω πανδημίας</h1>
				<p>Οι οδηγίες προς εργαζόμενους για την πανδημία. Μέτρα στήριξης επιχειρήσεων και εργοδοτών.</p>
				<footer><a class="btn" href="covid.php#ergazomenoi">Περισσότερα</a></footer>
			</article>
			</li>
			<li class="one_third">
			<article style="min-height: 350px;"><i class="fas fa-building"></i>
				<h1 class="heading">Συμβάσεις</h1>
				<p style="padding-top: 25px;">Αναλυτικά ότι πρέπει να γνωρίζετε για τις Συμβάσεις Εργασίας καθώς και η αντίστοιχη Νομοθεσία</p>
				<footer><a class="btn" href="#" style="margin-top: 2px;">Περισσότερα</a></footer>
			</article>
			</li>
			<li class="one_third" >
			<article style="min-height: 350px;">
				<i class="fas fa-home"></i>
				<h1 class="heading">αδειες</h1>
				<p>Ότι χρειάζεται να γνωρίζετε ώς εργαζόμενος για τις άδειες (Είδη αδειών, δικαιούχοι, αίτηση άδειας) </p>
				<footer><a class="btn" href="employees/license.php" style="margin-top: 25px;">Περισσότερα</a></footer>
			</article>
			</li>
		</ul>
		</div>
	</section>
</div>

<div class="wrapper row2" style="min-height:520px; ">
	<section class="hoc container clear"> 
    <div class="one_quarter first" style="opacity: 0;">
      <h1>Ηλεκτρονικές υπηρεσίες</h1>
      <ul class="clear">
        <li><a href="employees/license.php">Δήλωση της αποστάσεως εργασίας</a></li>
        <li><a href="#">Δήλωση της αναβολής εργασίας</a></li>
        <li><a href="#">Ρύθμιση οφειλών</a></li>
        <li><a href="#">Υπολογισμός έκπτωσης ασφαλιστικών εισφορών</a></li>
      </ul>
    </div>

	    <div class="three_quarter">
			  <ul class="nospace group prices">
			    <li class="one_third ">
      			<article><i class="fas fa-credit-card"></i>
      				<h1 class="heading">Επιδόματα</h1>
      				<p>Όλα τα διαθέσιμα επιδόματα που παρέχονται από το κράτος και την ΕΕ για την ενίσχυση των Εργαζομένων</p>
      				<footer><a class="btn" href="#">Περισσότερα</a></footer>
      			</article>
    			</li>
			<li class="one_third">
			<article style="min-height: 350px;"><i class="far fa-file-alt"></i>
				<h1 class="heading">Απολύσεις</h1>
				<p>Τα δικαιώματα, η νομοθεσία καθώς και τα καθεστώτα κάτω από τα οποία μπορεί ένας εργαζόμενος να χάσει την δουλειά του</p>
				<footer><a class="btn" href="#" style="margin-top: 2px;">Περισσότερα</a></footer>
			</article>
			</li>
			<li class="one_third" >
				<img src="/images/dist.jpg" alt="Αποστάσεις">
			</li>
		</ul>
		</div>
	  <!-- ################################################################################################ -->
	  
	  <!-- ################################################################################################ -->
	</section>
</div>

<!-- ################################################################################################ -->
<div class="wrapper row3">
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

<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <p class="fl_left">Copyright &copy; 2020 - All Rights Reserved - <a href="#">https://www.ypakp.gr</a></p>
    <a href="#" ><p class="fl_right">Προσωπικά Δεδομένα και Ασφάλεια</p></a>
  </div>
</div>
  <!-- ################################################################################################ -->
  <a id="backtotop" href="#top" title="Πίσω στην κορυφή"><i class="fas fa-chevron-up"></i></a>
  <!-- JAVASCRIPTS -->
  <script src="layout/scripts/jquery.min.js"></script>
  <script src="layout/scripts/jquery.backtotop.js"></script>
  <script src="layout/scripts/jquery.mobilemenu.js"></script>
  </body>
  </html>
