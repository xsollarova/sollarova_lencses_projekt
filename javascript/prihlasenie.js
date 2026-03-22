const profileBtn = document.getElementById('profileBtn');

profileBtn.addEventListener('click', async () => {
  const container = document.getElementById('popup-container');

  const response = await fetch('prihlasenie.html');
  container.innerHTML = await response.text();

  document.getElementById('loginPopup').classList.add('active');

  document.getElementById('popupClose').onclick = () => {
    document.getElementById('loginPopup').classList.remove('active');
  };
});