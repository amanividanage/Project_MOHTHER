// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}




function myFunction1() {
  var radio1 = document.getElementById("mother");
  var text1 = document.getElementById("text1");
  if (radio1.checked == true){
    text1.style.display = "block";
    text2.style.display = "none";
    text3.style.display = "none";
  } else {
     text1.style.display = "none";
  }
}

function myFunction2() {
  var radio2 = document.getElementById("father");
  var text2 = document.getElementById("text2");
  if (radio2.checked == true){
    text2.style.display = "block";
    text1.style.display = "none";
    text3.style.display = "none";
  } else {
     text2.style.display = "none";
  }
}

function myFunction3() {
  var radio3 = document.getElementById("guardian");
  var text3 = document.getElementById("text3");
  if (radio3.checked == true){
    text3.style.display = "block";
    text1.style.display = "none";
    text2.style.display = "none";
  } else {
     text3.style.display = "none";
  }
}