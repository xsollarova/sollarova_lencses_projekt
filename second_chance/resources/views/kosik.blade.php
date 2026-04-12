<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kristína Sollárová, David Lencsés">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/kosik.css', 'resources/css/prihlasenie.css', 'resources/js/prihlasenie.js'])
    <title>Košík</title>
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

        </div>
    </header>

    <main>
        <section class="steps">
            <section class="checkout-steps">
                <a href="{{ url('/kosik') }}" class="step active">1 • zhrnutie</a>
                <a href="{{ url('/udaje') }}" class="step not-active" >2 • dodacie údaje </a>
                <a href="{{ url('/platba') }}" class="step not-active">3 • doprava a platba </a>
            </section>


            <div class="cart-layout">

                <section class="cart-items">

                    @forelse($kosik as $id => $polozka)
                    <article class="cart-item">
                        <div class="cart-item-image">
                            @if($polozka['obrazok'])
                                <img src="{{ asset($polozka['obrazok']) }}" alt="{{ $polozka['nazov'] }}">
                            @else
                                <img src="{{ asset('obrazky/placeholder.png') }}" alt="Bez obrázka">
                            @endif
                        </div>

                        <div class="cart-item-info">
                            <h2 class="product-name">{{ $polozka['nazov'] }}</h2>
                            <p class="product-brand">značka: {{ $polozka['znacka'] }}</p>
                            <p class="product-size">veľkosť: {{ $polozka['velkost'] }}</p>

                            @if(!empty($polozka['je_merch']))
                                <div class="quantity-controls">
                                    <span class="quantity-label">množstvo: {{ $polozka['mnozstvo'] }}</span>

                                    
                                    <form method="POST" action="{{ route('kosik.odobrat', $id) }}">
                                        @csrf
                                        <button type="submit" class="quantity-btn">−</button>
                                    </form>

                                    <form method="POST" action="{{ route('kosik.pridat', $id) }}">
                                        @csrf
                                        <button type="submit" class="quantity-btn">+</button>
                                    </form>
                                </div>
                            @else
                                <p style="margin-top: 16px; font-size: 18px;">množstvo: 1</p>
                            @endif
                        </div>

                        <div class="cart-item-price">
                            <p>{{ number_format($polozka['cena'] * $polozka['mnozstvo'], 2, ',', ' ') }} €</p>
                        </div>

                        <div class="cart-item-remove">
                            <form method="POST" action="{{ route('kosik.odstranit', $id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="remove-btn">X</button>
                            </form>
                        </div>
                    </article>
                    @empty
                        <p>Košík je prázdny.</p>
                    @endforelse

                    <section class="discount-code">
                        <label for="discount">uplatniť kód:</label>
                        <input type="text" id="discount" name="discount" placeholder="........">
                    </section>

                </section>

                <section class="order-summary">
                    <h2>Zhrnutie</h2>

                    <div class="summary-items">
                        @foreach($kosik as $polozka)
                        <div class="summary-item">
                            <span>{{ $polozka['nazov'] }}</span>
                            <span>{{ number_format($polozka['cena'] * $polozka['mnozstvo'], 2, ',', ' ') }} €</span>
                        </div>
                        @endforeach
                    </div>

                    <div class="summary-total">
                        <span>spolu</span>
                        <span>{{ number_format($celkova_cena, 2, ',', ' ') }} €</span>
                    </div>

                    <a href="{{ url('/udaje') }}" class="continue-btn">pokračovať</a>
                </section>

            </div>

            

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
                        <a href="#" aria-label="Facebook"> <img src="{{ asset('obrazky/logo_obrazky/facebook_logo.png')}}" alt="facebook"> </a>
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