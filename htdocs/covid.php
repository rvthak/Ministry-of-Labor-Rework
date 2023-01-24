<!DOCTYPE html>
<html lang="el">
<head>
  <title>Πανδημία</title>
  <style>.not-allowed {cursor: not-allowed;}</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../layout/styles/collapsible.css">
  <link rel="icon" href="images/logo.ico">
</head>

<body id="top" onload="select('op1')">

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

          <li ><a class="drop" href="employees.php">&nbsp;Εργαζομενοι</a>
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
<div id="breadcrumb" class="hoc clear" style=" margin-left:225px;">
      <ul>
        <li><a href="../index.php" title="Αρχική"><i class="fa fa-home"></i></a></li>
        <li > <a href="covid.php" style="font-size: inherit;"><b>COVID</b></a></li>
      </ul>
    </div>
</div>


<div class="side" style="top: 250px; left: 30px; ">
  <a href="#" id="op1" onclick="activate('op1')" style="font-size: 16px;" >Oδηγίες και Mέτρα Πρόληψης</a>
  <a href="#" id="op2" onclick="activate('op2')" style="font-size: 16px;" >Κρούσμα σε εργασιακό περιβάλλον</a>
  <a href="#" id="op3" onclick="activate('op3')" style="font-size: 16px;">Πληροφορίες για Εργαζόμενους</a>
  <a href="#" id="op4" onclick="activate('op4')" style="font-size: 16px;">Πληροφορίες για Εργοδότες</a>
</div>

<div class="wrapper row3 dynamic_segment" style="padding-left:380px; font-family: Arial;">
    <div id="odigies_metra">
      <ul style="padding: 0 60px; max-width: 80%;">
        <h1 style="text-align: center; padding: 30px 0 10px 0px;  font-family: Arial;"> <b>Oδηγίες και Mέτρα Πρόληψης</b></h1>

        <h2 class="metra_header" style="font-family: inherit;">&nbsp;Οδηγίες προστασίας για Εργασιακούς Χώρους</h2>
        <div style="font-size:  15.5px;">
          <ol>
            <li>Αυστηρή Τήρηση Απόστασης 2 μέτρων ανάμεσα στους εργαζόμενους</li>
            <li>Εμβαδόν γραφείου έως 20 τ.μ. επιτρέπονται μέχρι 3 άτομα, από 20 τ.μ. – 100 τ.μ. 4 άτομα + 1 άτομο για κάθε επιπλέον 10 τ.μ. - Εμβαδόν άνω των 100 τ.μ. μέχρι 12 άτομα + 1 άτομο για κάθε επιπλέον 15 τ.μ.</li>
            <li>Συχνή και σωστή υγιεινή των χεριών με σαπούνι και νερό ή αλκοολούχο αντισηπτικό</li>
            <li>Αποφυγή επαφής των χεριών με τα μάτια την μύτη και το στόμα</li>
            <li>Καλός και συχνός αερισμός των χώρων</li>
            <li>Ελαχιστοποίηση των επαφών μεταξύ των εργαζομένων</li>
            <li>Συχνός καθαρισμός των χώρων και ιδιαίτερα των κοινόχρηστων αντικειμένων(πόμολα, κουπαστές, φωτοτυπικά, διακόπτες κλπ.)</li>
            <li>Ατομική χρήση προσωπικών αντικειμένων και γραφικής ύλης (συρραπτικό, στυλό,πληκτρολόγιο, ποντίκι κλπ.)</li>
          </ol>
        </div>

        <h3 class="metra_header" style="font-family: inherit;">&nbsp;Μέτρα πρόληψης κατά της διασποράς του COVID σε επιχειρήσεις </h3>
        <div style="font-size:  15.5px;">
          <ol>
            <li>Αποτροπή της εισόδου πολλών ατόμων ταυτόχρονα στην επιχείρηση (1 άτομο /10τετραγωνικά μέτρα, ώστε να αποφεύγεται ο συγχρωτισμός </li>
            <li>Ύπαρξη, σε ευκρινή θέση στις εισόδους και τις εξόδους των καταστημάτων, φιάλης αλκοολούχου διαλύματος (με αντλία έγχυσης και βάση) για την υγιεινή τωνχεριών, προς χρήση των πελατών.</li>
            <li>Οι υπάλληλοι να φορούν γάντια και να πλένουν τα χέρια τους μετά την απόρριψη αυτών</li>
            <li>Αποφυγή χρήσης μετρητών κατά τη συναλλαγή.</li>
            <li>Εφοδιασμό των αποχωρητηρίων με υγρό σαπούνι, χειροπετσέτες μιας χρήσης, (οι οποίες θα απορρίπτονται σε ποδοκίνητους κάδους πλησίον των νιπτήρων), αντισηπτικό αλκοολούχο διάλυμα (περιεκτικότητας 70% σε αλκοόλη)</li>
            <li>Επιμελής και συχνός καθαρισμός των αντικειμένων κοινής χρήσης</li>
          </ol>
        </div>

        <h4 class="metra_header" style="font-family: inherit;">&nbsp;Οι εργαζόμενοι μπορούν να εισέρχονται στον χώρο εργασίας τους μονάχα εαν:</h4>
        <div style="font-size: 15.5px;">
          <ol>
            <li>ΔΕΝ εμφανίζουν συμπτώματα οξείας λοίμωξης αναπνευστικού (βήχα, πυρετό,πονόλαιμο, ρινική καταρροή, δύσπνοια)</li>
            <li>ΔΕΝ αποτελούν στενή επαφή επιβεβαιωμένου κρούσματος Covid-19 </li>
            <li>ΔΕΝ ανήκουν στις ευπαθείς ομάδες καθ’ υπόδειξη του θεράποντος ιατρού τους</li>
            <li>ΔΕΝ υπάρχει σοβαρό υποκείμενο πρόβλημα υγείας που τους καθιστά ευάλωτους έναντι του Covid-19 σε σχέση με τα καθήκοντά τους στη θέση εργασίας</li>
          </ol>
        </div>
        
      </ul>
      <div style="width: 80%; text-align: center; padding-top: 20px; font-size: 18px; padding-bottom: 25px;">
        <a href="#" style="font-family: inherit; "><b>Αναλυτικά όλα τα μέτρα του Υπουργείου για Ειδικές Κατηγορίες Επιχειρήσεων</b></a>
      </div>
    </div>
</div>


<div class="wrapper row2 dynamic_segment" style="padding-left:380px; font-family: Arial;">
  <div id="krousma" style="padding: 0 60px; max-width: 80%;">
    <h1 style="text-align: center; padding: 80px 0 40px 0px; font-family: inherit;"> <b>Αντιμετώπιση Κρούσματος σε Εργασιακό περιβάλλον</b></h1>
    <h2 style="font-family: inherit;">Σε περίπτωση που κάποιο άτομο στον χώρο εργασίας σας εμφανίσει κάποιο από τα παρακάτω συμπτώματα: </h2>
    <ol style="font-size: 16px;">
      <li> Απομόνωση του ατόμου που εμφάνισε τα συμπτώματα</li>
      <li> Άμεση ενημέρωση του προϊστάμενου του και του συντονιστή διαχείρισης COVID-19, το ύποπτο κρούσμα φοράει μάσκα, αποχωρεί από τον χώρο εργασίας και παραμένει στο σπίτι του για ανάρρωση ή καλείται το ΕΚΑΒ για τη μεταφορά του στον εγγύτερο υγειονομικό σχηματισμό</li>
      <li> Καλός διαμπερής αερισμός του χώρου και απολύμανση των επιφανειών</li>
      <li> Ο συντονιστής διαχείρισης COVID-19 ενημερώνει τον ΕΟΔΥ για, επιδημιολογική διερεύνηση και ιχνηλάτηση όλων των πιθανών επαφών του κρούσματος (προσωπικού και επισκεπτών κλπ)</li>
    </ol>

    <div style=" text-align: center; padding-top: 20px;">
      <img src="images/til.png" alt="Τηλεφωνική γραμμή ΕΟΔΥ">
    </div>
  </div>
</div>


<div class="wrapper row3 dynamic_segment" style="padding-left:380px; font-family: Arial;">
  <div id="ergazomenoi" style="padding: 0 60px; max-width: 80%; ">
    <h1 style="text-align: center; padding: 60px 0 20px 0px; font-family: inherit;"> <b>Σημαντικές Πληροφορίες για Εργαζόμενους</b></h1>

    <p style="font-family: inherit; font-size: 18px;">Για την ενίσχυση των Εργαζομένων στην Ελλάδα, και την ευκολότερη προσαρμογή του Εργατικού Δυναμικού της χώρας στις νέες συνθήκες που επιβάλλει η πανδημία του COVID-19, παρέχονται υπό την Αιγίδα του Υπουργείου Εργασίας και της ΕΕ, οι εξής δυνατότητες: </p>
    <ol style="font-size: 16px;">
      <li style="margin-bottom: 20px;">
        <h2 class="erga_h4s" style="font-family: inherit; margin-bottom: 5px;"><b>Τηλεργασία</b></h2>
        <p style="margin-top: 5px; margin-bottom: 5px;"> <b>Όλοι</b> οι εργαζόμενοι έχουν το δικαίωμα, <b>εφόσον το επάγγελμά τους το επιτρέπει</b>, να εργαστούν από τον χώρο κατοικίας τους. Ο αριθμός ωρών εργασίας καθώς και η πληρωμή, παραμένουν αυστηρά οι ίδιοι, ενώ το νέο ωράριο (αν αλλάζει) καθορίζεται κατόπιν συννενόησης με τον εργοδότη<br> Για να μπείτε ύπο καθεστός Τηλεργασίας, αρκεί να έρθετε σε επαφή με τον εργοδότη σας</p>

      </li>
      <li> 
        <h3 class="erga_h4s" style="font-family: inherit; margin-bottom: 5px;"><b>Προσωρινή Αναστολή Σύμβασης Εργασίας</b></h3>
        <p style="margin-top: 5px;"> Όλοι οι εργαζόμενοι <b> με προβλήματα υγείας ή με κοντινούς συγγενείς με προβλήματα υγείας</b> έχουν το δικαίωμα να ζητήσουν από τον Εργοδότη τους Προσωρινή Αναστολή της Σύμβασης Εργασίας τους, <b> διάρκειας μέχρι 2 μηνών</b>, για λόγους προστασίας της ατομικής ή οικογενειακής τους υγείας <br> Για να αιτηθείτε αναστολή σύμβασης εργασίας αρκεί να έρθετε σε επαφή με τον εργοδότη σας. <br> <b>Σημαντική σημείωση:</b> Οι Εργοδότες έχουν το δικαίωμα να θέσουν σε αναστολή οποιονδήποτε εργαζόμενο το αιτηθεί ή όποιον/όποιους κρίνουν μη-απαραίτητους για την λειτουργία των επιχειρήσεων για την περίοδο της πανδημίας</p>
      </li>
      <li>
        <h4 class="erga_h4s" style="font-family: inherit; margin-bottom: 5px;"><b>Άδειες Ειδικού Σκοπού για Εμβολιασμό κατά του COVID</b></h4>
        <p style="margin-top: 5px;"> Όλοι οι εργαζόμενοι έχουν το δικαίωμα να πάρουν άδεια ειδικού σκοπού διάρκειας 1 ημέρας, <b>ώστε να εμβολιαστούν κατά του COVID-19</b>. Η επιβεβαίωση του εμβολιασμού γίνεται από τον ίδιο τον υπεύθυνο Ιατρό, συνεπώς για να πάρετε την συγκεκριμένη άδεια αρκεί να υποβάλετε την αντίστοιχη αίτηση μέσω της πλατφόρμας μας από τον παρακάτω σύνδεσμο: </p>
        <div style="text-align: center;">
          <!-- FTIAXE AUTO TO LINK vvv -->
          <a href="/ergazomenoi/aithsh_adeias.php" ><b>Αίτηση Άδειας για Εμβολιασμό</b></a>
        </div>
      </li>
    </ol>
  </div>
  <div style="width: 80%; text-align: center; padding-top: 40px; font-size: 18px; padding-left: 20px; padding-bottom: 25px;">
    <a href="#" style="font-family: inherit;"><b>Περισσότερες Πληροφορίες για Εργαζόμενους</b></a>
  </div>
</div>


<div class="wrapper row2 dynamic_segment" style="padding-left:380px; font-family: Arial;">
  <div id="ergodotes" style="padding: 0 60px; max-width: 80%;">
    <h1 style="text-align: center; padding: 80px 0 40px 0px; font-family: inherit;"> <b>Σημαντικές Πληροφορίες για Εργοδότες</b></h1>
    <p style="font-family: inherit; font-size: 18px;">Για την ενίσχυση των Εργοδοτών στην Ελλάδα, και την ευκολότερη προσαρμογή των Επιχειρήσεων της χώρας στις νέες συνθήκες που επιβάλλει η πανδημία του COVID-19, παρέχονται υπό την Αιγίδα του Υπουργείου Εργασίας και της ΕΕ, οι εξής δυνατότητες: </p>

    <ol style="font-size: 16px;">
      <li style="margin-bottom: 20px;">
        <h2 class="erga_h4s" style="font-family: inherit; margin-bottom: 5px;"><b>Μερική Χρηματοδότηση Μισθών και Ασφαλιστικών κόστων</b></h2>
        <p style="margin-top: 5px; margin-bottom: 5px;"> Όλοι οι Εργοδότες μικρομεσαίων επιχειρήσεων έχουν το δικαίωμα, υποβάλλοντας την κατάλληλη αίτηση μέσω της πλατφόρμας μας να λάβουν χρηματοδοτική ενίσχυση σε μορφή μερικής χρηματοδότησης μισθών εργαζομένων, ή/και σε μορφή έκπτωσης στα ασφαλιστικά κόστη της επιχείρησης. Το πρόγραμμα συγχρηματοδοτείται από την ΕΕ με στόχο την ενίσχυση και σταθεροποίηση της Ευρωπαικής οικονομιας έναντι στα προβλήματα που έχουν προκληθεί από τον COVID-19. Για να υποβάλετε την αίτηση χρηματοδότησης, ακολουθήστε τον παρακάτω σύνδεσμο</p>
        <div style="text-align: center;">
          <!-- FTIAXE AUTO TO LINK vvv -->
          <a href="#" ><b>Αίτηση Χρηματοδοτικής ενίσχυσης</b></a>
        </div>
      </li>
      <li style="margin-bottom: 20px;">
        <h3 class="erga_h4s" style="font-family: inherit; margin-bottom: 5px;"><b>Προσωρινή Αναστολή Σύμβασης Εργασίας</b></h3>
        <p style="margin-top: 5px; margin-bottom: 5px;"> Στην περίπτωση που μια επιχείρηση λόγω των συνθηκών που έχει επιβάλει η πανδημία, δυσκολεύεται να λειτουργήσει αποδοτικά, ο εργοδότης υπεύθυνος της επιχείρησης έχει το δικαίωμα να θέσει κάποιους ή ακόμα και όλους τους εργαζόμενους της επιχείρησης ύπο καθεστος αναστολής, "παγώνοντας" την σύμβασή εργασίας τους προσωρινά, ώστε να μπορέσει η επιχείρηση να συνεχίσει να λειτουργεί μετά την άρση των περιοριστικών μέτρων.  Οι ενδιαφερόμενοι εργοδότες μπορούν να θέσουν εργαζόμενους σε αναστολή μέσω του λογαριασμού τους στην πλατφόρμα μας, από την επιλογή "Τροποποίηση Εργαζομένου" της σελίδας χρήστη τους αφού συνδεθούν 
        <div style="text-align: center;">
          <!-- FTIAXE AUTO TO LINK vvv BALE NA KANEI ANAKATEYUYNSH SE EPIXEIRHSH MOY -->
          <a href="/authentication/login.php" ><b>Αίτηση Αναστολή Σύμβασης Εργασίας</b></a>
        </div>
      </li>
      <li style="margin-bottom: 20px;">
        <h4 class="erga_h4s" style="font-family: inherit; margin-bottom: 5px;"><b>Φορολογική Ελάφρυνση για το έτος 2020-2021</b></h4>
        <p style="margin-top: 5px; margin-bottom: 5px;"> Όλες οι μικρομεσαίες επιχειρήσεις με μείωση ετήσιων εσόδων άνω του 30% για το έτος 2020-2021 δικαιούνται σημαντική ελάφρυνση των φορολογικών τους υποχρεώσεων για το έτος 2021-2022. Για να αιτηθείτε για φορολογική ελάφρυνση αρκει να ακολουθήσετε τον παρακάτω σύνδεσμο και να υποβάλετε την ηλεκτρονική αίτηση.
        <div style="text-align: center;">
          <!-- FTIAXE AUTO TO LINK vvv -->
          <a href="#" ><b>Αίτηση Φορολογικής Ελάφρυνσης</b></a>
        </div>
      </li>

    </ol>
      
  </div>
  <div style="width: 80%; text-align: center; padding-top: 20px; font-size: 18px; padding-left: 20px; padding-bottom: 40px;">
    <a href="#" style="font-family: inherit;"><b>Περισσότερες Πληροφορίες για Εργοδότες</b></a>
  </div>
</div>

<!-- ################################################################################## -->

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

<!-- ################################################################################# -->
<a id="backtotop" href="#top" title="Πίσω στην κορυφή"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<script type = "text/javascript">

var op_list = ['op1', 'op2', 'op3', 'op4'];
var id_list = ['#odigies_metra', '#krousma', '#ergazomenoi', '#ergodotes'];

</script>

<script>

var lock=0;

function scroll(id, target){
  $('html, body').animate({
    scrollTop: $(id_list[target]).offset().top - 110
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

    if (offsetTop>=0 && offsetTop<764) {
      select('op1');
    }
    else if(offsetTop>=764 && offsetTop<1500){
      select('op2');
    }
    else if(offsetTop>=1500 && offsetTop<2300){
      select('op3');
    }
    else if(offsetTop>=2300){
      select('op4');
    }
  }
}

</script>

</body>
</html>
