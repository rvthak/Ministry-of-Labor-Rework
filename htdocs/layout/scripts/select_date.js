

// Start by getting all the table headers to set their content

var table_header = document.getElementsByClassName("table_header");
var table_header_dates= [];
var day_count = table_header.length;


var currentDate = new Date();
var first = new Date();
var second = new Date();

currentDate = new Date();
currentDate = currentDate.toLocaleDateString('gr-GR', {year:"numeric",month:"2-digit", day:"2-digit"});
table_header_dates[0] = currentDate;
table_header[0].innerHTML = currentDate;

console.log( "Current Date: " + currentDate);

// Calculate next 5 days (NOT including Sundays)
nextDate = new Date();
var n=5;
var i=1;

while(i<=(day_count-1)){
	nextDate.setDate(nextDate.getDate()+1);

	// If its Sunday skip it
	if(nextDate.getDay() == 0){
		continue;
	}
	table_header_dates[i] = nextDate.toLocaleDateString('gr-GR', {year:"numeric",month:"2-digit", day:"2-digit"});
	table_header[i].innerHTML = table_header_dates[i];
	console.log( "Current Date + " + i + " : " + nextDate.toLocaleDateString('gr-GR', {year:"numeric",month:"2-digit", day:"2-digit"}));
	i++;
}

var active_cell_id=null;

function redify(id){
	document.getElementById(id).style.backgroundColor  = "#E75F51";
}

function greenify(id){
	document.getElementById(id).style.backgroundColor  = "#7dbc73";
}

function notifyUser(id){
	document.getElementById(id).style.display="block";
}

function dontNotify(id){
	document.getElementById(id).style.display="none";
}

function isSelected(id){

	var rgb = document.getElementById(id).style.backgroundColor;
	//console.log(rgb);
	
	var red = "rgb(231, 95, 81)";

	if( rgb == red ){
		return 1;
	}
	return 0;
}

function rgbToHex(r, g, b) {
  return "#" + componentToHex(r) + componentToHex(g) + componentToHex(b);
}

function activate(id){
	//console.log(id);

	if( isSelected(id) ){
		notifyUser("notify");
		return;
	}
	dontNotify("notify");

	if(active_cell_id != null){
		greenify(active_cell_id);
	}
	
	active_cell_id = id;
	redify(id);
	var date = getIdDate(id);
	console.log(date);
	document.getElementById("datetime").value = date;
}

function getReservations(){
	var tmp = document.getElementsByClassName('storage_elem');
	var reservations=[];
	var count = tmp.length;
	var i=0;

	for(i=0; i<count; i++){
		reservations[i] = document.getElementsByClassName('storage_elem')[i].innerText;
	}

	console.log(reservations);
	return reservations;
}


function getIdTime(id){
	console.log(id.substr(0, 5))
	return id.substr(0, 5);
}

function getIdDate(id){


	var id_len = id.length;
	var column = id.substr(id_len-1, id_len);
	column = parseInt(column);
	var date = table_header_dates[column];
	var time = getIdTime(id);
	var datetime = custonFormat(date, time);

	console.log(datetime);

	return moment(datetime).format("YYYY-MM-DDTkk:mm");
}

function getResDate(res){
	var date;

	date = res.substr(0, 10);
	console.log(date);
	return date;
}


function getResTime(res){
	var time;
	time = res.substr(11, 5);
	console.log(time);
	return time;
}

function getcustomIdDate(id){
	var id_len = id.length;
	var column = id.substr(id_len-1, id_len);
	column = parseInt(column);
	var date = table_header_dates[column];
	//console.log("DATE >>> " + date);

	var day=date.substr(3,2);
	//console.log("DAY >>> " + day);
	var month=date.substr(0,2);
	//console.log("MONTH >>> " + month);
	var year=date.substr(6,4);
	//console.log("YEAR >>> " + year);

	date = year + "-" + month + "-" + day;

	return date;
}

function isReserved(res, id){
	
	var i=0;
	var id_date=getcustomIdDate(id);
	var id_time=getIdTime(id);
	var res_date;
	var res_time;

	// For the given id check if it overlaps with any of the reservations
	for( i=0; i<res.length; i++){
		res_date=getResDate(res[i]);
		res_time=getResTime(res[i]);
		//console.log(id_date);
		//console.log(id_time);
		if((res_time==id_time)&&(res_date==id_date)){
			return 1;
		}
	}

	return 0;
}


function initializeTable(){
	console.log(" > Initializing Table: ");
	
	var cells = document.getElementsByClassName("day_button");
	var cell_amount = cells.length;
	var i;

	var res = getReservations();

	for(i=0; i<cell_amount; i++){
		if( isReserved(res, cells[i].id) ){
			redify(cells[i].id);
		}
		else{
			greenify(cells[i].id);
		}
	}
}

function custonFormat(date, time){

	//console.log(date);
	var day = date.substr(3, 2);
	var month = date.substr(0, 2);
	var year = date.substr(6, 7);

	date = year + "-" + month + "-" + day;
	
	return (date + "T" + time);
}

window.addEventListener('load', (event) => {
	console.log("LOADED");
  	initializeTable();
});