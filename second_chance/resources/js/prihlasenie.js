const profileBtn = document.getElementById('profileBtn');
const loginPopup = document.getElementById('loginPopup');
const userDropdown = document.getElementById('userDropdown');

if (profileBtn && loginPopup) {
    profileBtn.addEventListener('click', () => {
        loginPopup.classList.toggle('active');
    });
    document.getElementById('popupClose').addEventListener('click', () => {
        loginPopup.classList.remove('active');
    });
    window.addEventListener('click', (e) => {
        if (e.target === loginPopup) loginPopup.classList.remove('active');
    });
}

if (profileBtn && userDropdown) {
    profileBtn.addEventListener('click', () => {
        userDropdown.classList.toggle('visible');
    });
    document.addEventListener('click', (e) => {
        if (!e.target.closest('#userMenu')) {
            userDropdown.classList.remove('visible');
        }
    });
}