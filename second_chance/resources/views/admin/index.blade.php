<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Admin panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

    {{-- admin nav. panel --}}
    <nav class="navbar navbar-dark bg-dark px-4">
        <span class="navbar-brand">Admin panel</span>
        <div class="d-flex gap-2">
            <a href="{{ url('/') }}" class="btn btn-outline-light btn-sm">Domov</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">Odhlásiť sa</button>
            </form>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Registrované produkty:</h1>

        @if(session('uspech'))
            <div class="alert alert-success">{{ session('uspech') }}</div>
        @endif

        <a href="{{ route('admin.create') }}" class="btn btn-success mb-3">+ Pridať produkt</a>

        {{-- filter kategórií --}}
        <form method="GET" action="{{ route('admin.index') }}" class="mb-3 d-flex gap-2">
            <select name="kategoria" class="form-select w-auto">
                <option value="">Všetky kategórie</option>
                @foreach($kategorie as $kat)
                    <option value="{{ $kat->id }}" {{ request('kategoria') == $kat->id ? 'selected' : '' }}>
                        {{ $kat->pohlavie }} - {{ $kat->nazov }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Filtrovať</button>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Zrušiť</a>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Obrázok</th>
                    <th>Názov</th>
                    <th>Kategória</th>
                    <th>Cena</th>
                    <th>Veľkosť</th>
                    <th>Stav</th>
                    <th>Možnosti</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produkty as $produkt)
                <tr>
                    <td>
                        @if($produkt->hlavnyObrazok)
                            <img src="{{ asset($produkt->hlavnyObrazok->url) }}" width="60">
                        @else
                            –
                        @endif
                    </td>
                    <td>{{ $produkt->nazov }}</td>
                    <td>{{ $produkt->kategoria->nazov }}</td>
                    <td>{{ number_format($produkt->cena, 2, ',', ' ') }} €</td>
                    <td>{{ $produkt->velkost }}</td>
                    <td>{{ $produkt->stav }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $produkt->id) }}" class="btn btn-warning btn-sm">Upraviť</a>
                        <form method="POST" action="{{ route('admin.destroy', $produkt->id) }}" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Naozaj vymazať?')">Vymazať</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>