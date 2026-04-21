<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Pridať produkt</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h1>Pridať produkt</h1>
    <a href="{{ route('admin.index') }}" class="btn btn-secondary mb-3">← Späť</a>

    <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Názov</label>
            <input type="text" name="nazov" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kategória</label>
            <select name="kategoria_id" class="form-control" required>
                @foreach($kategorie as $kat)
                    <option value="{{ $kat->id }}">{{ $kat->pohlavie }} - {{ $kat->nazov }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Značka</label>
            <input type="text" name="znacka" class="form-control">
        </div>

        <div class="mb-3">
            <label>Popis</label>
            <textarea name="popis" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label>Cena (€)</label>
            <input type="number" name="cena" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Veľkosť</label>
            <select name="velkost" class="form-control">
                @foreach(['XS','S','M','L','XL','EU 38','EU 39','EU 40','EU 41','EU 42','EU 43','EU 44'] as $v)
                    <option>{{ $v }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Farba</label>
            <select name="farba" class="form-control">
                @foreach(['čierna','biela','béžová','hnedá','červená','fialová','ružová','modrá','žltá','oranžová','zelená'] as $f)
                    <option>{{ $f }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Stav</label>
            <select name="stav" class="form-control">
                @foreach(['nové','ako nové','dobré','použité','ok'] as $s)
                    <option>{{ $s }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Obrázok</label>
            <input type="file" name="obrazok" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Pridať produkt</button>
    </form>
</div>
</body>
</html>