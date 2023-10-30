const dropdownButton = document.getElementById('dropdownButton');
const dropdownMenu = document.getElementById('dropdownMenu');

dropdownButton.addEventListener('click', () => {
  dropdownMenu.classList.toggle('hidden');
});

document.addEventListener('click', (event) => {
  const target = event.target;
  if (!target.closest('.relative')) {
    dropdownMenu.classList.add('hidden');
  }
});