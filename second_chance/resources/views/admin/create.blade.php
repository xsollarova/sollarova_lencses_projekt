<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Pridať produkt</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    @vite(['resources/js/admin.js'])
</head>
<body>
<div class="container mt-4">
    <h1>Pridať produkt</h1>
    <a href="{{ route('admin.index') }}" class="btn btn-secondary mb-3">← Späť</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Názov</label>
            <input type="text" name="nazov" class="form-control" value="{{ old('nazov') }}" required>
        </div>

        <div class="mb-3">
            <label>Kategória</label>
            <select name="kategoria_id" class="form-control" required>
                @foreach($kategorie as $kat)
                    <option value="{{ $kat->id }}" {{ old('kategoria_id') == $kat->id ? 'selected' : '' }}> {{ $kat->pohlavie }} - {{ $kat->nazov }} </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Značka</label>
            <input type="text" name="znacka" class="form-control" value="{{ old('znacka') }}">
        </div>

        <div class="mb-3">
            <label>Popis</label>
            <textarea name="popis" class="form-control" rows="4">{{ old('popis') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Cena (€)</label>
            <input type="number" name="cena" step="0.01" class="form-control" value="{{ old('cena') }}" required>
        </div>

        <div class="mb-3">
            <label>Veľkosť</label>
            <select name="velkost" class="form-control">
                @foreach(['S','M','L'] as $v)
                    <option {{ old('velkost') == $v ? 'selected' : '' }}>{{ $v }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Farba</label>
            @foreach(['čierna','biela','hnedá','farebná'] as $f)
                <div class="form-check">
                    <input type="checkbox" name="farba[]" value="{{ $f }}"
                        class="form-check-input" id="farba_{{ $f }}" {{ in_array($f, old('farba', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="farba_{{ $f }}">{{ $f }}</label>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label>Stav</label>
            <select name="stav" class="form-control">
                @foreach(['nové','ako nové','dobré','použité','ok'] as $s)
                    <option {{ old('stav') == $s ? 'selected' : '' }}>{{ $s }}</option>
                @endforeach
            </select>
        </div>

        {{-- hlavný obrázok --}}
        <div class="mb-3">
            <label>Hlavný obrázok</label>
            <input type="file" name="obrazok" class="form-control" id="hlavnyInput" accept="image/*">
            <div id="hlavnyPreview" class="mt-2"></div>
        </div>

        {{-- miniatúry --}}
        <div class="mb-3">
            <label>Miniatúry</label>
            <input type="file" name="miniobrazky[]" class="form-control" id="miniInput" accept="image/*" multiple>
            <div id="miniPreview" class="mt-2 d-flex flex-wrap gap-2"></div>
        </div>

        <button type="submit" class="btn btn-success">Pridať produkt</button>
    </form>
</div>
</body>
</html>