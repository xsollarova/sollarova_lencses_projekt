<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kristína Sollárová, David Lencsés">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/potvrdenie.css'])
    <title>Potvrdenie objednávky</title>
</head>

<body>

    <header class="header">
        <div class="header-content">
            <div class="logo">
                <a href="{{ url('/') }}"><img src="{{ asset('obrazky/logo_obrazky/logo.png')}}"> </a>
            </div>
        </div>
    </header>

    <main class="confirm-container">

        <h1>Potvrdenie objednávky</h1>

        <div class="confirm-box">
            <p>Skontrolujte si svoju objednávku pred dokončením.</p>

            <div class="summary">
                <p><span>Bunda Zara</span><span>14,90 €</span></p>
                <p><span>Kabát Mango</span><span>22,00 €</span></p>
                <p><span>Mikina Adidas</span><span>18,50 €</span></p>
                <p><span>Doprava</span><span>4,50 €</span></p>
            </div>

            <h2>Spolu: 59,90 €</h2>

            <div class="confirm-buttons">
                <a href="{{ url('/platba') }}" class="btn secondary">späť</a>
                <a href="{{ url('/uspech') }}" class="btn primary">potvrdiť objednávku</a>
            </div>
        </div>

    </main>

</body>

</html>