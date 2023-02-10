// for the request button

// Get the modal
var modal_1 = document.getElementById("myModal_1");

// Get the button that opens the modal
var btn = document.getElementById("myBtn_1");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function () {
    modal_1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal_1.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal_1) {
        modal_1.style.display = "none";
    }
}





// edit contact no

// Get the modal
var modal = document.getElementById('1');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



// change password

// Get the modal
// var modal_2 = document.getElementById('11');

// When the user clicks anywhere outside of the modal, close it
// window.onclick = function (event) {
//     if (event.target == modal_2) {
//         modal_2.style.display = "none";
//     }
// }