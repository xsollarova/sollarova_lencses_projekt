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
                @foreach($kosik as $polozka)
                    @if($polozka['mnozstvo'] > 0)
                    <p>
                        <span>{{ $polozka['nazov'] }}@if($polozka['mnozstvo'] > 1) ({{ $polozka['mnozstvo'] }}x)@endif</span>
                        <span>{{ number_format($polozka['cena'] * $polozka['mnozstvo'], 2, ',', ' ') }} €</span>
                    </p>
                    @endif
                @endforeach
            </div>

            <h2>Spolu: {{ number_format($celkova_cena, 2, ',', ' ') }} €</h2>

            <div class="confirm-buttons">
                <a href="{{ url('/platba') }}" class="btn secondary">späť</a>
                <a href="{{ url('/uspech') }}" class="btn primary">potvrdiť objednávku</a>
            </div>
        </div>

    </main>

</body>

</html>