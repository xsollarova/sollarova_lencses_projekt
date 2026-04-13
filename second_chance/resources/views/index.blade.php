<!DOCTYPE html>
<html lang="sk">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Kristína Sollárová, David Lencsés">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/index.css', 'resources/css/prihlasenie.css', 'resources/js/prihlasenie.js', 'resources/js/znacky.js'])
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <title>SecondChance</title>
</head>

<body id = "top">
  
    <header class="header">
        <div class="header-content">

            <div class="logo" id="logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('obrazky/logo_obrazky/logo.png') }}" alt="Logo">
                </a>
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

                <div class="icons cart-icon">
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

    <main class="category">
      <aside class="sidebar">
          <div class="category-group">
              <h2><a href="{{ route('produkty.index', ['pohlavie' => 'žena']) }}">žena</a></h2>
              <ul>
                  <li><a href="{{ route('produkty.index', ['kategoria' => 1]) }}">Topy</a></li>
                  <li><a href="{{ route('produkty.index', ['kategoria' => 2]) }}">Nohavice</a></li>
                  <li><a href="{{ route('produkty.index', ['kategoria' => 3]) }}">Šaty</a></li>
                  <li><a href="{{ route('produkty.index', ['kategoria' => 4]) }}">Mikiny</a></li>
                  <li><a href="{{ route('produkty.index', ['kategoria' => 5]) }}">Topánky</a></li>
              </ul>
          </div>

          <div class="category-group">
              <h2><a href="{{ route('produkty.index', ['pohlavie' => 'muž']) }}">muž</a></h2>
              <ul>
                  <li><a href="{{ route('produkty.index', ['kategoria' => 6]) }}">Tričká</a></li>
                  <li><a href="{{ route('produkty.index', ['kategoria' => 7]) }}">Košele</a></li>
                  <li><a href="{{ route('produkty.index', ['kategoria' => 8]) }}">Nohavice</a></li>
                  <li><a href="{{ route('produkty.index', ['kategoria' => 9]) }}">Mikiny</a></li>
                  <li><a href="{{ route('produkty.index', ['kategoria' => 10]) }}">Topánky</a></li>
              </ul>
          </div>
      </aside>

      <section class="content">

        <section class="promo">
          <a href=#products>
            <img src="{{ asset('obrazky/reklamny_banner_1.png')}}" alt="Promo">
          </a>
        </section>

        <section class="brands">
          <div class="brands-header">
            <h3>Značky</h3>
            <button class="brands-toggle" id="brandsToggle">zobraziť viac</button>
          </div>
          <div class="row g-3" id="brandsGrid">
            <!-- viditeľné -->
            <div class="col-6 col-md-4 col-lg-2">
              <a class="brand-card"><img src="{{ asset('obrazky/znacky_obrazky/zara_logo.jpg')}}" alt="Zara" class="brand-img"></a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
              <a class="brand-card" ><img src="{{ asset('obrazky/znacky_obrazky/tommy_hilfiger_logo.jpg')}}" alt="Tommy Hilfiger" class="brand-img"></a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
              <a class="brand-card" ><img src="{{ asset('obrazky/znacky_obrazky/vans_logo.jpg')}}" alt="Vans" class="brand-img"></a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
              <a class="brand-card" ><img src="{{ asset('obrazky/znacky_obrazky/under_armour_logo.jpg')}}" alt="Under Armour" class="brand-img"></a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
              <a class="brand-card" ><img src="{{ asset('obrazky/znacky_obrazky/nike_logo.jpg')}}" alt="Nike" class="brand-img"></a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
              <a class="brand-card" ><img src="{{ asset('obrazky/znacky_obrazky/H&M_logo.jpg')}}" alt="H&M" class="brand-img"></a>
            </div>

            
            <div class="col-6 col-md-4 col-lg-2 brand-extra hidden">
              <a class="brand-card" ><img src="{{ asset('obrazky/znacky_obrazky/adidas_logo.jpg')}}" alt="Adidas" class="brand-img"></a>
            </div>
            <div class="col-6 col-md-4 col-lg-2 brand-extra hidden">
              <a class="brand-card" ><img src="{{ asset('obrazky/znacky_obrazky/levis_logo.jpg')}}" alt="Levi's" class="brand-img"></a>
            </div>
            <div class="col-6 col-md-4 col-lg-2 brand-extra hidden">
              <a class="brand-card" ><img src="{{ asset('obrazky/znacky_obrazky/mango_logo.jpg')}}" alt="Mango" class="brand-img"></a>
            </div>
            <div class="col-6 col-md-4 col-lg-2 brand-extra hidden">
              <a class="brand-card" ><img src="{{ asset('obrazky/znacky_obrazky/reserved_logo.jpg')}}" alt="Reserved" class="brand-img"></a>
            </div>
            <div class="col-6 col-md-4 col-lg-2 brand-extra hidden">
              <a class="brand-card" ><img src="{{ asset('obrazky/znacky_obrazky/puma_logo.jpg')}}" alt="Puma" class="brand-img"></a>
            </div>
            <div class="col-6 col-md-4 col-lg-2 brand-extra hidden">
              <a class="brand-card" ><img src="{{ asset('obrazky/znacky_obrazky/new_balance_logo.jpg')}}" alt="New Balance" class="brand-img"></a>
            </div>
          </div>
        </section>

        <section class="products" id = "products">
            <div class="row g-3">
                <h3>Novinky</h3>

                @foreach($novinky as $produkt)
                <div class="col-6 col-md-4 col-lg-2">
                    <article class="product-card">
                        <div class="product-image">
                            <a href="{{ route('produkty.show', $produkt->id) }}">
                                <img src="{{ asset($produkt->hlavnyObrazok->url ?? 'obrazky/default.jpg') }}" alt="{{ $produkt->nazov }}">
                            </a>
                        </div>
                        <h3>{{ $produkt->nazov }}</h3>
                        <p>Veľkosť {{ $produkt->velkost }} • {{ $produkt->stav }}</p>
                        <div class="product-bottom">
                            <span>{{ number_format($produkt->cena, 2, ',', ' ') }} €</span>
                            <a href="{{ route('produkty.show', $produkt->id) }}">Detail</a>
                        </div>
                    </article>
                </div>
                @endforeach

            </div>
        </section>

        <section class="promo">
          <img src="{{ asset('obrazky/reklamny_banner_2.png')}}" alt="Promo">
        </section>



        <section class="back-to-top">
          <a href="#top" class="btn-fill">späť hore ↑</a>
        </section>
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