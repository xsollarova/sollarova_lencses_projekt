<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kristína Sollárová, David Lencsés">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/produkt.css', 'resources/css/prihlasenie.css', 'resources/js/prihlasenie.js', 'resources/js/produkt.js'])
    <title>{{ $produkt->nazov }}</title>
</head>

<body id="top">

    <header class="header">
        <div class="header-content">

            <div class="logo" id="logo">
                <a href="{{ url('/') }}"><img src="{{ asset('obrazky/logo_obrazky/logo.png')}}" alt="Logo"></a>
            </div>

            <form method="GET" action="{{ route('produkty.hladat') }}" class="search-bar">
                <input type="text" name="search" 
                      placeholder="Čo hľadáte?" 
                      value="{{ request('search') }}">
                <button type="submit">HĽADAŤ</button>
            </form>

            <div class="right-side">
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
        <section class="progress">
            <ul>
                <li><a href="{{ url('/') }}">Domov</a></li>
                <li><a href="{{ route('produkty.index', ['kategoria' => $produkt->kategoria_id]) }}">{{ $produkt->kategoria->nazov }}</a></li>
                <li class="current"><a href="#">{{ $produkt->nazov }}</a></li>
            </ul>
        </section>

        <section class="product-detail">

            <div class="product-gallery">
                <div class="primary-picture">
                    @if($produkt->hlavnyObrazok)
                        <img src="{{ asset($produkt->hlavnyObrazok->url) }}" alt="{{ $produkt->nazov }}">
                    @else
                        <img src="{{ asset('obrazky/placeholder.png') }}" alt="Bez obrázka">
                    @endif
                </div>

                <div class="miniatures">
                    @foreach($produkt->obrazky->where('hlavny', false) as $obrazok)
                        <div class="miniature">
                            <img src="{{ asset($obrazok->url) }}" alt="Miniatúra">
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- INFO O PRODUKTE -->
            <div class="product-info">
                <h1>{{ $produkt->nazov }}</h1>

                <div class="product-features">
                    <div class="feature">
                        <span class="nazov">veľkosť</span>
                        <span class="hodnota">{{ $produkt->velkost }}</span>
                    </div>
                    <div class="feature">
                        <span class="nazov">farba</span>
                        <span class="hodnota">{{ $produkt->farba }}</span>
                    </div>
                    <div class="feature">
                        <span class="nazov">stav</span>
                        <span class="hodnota">{{ $produkt->stav }}</span>
                    </div>
                    <div class="feature">
                        <span class="nazov">značka</span>
                        <span class="hodnota">{{ $produkt->znacka }}</span>
                    </div>
                </div>

                <p class="cena">{{ number_format($produkt->cena, 2, ',', ' ') }} €</p>

                <div style="text-align: center;">
                    <form method="POST" action="{{ route('kosik.pridat', $produkt->id) }}">
                        @csrf
                        <button type="submit" class="btn-cart">vložiť do košíka</button>
                    </form>
                </div>

                @if($produkt->popis)
                <div class="produkt-popis">
                    <p>{{ $produkt->popis }}</p>
                </div>
                @endif
            </div>

        </section>

        <!-- PODOBNÉ PRODUKTY -->
        <section class="similar-products">
            <h2>Podobné produkty</h2>

            <div class="products-grid">
                <article class="product-card">
                    <div class="product-image">
                        <a href="{{ route('produkty.show', 3) }}">
                            <img src="{{ asset('obrazky/oblecenie_obrazky/bunda_zara.png')}}" alt="Bunda Zara">
                        </a>
                    </div>
                    <h3>Bunda Zara</h3>
                    <p>Veľkosť M • ako nové</p>
                    <div class="product-bottom">
                        <span>14,90 €</span>
                        <a href="{{ route('produkty.show', 3) }}">Detail</a>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-image">
                        <a href="{{ route('produkty.show', 1) }}">
                            <img src="{{ asset('obrazky/oblecenie_obrazky/tricko_nike.jpg')}}" alt="Nike tričko">
                        </a>
                    </div>
                    <h3>Nike tričko</h3>
                    <p>Veľkosť L • top stav</p>
                    <div class="product-bottom">
                        <span>9,90 €</span>
                        <a href="{{ route('produkty.show', 1) }}">Detail</a>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-image">
                        <a href="{{ route('produkty.show', 6) }}">
                            <img src="{{ asset('obrazky/oblecenie_obrazky/saty_H&M.jpg')}}" alt="Šaty H&M">
                        </a>
                    </div>
                    <h3>Šaty H&M</h3>
                    <p>Veľkosť S • nové</p>
                    <div class="product-bottom">
                        <span>12,00 €</span>
                        <a href="{{ route('produkty.show', 6) }}">Detail</a>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-image">
                        <a href="{{ route('produkty.show', 7) }}">
                            <img src="{{ asset('obrazky/oblecenie_obrazky/mikina_adidas.png')}}" alt="Mikina Adidas">
                        </a>
                    </div>
                    <h3>Mikina Adidas</h3>
                    <p>Veľkosť M • veľmi dobré</p>
                    <div class="product-bottom">
                        <span>18,50 €</span>
                        <a href="{{ route('produkty.show', 7) }}">Detail</a>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-image">
                        <a href="{{ route('produkty.show', 4) }}">
                            <img src="{{ asset('obrazky/oblecenie_obrazky/kabat_mango.png')}}" alt="Kabát Mango">
                        </a>
                    </div>
                    <h3>Kabát Mango</h3>
                    <p>Veľkosť S • veľmi dobré</p>
                    <div class="product-bottom">
                        <span>25,00 €</span>
                        <a href="{{ route('produkty.show', 4) }}">Detail</a>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-image">
                        <a href="{{ route('produkty.show', 5) }}">
                            <img src="{{ asset('obrazky/oblecenie_obrazky/rifle_levis.jpg')}}" alt="Rifle Levi's">
                        </a>
                    </div>
                    <h3>Rifle Levi's</h3>
                    <p>Veľkosť M • ako nové</p>
                    <div class="product-bottom">
                        <span>22,00 €</span>
                        <a href="{{ route('produkty.show', 5) }}">Detail</a>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-image">
                        <a href="{{ route('produkty.show', 2) }}">
                            <img src="{{ asset('obrazky/oblecenie_obrazky/sveter_reserved.png')}}" alt="Sveter Reserved">
                        </a>
                    </div>
                    <h3>Sveter Reserved</h3>
                    <p>Veľkosť M • dobré</p>
                    <div class="product-bottom">
                        <span>11,00 €</span>
                        <a href="{{ route('produkty.show', 2) }}">Detail</a>
                    </div>
                </article>
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
                        <a href="#" aria-label="YouTube"> <img src="{{ asset('obrazky/logo_obrazky/youtube_logo.png')}}" alt="youtube"> </a>
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

    <div class="lightbox" id="lightbox">
        <span class="lightbox-close">&times;</span>
        <img id="lightbox-img" src="" alt="">
    </div>

</body>

</html>