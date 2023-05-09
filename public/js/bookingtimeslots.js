const bookButtons = document.querySelectorAll('.bookbutton');

bookButtons.forEach((button) => {
  button.addEventListener('click', () => {
    const is_booked = button.classList.contains('booked');
    if (!is_booked) {
      const confirmation = confirm('Do you want to book this time slot?');
      if (confirmation) {
        button.classList.add('booked');
        button.innerText = 'Booked';
      }
    }
  });
});
// const bookButtons = document.querySelectorAll('.bookbutton');

// bookButtons.forEach((button) => {
//   button.addEventListener('click', () => {
//     const is_booked = button.classList.contains('booked');
//     if (!is_booked) {
//       Swal.fire({
//         icon: 'question',
//         text: 'Do you want to book this time slot?',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, book it!'
//       }).then((result) => {
//         if (result.isConfirmed) {
//           button.classList.add('booked');
//           button.innerText = 'Booked';
//         }
//       });
//     }
//   });
// });
