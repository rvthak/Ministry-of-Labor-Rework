
var lock=0;

function scroll(id, target){
  $('html, body').animate({
    scrollTop: $(id_list[target]).offset().top - 220
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

    if (offsetTop>=0 && offsetTop<160) {
      select('op1');
    }
    else if(offsetTop>=160 && offsetTop<400){
      select('op2');
    }
    else if(offsetTop>=400 && offsetTop<600){
      select('op3');
    }
    else if(offsetTop>=600 && offsetTop<780){
      select('op4');
    }
    else if(offsetTop>=780 && offsetTop<900){
      select('op5');
    }
    else if(offsetTop>=400 && offsetTop<600){
      select('op6');
    }
  }
}
