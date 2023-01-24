

function showDocs(select){

	var contents = select.options[select.selectedIndex].value;
	var targetDiv = document.getElementById('conf_doc_container');
	var targetText = document.getElementById('descriptor');

	if( contents == "Ετήσια άδεια"){
		targetDiv.style.display = "none";
	}
	else if( contents == "Αδεια Ανευ Aποδοχών" ){
		targetDiv.style.display = "none";
	}
	else if( contents == "Άδεια λόγω Aσθένειας" ){
		targetDiv.style.display = "block";
		targetText.innerHTML = " Ιατρική Βεβαίωση Ασθένειας ";
	}
	else if( contents == "Άδεια εμβολιασμού κατά του COVID-19" ){
		targetDiv.style.display = "none";
	}
	else if( contents == "Άδεια γονικής φροντίδας" ){
		targetDiv.style.display = "block";
		targetText.innerHTML = " Πιστοποιητικό Γέννησης Τέκνου ";
	}
	else if( contents == "Άδεια μητρότητας" ){
		targetDiv.style.display = "block";
		targetText.innerHTML = " Ιατρική Γνωμάτευση Εγκυμοσύνης ";
	}
	else if( contents == "Άδεια γάμου" ){
		targetDiv.style.display = "none";
	}
	else if( contents == "Άδεια γέννησης τέκνου" ){
		targetDiv.style.display = "block";
		targetText.innerHTML = " Πιστοποιητικό οικογενειακής κατάστασης ";
	}
}