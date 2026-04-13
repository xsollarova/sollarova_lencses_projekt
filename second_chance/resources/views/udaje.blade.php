<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kristína Sollárová, David Lencsés">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/udaje.css', 'resources/css/prihlasenie.css', 'resources/js/prihlasenie.js'])
    <title>Údaje</title>
</head>

<body id="top">

    <header class="header">
        <div class="header-content">

            <div class="logo" id="logo">
                <a href="{{ url('/') }}"><img src="{{ asset('obrazky/logo_obrazky/logo.png')}}" alt="Logo"></a>
            </div>

            <div class="right-side-without-search">
                <div class="icons">
                    @auth
                        <div class="user-menu" id="userMenu">
                            <img src="{{ asset('obrazky/logo_obrazky/user_logo.png') }}" 
                                alt="Profil" id="profileBtn">
                            <div class="user-dropdown" id="userDropdown">
                                <span class="user-name">{{ Auth::user()->meno }}</span>
                                <span class="user-since">Člen od: {{ Auth::user()->created_at->format('d.m.Y') }}</span>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="logout-btn">Odhlásiť sa</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <img src="{{ asset('obrazky/logo_obrazky/user_logo.png') }}" 
                            alt="Profil" id="profileBtn">
                    @endauth
                </div>

                @guest
                    @include('components.auth-popup')
                @endguest

                <div class="icons cart-icon-wrapper">
                    <a href="{{ route('kosik.index') }}">
                        <img src="{{ asset('obrazky/logo_obrazky/cart_logo.png') }}" alt="Košík">
                    </a>
                    @php
                        if (auth()->check()) {
                            $kosikModel = \App\Models\Kosik::where('user_id', auth()->id())->first();
                            $pocetVKosiku = $kosikModel ? $kosikModel->polozky->sum('mnozstvo') : 0;
                        } else {
                            $pocetVKosiku = array_sum(array_column(session()->get('kosik', []), 'mnozstvo'));
                        }
                    @endphp
                    @if($pocetVKosiku > 0)
                        <span class="cart-badge">{{ $pocetVKosiku }}</span>
                    @endif
                </div>
            </div>

        </div>
    </header>

    <main>

        <section class="steps">
            <section class="checkout-steps">
                <a href="{{ url('/kosik') }}" class="step done">1 • zhrnutie </a>
                <a href="{{ url('/udaje') }}" class="step active" >2 • dodacie údaje </a>
                <a href="{{ url('/platba') }}" class="step not-active">3 • doprava a platba </a>
            </section>
        </section>

        <section class="udaje-layout">
            <section class="customer-info">
                <form id="udaje-form" class="customer-form" method="POST" action="{{ route('udaje.store') }}">
                    @csrf

                    @if(session('error'))
                        <div class="form-error">{{ session('error') }}</div>
                    @endif

                    <div class="form-group">
                        <label>Meno</label>
                        <input type="text" name="meno" value="{{ old('meno', $udaje['meno'] ?? '') }}" required>
                        @error('meno')<span class="field-error">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label>Priezvisko</label>
                        <input type="text" name="priezvisko" value="{{ old('priezvisko', $udaje['priezvisko'] ?? '') }}" required>
                        @error('priezvisko')<span class="field-error">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label>Telefónne číslo</label>
                        <input type="text" name="telefon" pattern="[0-9+\-\s\(\)]+" value="{{ old('telefon', $udaje['telefon'] ?? '') }}" required>
                        @error('telefon')<span class="field-error">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email', $udaje['email'] ?? '') }}" required>
                        @error('email')<span class="field-error">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group mesto-group">
                        <label>Mesto</label>
                        <input type="text" name="mesto" value="{{ old('mesto', $udaje['mesto'] ?? '') }}" required>
                        @error('mesto')<span class="field-error">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group small">
                            <label>PSČ</label>
                            <input type="text" name="psc" pattern="^\d{5}$" inputmode="numeric" maxlength="5" value="{{ old('psc', $udaje['psc'] ?? '') }}" required>
                            @error('psc')<span class="field-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group small">
                            <label>Číslo domu</label>
                            <input type="number" name="cislo_domu" min="1" value="{{ old('cislo_domu', $udaje['cislo_domu'] ?? '') }}" required>
                            @error('cislo_domu')<span class="field-error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </form>
            </section>

            <section class="order-summary">
                <h2>Zhrnutie</h2>

                <div class="summary-items">
                    @foreach($kosik as $polozka)
                        @if($polozka['mnozstvo'] > 0)
                        <div class="summary-item">
                            <span>{{ $polozka['nazov'] }}</span>
                            <span>{{ number_format($polozka['cena'] * $polozka['mnozstvo'], 2, ',', ' ') }} €</span>
                        </div>
                        @endif
                    @endforeach
                </div>

                <div class="summary-total">
                    <span>spolu</span>
                    <span>{{ number_format($celkova_cena, 2, ',', ' ') }} €</span>
                </div>

                <button type="submit" form="udaje-form" class="continue-btn">pokračovať</button>
            </section>
        </section>
        
        <section class="back-to-top-kosik">
            <a href="#top" class="btn-fill">späť hore ↑</a>
        </section>
    </main>


    <footer class="footer">
        <div class="footer-inner">
            <div class="footer-grid">

                <div class="footer-col">
                    <h4>Nakupovanie</h4>
                    <a href="#">Ako nakúpiť</a>
                    <a href="#">Doručenie</a>
                    <a href="#">Platba</a>
                </div>

                <div class="footer-col">
                    <h4>O nás</h4>
                    <a href="#">Kontakt</a>
                    <a href="#">O projekte</a>
                    <a href="#">Obchodné podmienky</a>
                    <a href="#">Ochrana súkromia</a>
                </div>

                <div class="footer-col">
                    <h4>Pomoc</h4>
                    <a href="#">FAQ</a>
                    <a href="#">Podpora</a>
                </div>

                <div class="footer-col">
                    <h4>Sledujte nás</h4>
                    <div class="footer-social">
                        <a href="#" aria-label="Facebook"> <img src="{{ asset('obrazky/logo_obrazky/facebook_logo.png')}}" alt = "facebook"> </a>
                        <a href="#" aria-label="Instagram"> <img src="{{ asset('obrazky/logo_obrazky/instagram_logo.png')}}" alt="instagram"> </a>
                        <a href="#" aria-label="YouTube"> <img src="{{ asset('obrazky/logo_obrazky/youtube_logo.png')}}" alt="youtube"></a>
                    </div>
                    <div class="footer-note">SecondChance • secondhand e-shop</div>
                </div>

            </div>

            <div class="footer-bottom">
                <div class="footer-copy">
                    © 2026 SecondChance
                </div>
                <div class="footer-logo">
                    <img src="{{ asset('obrazky/logo_obrazky/logo.png')}}" alt="Logo">
                </div>
            </div>
        </div>
    </footer>

</body>

</html>