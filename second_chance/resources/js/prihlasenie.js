const popupHTML = `
<div class="popup" id="loginPopup">
    <div class="popup-box">
        <button class="popup-close" id="popupClose">&times;</button>

        <section class="login">
            <h1>PRIHLÁSENIE</h1>
            <form class="form">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="login_email">
                </div>
                <div class="form-group">
                    <label>Heslo</label>
                    <input type="password" name="login_password">
                </div>
                <button type="submit" class="popup-btn">prihlásiť sa</button>
            </form>
            <a href="#" class="link">zabudnuté heslo?</a>
        </section>

        <div class="divider"></div>

        <section class="register">
            <h1>REGISTRÁCIA</h1>
            <form class="form">
                <div class="form-group">
                    <label>Meno</label>
                    <input type="text" name="first_name">
                </div>
                <div class="form-group">
                    <label>Priezvisko</label>
                    <input type="text" name="last_name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="register_email">
                </div>
                <div class="form-group">
                    <label>Heslo</label>
                    <input type="password" name="register_password">
                </div>
                <div class="form-group">
                    <label>Potvrdenie hesla</label>
                    <input type="password" name="register_password_confirm">
                </div>
                <button type="submit" class="popup-btn">registrovať sa</button>
            </form>
            <a href="#" class="link">podmienky</a>
        </section>
    </div>
</div>
`;

document.getElementById('popup-container').innerHTML = popupHTML;

document.getElementById('profileBtn').addEventListener('click', () => {
    document.getElementById('loginPopup').classList.add('active');
    document.getElementById('popupClose').onclick = () => {
        document.getElementById('loginPopup').classList.remove('active');
    };
});