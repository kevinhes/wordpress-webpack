const pageSelect = document.querySelector('.form-select');

pageSelect.addEventListener('change', (e) => {
  const url = e.target.value;
  window.location = url;
});