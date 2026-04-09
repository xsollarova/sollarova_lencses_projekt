<div class="popup" id="loginPopup">
    <div class="popup-box">
        <button class="popup-close" id="popupClose">&times;</button>

        <section class="login">
            <h1>PRIHLÁSENIE</h1>

            @if ($errors->has('login'))
                <p class="error-msg">{{ $errors->first('login') }}</p>
            @endif

            <form class="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="login_email" value="{{ old('login_email') }}">
                </div>
                <div class="form-group">
                    <label>Heslo</label>
                    <input type="password" name="heslo">
                </div>
                <button type="submit" class="popup-btn">prihlásiť sa</button>
            </form>
            <a href="#" class="link">zabudnuté heslo?</a>
        </section>

        <div class="divider"></div>

        <section class="register">
            <h1>REGISTRÁCIA</h1>

            <form class="form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label>Meno</label>
                    <input type="text" name="meno" value="{{ old('meno') }}">
                    @error('meno') <span class="error-msg">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Priezvisko</label>
                    <input type="text" name="priezvisko" value="{{ old('priezvisko') }}">
                    @error('priezvisko') <span class="error-msg">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="reg_email" value="{{ old('reg_email') }}">
                    @error('reg_email') <span class="error-msg">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Heslo</label>
                    <input type="password" name="heslo">
                    @error('heslo') <span class="error-msg">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Potvrdenie hesla</label>
                    <input type="password" name="heslo_confirmation">
                </div>
                <button type="submit" class="popup-btn">registrovať sa</button>
            </form>
            <a href="#" class="link">podmienky</a>
        </section>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        @if ($errors->any())
            const popup = document.getElementById('loginPopup');
            if (popup) popup.classList.add('active');
        @endif
    });
</script>