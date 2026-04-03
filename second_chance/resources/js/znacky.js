const brandsToggle = document.getElementById('brandsToggle');
if (brandsToggle) {
  brandsToggle.addEventListener('click', () => {
    const extras = document.querySelectorAll('.brand-extra');
    const isHidden = extras[0].classList.contains('hidden');

    extras.forEach(el => el.classList.toggle('hidden'));
    brandsToggle.textContent = isHidden ? 'zobraziť menej' : 'zobraziť viac';
  });
}