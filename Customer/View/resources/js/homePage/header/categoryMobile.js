const menuToggle = document.getElementById('menu-toggle');
const slideMenu = document.getElementById('slide-menu');
const menuClose = document.getElementById('menu-close');

menuToggle.addEventListener('click', () => {
  slideMenu.classList.toggle('hidden');
  slideMenu.classList.toggle('translate-x-full');
  document.body.classList.toggle('slide-menu-open');
});

menuClose.addEventListener('click', () => {
  slideMenu.classList.add('hidden');
  slideMenu.classList.add('translate-x-full');
  document.body.classList.remove('slide-menu-open');
});

document.addEventListener('click', (event) => {
  if (!slideMenu.contains(event.target) && event.target !== menuToggle) {
    slideMenu.classList.add('hidden');
    slideMenu.classList.add('translate-x-full');
    document.body.classList.remove('slide-menu-open');
  }
});