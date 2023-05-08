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


// Get the modal
var modal2 = document.getElementById("myModal2");

// Get the button that opens the modal
var btn2 = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("close2")[0];

// When the user clicks the button, open the modal 
btn2.onclick = function() {
  modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span2.onclick = function() {
  modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}




// Get the modal
var modal4 = document.getElementById("myModal4");

// Get the button that opens the modal
var btn4 = document.getElementById("myBtn4");

// Get the <span> element that closes the modal
var span4 = document.getElementsByClassName("close4")[0];

// When the user clicks the button, open the modal 
btn4.onclick = function() {
  modal4.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span4.onclick = function() {
  modal4.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal4) {
    modal4.style.display = "none";
  }
}




// Get the modal
// var modal_new = document.getElementById("myModalnew");

// Get all the delete icon elements
// var deleteIcons = document.getElementsByClassName("delete-icon");

// // Add a click event listener to each delete icon element
// for (var i = 0; i < deleteIcons.length; i++) {
//   deleteIcons[i].onclick = function() {
//     modal_new.style.display = "block";
//   }
// }

// var deleteIcons = document.getElementsByClassName("delete-icon");
//     for (var i = 0; i < deleteIcons.length; i++) {
//         deleteIcons[i].onclick = function() {
//             var midwifeId = this.getAttribute("data-midwife-id");
//             var modal_new = document.getElementById("myModalnew" + midwifeId);
//             var form = document.getElementById("delete-form-" + midwifeId);
//             form.action = "<?php echo URLROOT; ?>/midwifes/delete/" + midwifeId;
//             // populate the form with the midwife details here
//             modal_new.style.display = "block";
//         }
//     }

//     function closeModal(midwifeId) {
//         var modal_new = document.getElementById("myModalnew" + midwifeId);
//         modal_new.style.display = "none";
//     }