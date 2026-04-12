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
                    <img src="{{ asset('obrazky/logo_obrazky/user_logo.png')}}" alt="Profil" id="profileBtn">
                </div>

                <div id="popup-container"></div>

                <div class="icons cart-icon">
                    <a href="{{ url('/kosik') }}">
                        <img src="{{ asset('obrazky/logo_obrazky/cart_logo.png')}}" alt="Košík">
                    </a>
                    <span class="cart-badge">3</span>
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
                    
                    <!-- 1. produkt -->
                    <article class="cart-item">
                        <div class="cart-item-image">
                            <img src="{{ asset('obrazky/oblecenie_obrazky/bunda_zara.png')}}" alt="Zara bunda">
                        </div>

                        <div class="cart-item-info">
                            <h2 class="product-name">Zara bunda - béžová</h2>
                            <p class="product-brand">značka: Zara</p>
                            <p class="product-size">veľkost: M</p>

                        </div>

                        <div class="cart-item-price">
                            <p>14,90 €</p>
                        </div>

                        <div class="cart-item-remove">
                            <button type="button" class="remove-btn">X</button>
                        </div>
                    </article>

                    <!-- 2. produkt -->
                    <article class="cart-item">
                        <div class="cart-item-image">
                            <img src="{{ asset('obrazky/oblecenie_obrazky/kabat_mango.png')}}" alt="Mango kabát">
                        </div>

                        <div class="cart-item-info">
                            <h2 class="product-name">Kabát Mango</h2>
                            <p class="product-brand">značka: Mango</p>
                            <p class="product-size">veľkosť: S</p>

                        </div>

                        <div class="cart-item-price">
                            <p>22,00 €</p>
                        </div>

                        <div class="cart-item-remove">
                            <button type="button" class="remove-btn">X</button>
                        </div>
                    </article>

                    <!-- 3. produkt -->
                    <article class="cart-item">
                        <div class="cart-item-image">
                            <img src="{{ asset('obrazky/oblecenie_obrazky/mikina_adidas.png')}}" alt="Adidas mikina">
                        </div>

                        <div class="cart-item-info">
                            <h2 class="product-name">Mikina Adidas</h2>
                            <p class="product-brand">značka: Adidas</p>
                            <p class="product-size">veľkosť: M</p>
                        </div>

                        <div class="cart-item-price">
                            <p>18,50 €</p>
                        </div>

                        <div class="cart-item-remove">
                            <button type="button" class="remove-btn">X</button>
                        </div>
                    </article>

                    <article class="cart-item">
                        <div class="cart-item-image">
                            <img src="{{ asset('obrazky/oblecenie_obrazky/merch.png')}}" alt="Merch">
                        </div>

                        <div class="cart-item-info">
                            <h2 class="product-name">Second Chance plátenka</h2>
                            <p class="product-brand">značka: Second Chance</p>
                            <p class="product-size">veľkosť: universal</p>

                            <div class="quantity-controls">
                                <span class="quantity-label">množstvo: <span class="quantity-value">1</span></span>
                                <button type="button" class="quantity-btn">−</button>
                                <button type="button" class="quantity-btn">+</button>
                            </div>
                        </div>

                        <div class="cart-item-price">
                            <p>2 €</p>
                        </div>

                        <div class="cart-item-remove">
                            <button type="button" class="remove-btn">X</button>
                        </div>
                    </article>

                    <section class="discount-code">
                        <label for="discount">uplatniť kód:</label>
                        <input type="text" id="discount" name="discount" placeholder="........">
                    </section>

                </section>

                <section class="order-summary">
                    <h2>Zhrnutie</h2>

                    <div class="summary-items">
                        <div class="summary-item">
                            <span>Bunda Zara</span>
                            <span>14,90 €</span>
                        </div>
                        <div class="summary-item">
                            <span>Kabát Mango</span>
                            <span>22,00 €</span>
                        </div>
                        <div class="summary-item">
                            <span>Mikina Adidas</span>
                            <span>18,50 €</span>
                        </div>
                    </div>

                    <div class="summary-total">
                        <span>spolu</span>
                        <span>55,40 €</span>
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