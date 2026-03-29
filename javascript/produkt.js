const hlavnyObrazok = document.querySelector('.hlavny-obrazok img');
const miniatury = document.querySelectorAll('.miniatura img');
const lightbox = document.getElementById('lightbox');
const lightboxImg = document.getElementById('lightbox-img');

function openLightbox(src) {
    lightboxImg.src = src;
    lightbox.classList.add('active');
}

hlavnyObrazok.addEventListener('click', () => {
    openLightbox(hlavnyObrazok.src);
});

miniatury.forEach(img => {
    img.addEventListener('click', () => {
        openLightbox(img.src);
    });
});

lightbox.addEventListener('click', () => {
    lightbox.classList.remove('active');
});