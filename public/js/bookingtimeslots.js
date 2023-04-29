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
