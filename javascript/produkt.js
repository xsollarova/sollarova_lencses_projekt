const hlavnyObrazok = document.querySelector('.primary-picture img');
const miniatures = document.querySelectorAll('.miniature img');
const lightbox = document.getElementById('lightbox');
const lightboxImg = document.getElementById('lightbox-img');

function openLightbox(src) {
    lightboxImg.src = src;
    lightbox.classList.add('active');
}

hlavnyObrazok.addEventListener('click', () => {
    openLightbox(hlavnyObrazok.src);
});

miniatures.forEach(img => {
    img.addEventListener('click', () => {
        openLightbox(img.src);
    });
});

lightbox.addEventListener('click', () => {
    lightbox.classList.remove('active');
});