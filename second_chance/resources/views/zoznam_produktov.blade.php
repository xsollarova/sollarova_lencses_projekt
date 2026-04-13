<!DOCTYPE html>
<html lang="sk">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Kristína Sollárová, David Lencsés">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  @vite(['resources/css/zoznam_produktov.css', 'resources/css/prihlasenie.css', 'resources/js/prihlasenie.js'])
  <title>SecondChance</title>
</head>

<body id = "top">

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

        </div>
    </header>



    <main class="category-page">
        <div class="container-fluid">
            <div class="row">

                <!-- sidebar -->
                <aside class="col-12 col-md-3 col-lg-2 sidebar-wrap">
                    <div class="sidebar">

                        @foreach(['žena', 'muž'] as $pohlavie)
                        <div class="category-group">
                            <h2><a href="{{ route('produkty.index', ['pohlavie' => $pohlavie]) }}">{{ $pohlavie }}</a></h2>
                            <ul>
                                @foreach($kategorie->where('pohlavie', $pohlavie) as $kat)
                                <li>
                                    <a href="{{ route('produkty.index', ['kategoria' => $kat->id]) }}"
                                    class="{{ request('kategoria') == $kat->id ? 'active-category' : '' }}">
                                        {{ $kat->nazov }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach

                    </div>
                </aside>


                <section class="col-12 col-md-9 col-lg-10 products-section">

                    <div class="products-top">
                        <h1 class="category-title">Zoznam produktov</h1>

                        <div class="products-controls">
                            <!-- radenie -->
                            <div class="filter-dropdown sort-dropdown">
                                <button type="button" class="filter-btn">Radenie</button>

                                <div class="filter-menu">
                                    <div class="filter-options">
                                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'cena_asc']) }}" 
                                        class="{{ request('sort') == 'cena_asc' ? 'active' : '' }}">
                                            Od najlacnejších
                                        </a>
                                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'cena_desc']) }}"
                                        class="{{ request('sort') == 'cena_desc' ? 'active' : '' }}">
                                            Od najdrahších
                                        </a>
                                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'najnovsie']) }}"
                                        class="{{ request('sort') == 'najnovsie' ? 'active' : '' }}">
                                            Najnovšie
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- filtre -->
                            <form method="GET" action="{{ route('produkty.index') }}" id="filter-form">
                                @if(request('kategoria'))
                                    <input type="hidden" name="kategoria" value="{{ request('kategoria') }}">
                                @endif
                                @if(request('sort'))
                                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                                @endif

                                <div class="filter-dropdown">
                                    <button type="button" class="filter-btn">Filter</button>

                                    <div class="filter-menu">
                                        <div class="filter-group">
                                            <span class="filter-title">Podľa veľkosti</span>
                                            <div class="filter-options">
                                                @foreach(['XS','S','M','L','XL','EU 38','EU 39','EU 40','EU 41','EU 42','EU 43','EU 44'] as $vel)
                                                    <label>
                                                        <input type="checkbox" name="velkost[]" value="{{ $vel }}"
                                                            {{ in_array($vel, request('velkost', [])) ? 'checked' : '' }}
                                                            onchange="this.form.submit()">
                                                        {{ $vel }}
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="filter-group">
                                            <span class="filter-title">Podľa ceny</span>
                                            <div class="filter-options">
                                                <input type="number" name="min_cena" placeholder="Od (€)"
                                                    class="price-input" value="{{ request('min_cena') }}">
                                                <span> - </span>
                                                <input type="number" name="max_cena" placeholder="Do (€)"
                                                    class="price-input" value="{{ request('max_cena') }}">
                                                <button type="submit" class="price-apply-btn">potvrdiť</button>
                                            </div>
                                        </div>

                                        <div class="filter-group">
                                            <span class="filter-title">Podľa farby</span>
                                            <div class="filter-options">
                                                @foreach(['čierna','biela','béžová','hnedá','červená','fialová','ružová','modrá','žltá','oranžová','zelená'] as $farba)
                                                    <label>
                                                        <input type="checkbox" name="farba[]" value="{{ $farba }}"
                                                            {{ in_array($farba, request('farba', [])) ? 'checked' : '' }}
                                                            onchange="this.form.submit()">
                                                        {{ $farba }}
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="filter-group">
                                            <a href="{{ route('produkty.index', request()->only('kategoria', 'sort')) }}">Zrušiť filter</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- čísla stránok -->
                    <div class="pagination-top">
                        {{ $produkty->withQueryString()->links('vendor.pagination.pagination') }}
                    </div>

                    <div class="row g-4 products-grid">

                        @forelse($produkty as $produkt)
                        <div class="col-6 col-lg-4 col-xl-3">
                            <article class="product-card">
                                <div class="product-image">
                                    <a href="{{ route('produkty.show', $produkt->id) }}">
                                        @if($produkt->hlavnyObrazok)
                                            <img src="{{ asset($produkt->hlavnyObrazok->url) }}" alt="{{ $produkt->nazov }}">
                                        @else
                                            <img src="{{ asset('obrazky/placeholder.png') }}" alt="Bez obrázka">
                                        @endif
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
                        @empty
                            <p class="text-center">Žiadne produkty neboli nájdené.</p>
                        @endforelse

                    </div>

                    <!-- späť hore + čísla stránok -->
                    <div class="products-bottom-bar">
                        <a href="#top" class="btn-fill">späť hore ↑</a>
                        <div class="pagination-bottom">
                            {{ $produkty->withQueryString()->links('vendor.pagination.pagination') }}
                        </div>
                    </div>

                </section>
            </div>
        </div>
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