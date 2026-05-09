<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Upraviť produkt</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    @vite(['resources/js/admin.js'])
</head>
<body>
<div class="container mt-4">
    <h1>Upraviť produkt</h1>
    <a href="{{ route('admin.index') }}" class="btn btn-secondary mb-3">← Späť</a>

    <form method="POST" action="{{ route('admin.update', $produkt->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Názov</label>
            <input type="text" name="nazov" class="form-control" value="{{ $produkt->nazov }}" required>
        </div>

        <div class="mb-3">
            <label>Kategória</label>
            <select name="kategoria_id" class="form-control">
                @foreach($kategorie as $kat)
                    <option value="{{ $kat->id }}" {{ $kat->id == $produkt->kategoria_id ? 'selected' : '' }}>
                        {{ $kat->pohlavie }} - {{ $kat->nazov }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Značka</label>
            <input type="text" name="znacka" class="form-control" value="{{ $produkt->znacka }}">
        </div>

        <div class="mb-3">
            <label>Popis</label>
            <textarea name="popis" class="form-control" rows="4">{{ $produkt->popis }}</textarea>
        </div>

        <div class="mb-3">
            <label>Cena (€)</label>
            <input type="number" name="cena" step="0.01" class="form-control" value="{{ $produkt->cena }}" required>
        </div>

        <div class="mb-3">
            <label>Veľkosť</label>
            <select name="velkost" class="form-control">
                @foreach(['S','M','L'] as $v)
                    <option {{ $produkt->velkost == $v ? 'selected' : '' }}>{{ $v }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Farba</label>
            @foreach(['čierna','biela','hnedá','farebná'] as $f)
                <div class="form-check">
                    <input type="checkbox" name="farba[]" value="{{ $f }}"
                        class="form-check-input" id="farba_{{ $f }}"
                        {{ in_array($f, $produkt->farba ?? []) ? 'checked' : '' }}>
                    <label class="form-check-label" for="farba_{{ $f }}">{{ $f }}</label>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label>Stav</label>
            <select name="stav" class="form-control">
                @foreach(['nové','ako nové','dobré','použité','ok'] as $s)
                    <option {{ $produkt->stav == $s ? 'selected' : '' }}>{{ $s }}</option>
                @endforeach
            </select>
        </div>

        {{-- hlavný obrázok --}}
        <div class="mb-3">
            <label>Hlavný obrázok</label>
            @if($produkt->hlavnyObrazok)
                <div class="mb-2 d-flex align-items-center gap-2">
                    <img src="{{ asset($produkt->hlavnyObrazok->url) }}" width="80" style="border-radius:6px;object-fit:cover;height:80px">
                    <button type="button" class="btn btn-danger btn-sm"
                        onclick="document.getElementById('zmazat-hlavny').submit()">
                        X vymazať
                    </button>
                </div>
            @endif
 
            <input type="file" name="obrazok" class="form-control" id="hlavnyInput" accept="image/*">
            <div id="hlavnyPreview" class="mt-2"></div>
        </div>

        {{-- miniatúry --}}
        <div class="mb-3">
            <label>Miniatúry</label> 
            <div class="d-flex flex-wrap gap-2 mb-2">
                @foreach($produkt->obrazky->where('hlavny', false) as $obrazok)
                <div style="position:relative;display:inline-block">
                    <img src="{{ asset($obrazok->url) }}" width="80" style="border-radius:6px;object-fit:cover;height:80px">
                    <button type="button"
                        onclick="document.getElementById('zmazat-{{ $obrazok->id }}').submit()"
                        style="position:absolute;top:2px;right:2px;background:red;color:white;border:none;border-radius:50%;width:20px;height:20px;cursor:pointer;font-size:14px;line-height:1;padding:0">×</button>
                </div>
                @endforeach
            </div>
 
            <input type="file" name="miniobrazky[]" class="form-control" id="miniInput" accept="image/*" multiple>
            <div id="miniPreview" class="mt-2 d-flex flex-wrap gap-2"></div>
        </div>

        <button type="submit" class="btn btn-warning">Uložiť zmeny</button>
    </form>

    @if($produkt->hlavnyObrazok)
    <form id="zmazat-hlavny" method="POST" action="{{ route('admin.obrazok.zmazat', $produkt->hlavnyObrazok->id) }}">
        @csrf
        @method('DELETE')
    </form>
    @endif

    @foreach($produkt->obrazky->where('hlavny', false) as $obrazok)
    <form id="zmazat-{{ $obrazok->id }}" method="POST" action="{{ route('admin.obrazok.zmazat', $obrazok->id) }}">
        @csrf
        @method('DELETE')
    </form>
    @endforeach

</div>
</body>
</html>