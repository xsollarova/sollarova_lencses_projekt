<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kristína Sollárová, David Lencsés">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/produkt.css', 'resources/css/prihlasenie.css', 'resources/js/prihlasenie.js', 'resources/js/produkt.js'])
    <title>Bunda Zara</title>
</head>

<body id="top">

    <header class="header">
        <div class="header-content">

            <div class="logo" id="logo">
                <a href="{{ url('/') }}"><img src="{{ asset('obrazky/logo_obrazky/logo.png')}}" alt="Logo"></a>
            </div>

            <div class="search-bar">
                <input type="text" placeholder="Čo hľadáte?">
                <button type="submit">HĽADAŤ</button>
            </div>

            <div class="right-side">
                <div class="icons">
                    <img src="{{ asset('obrazky/logo_obrazky/user_logo.png')}}" alt="Profil" id="profileBtn">
                </div>

                <div id="popup-container"></div>

                <div class="icons">
                    <a href="{{ url('/kosik') }}">
                        <img src="{{ asset('obrazky/logo_obrazky/cart_logo.png')}}" alt="Košík">
                    </a>
                </div>
            </div>

        </div>

        </div>
    </header>

    <main>
        <section class="progress">
            <ul>
                <li><a href="{{ url('/') }}">Domov</a></li>
                <li><a href="{{ url('/zoznam_produktov') }}">Kategória</a></li>
                <li class="current"><a href="{{ url('/produkt') }}">Produkt</a></li>
            </ul>
        </section>
        <section class="product-detail">

            <div class="product-gallery">
                <div class="primary-picture">
                    <img src="{{ asset('obrazky/oblecenie_obrazky/bunda_zara.png')}}" alt="Hlavný obrázok produktu">
                </div>

                <div class="miniatures">
                    <div class="miniature">
                        <img src="{{ asset('obrazky/oblecenie_obrazky/bunda_zara_mini_01.jpg')}}" alt="Miniatúra 1">
                    </div>
                    <div class="miniature">
                        <img src="{{ asset('obrazky/oblecenie_obrazky/bunda_zara_mini_02.jpg')}}" alt="Miniatúra 2">
                    </div>
                    <div class="miniature">
                        <img src="{{ asset('obrazky/oblecenie_obrazky/bunda_zara_mini_03.jpg')}}" alt="Miniatúra 3">
                    </div>
                    <div class="miniature">
                        <img src="{{ asset('obrazky/oblecenie_obrazky/bunda_zara_mini_04.jpg')}}" alt="Miniatúra 4">
                    </div>
                </div>
            </div>

            <!-- INFO O PRODUKTE -->
            <div class="product-info">
                <h1>Bunda Zara – béžová</h1>

                <div class="product-features">
                    <div class="feature">
                        <span class="nazov">veľkosť</span>
                        <span class="hodnota">M</span>
                    </div>
                    <div class="feature">
                        <span class="nazov">farba</span>
                        <span class="hodnota">béžová</span>
                    </div>
                    <div class="feature">
                        <span class="nazov">stav</span>
                        <span class="hodnota">ako nové</span>
                    </div>
                    <div class="feature">
                        <span class="nazov">značka</span>
                        <span class="hodnota">Zara</span>
                    </div>
                </div>

                <p class="cena">14,90 €</p>

                <div style="text-align: center;">
                    <a href="{{ url('/kosik') }}" class="btn-cart">vložiť do košíka</a>
                </div>

                <div class="produkt-popis">
                    <p>
                        Elegantná béžová bunda značky <strong>Zara</strong> je ideálnym kúskom do <strong>prechodného
                            obdobia</strong>. Vďaka svojmu
                        minimalistickému dizajnu sa ľahko kombinuje s rôznymi outfitmi - či už do mesta, do školy alebo
                        na bežné nosenie.</br></br>

                        Bunda je vyrobená z príjemného a kvalitného materiálu, ktorý poskytuje pohodlie počas celého
                        dňa. Má klasický strih, ktorý lichotí postave a neutrálnu béžovú farbu, ktorá nikdy nevyjde z
                        módy.</br></br>

                        Je vybavená praktickými vreckami a zapínaním na zips, čo z nej robí funkčný kúsok do vášho
                        šatníka.
                        Je vhodná najmä na prechodné obdobia jeseň a jar, keď potrebujete ľahkú vrstvu na ochranu pred
                        chladom a vetrom.</br></br>

                        Ide o second hand kúsok vo veľmi dobrom stave - bez viditeľných poškodení, pripravený na ďalšie
                        nosenie.
                    </p>
                </div>
            </div>

        </section>

        <!-- PODOBNÉ PRODUKTY -->
        <section class="similar-products">
            <h2>Podobné produkty</h2>

            <div class="products-grid">
                <article class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('obrazky/oblecenie_obrazky/bunda_zara.png')}}" alt="Bunda Zara">
                    </div>
                    <h3>Bunda Zara</h3>
                    <p>Veľkosť M • ako nové</p>
                    <div class="product-bottom">
                        <span>14,90 €</span>
                        <a href="{{ url('/produkt') }}">Detail</a>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('obrazky/oblecenie_obrazky/tricko_nike.jpg')}}" alt="Nike tričko">
                    </div>
                    <h3>Nike tričko</h3>
                    <p>Veľkosť L • top stav</p>
                    <div class="product-bottom">
                        <span>9,90 €</span>
                        <a href="{{ url('/produkt') }}">Detail</a>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('obrazky/oblecenie_obrazky/saty_H&M.jpg')}}" alt="Šaty H&M">
                    </div>
                    <h3>Šaty H&M</h3>
                    <p>Veľkosť S • nové</p>
                    <div class="product-bottom">
                        <span>12,00 €</span>
                        <a href="{{ url('/produkt') }}">Detail</a>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('obrazky/oblecenie_obrazky/mikina_adidas.png')}}" alt="Mikina Adidas">
                    </div>
                    <h3>Mikina Adidas</h3>
                    <p>Veľkosť M • veľmi dobré</p>
                    <div class="product-bottom">
                        <span>18,50 €</span>
                        <a href="{{ url('/produkt') }}">Detail</a>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('obrazky/oblecenie_obrazky/kabat_mango.png')}}" alt="Kabát Mango">
                    </div>
                    <h3>Kabát Mango</h3>
                    <p>Veľkosť S • veľmi dobré</p>
                    <div class="product-bottom">
                        <span>22,00 €</span>
                        <a href="{{ url('/produkt') }}">Detail</a>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('obrazky/oblecenie_obrazky/rifle_levis.jpg')}}" alt="Rifle Levi's">
                    </div>
                    <h3>Rifle Levi's</h3>
                    <p>Veľkosť M • top stav</p>
                    <div class="product-bottom">
                        <span>16,90 €</span>
                        <a href="{{ url('/produkt') }}">Detail</a>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('obrazky/oblecenie_obrazky/sveter_reserved.png')}}" alt="Sveter Reserved">
                    </div>
                    <h3>Sveter Reserved</h3>
                    <p>Veľkosť L • nové</p>
                    <div class="product-bottom">
                        <span>11,50 €</span>
                        <a href="{{ url('/produkt') }}">Detail</a>
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