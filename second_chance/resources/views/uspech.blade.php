<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kristína Sollárová, David Lencsés">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/potvrdenie.css'])
    <title>Objednávka úspešná</title>
</head>

<body>

    <header class="header">
        <div class="header-content">
            <div class="logo">
                <a href="{{ url('/') }}"><img src="{{ asset('obrazky/logo_obrazky/logo.png')}}" alt="Logo"> </a>
            </div>
        </div>
    </header>

    <main class="confirm-container">

        <div class="confirm-box">
            <h1>Objednávka č.{{ $cisloObjednavky }} bola úspešne dokončená! 🎉</h1>

            <p>Ďakujeme za váš nákup.</p>

            <a href="{{ url('/') }}" class="btn primary">späť na domovskú stránku</a>
        </div>

    </main>

</body>

</html>