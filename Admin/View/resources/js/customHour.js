const hourInput = document.getElementById('hourInput');

hourInput.addEventListener('input', () => {
  const selectedHour = parseInt(hourInput.value);
  if (selectedHour < 0 || selectedHour > 23) {
    hourInput.setCustomValidity('Invalid hour value');
  } else {
    hourInput.setCustomValidity('');
  }
});