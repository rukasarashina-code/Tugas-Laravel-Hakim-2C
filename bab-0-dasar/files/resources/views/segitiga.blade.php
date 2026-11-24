<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $judul }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/latihan.css') }}">
</head>
<body>
    <div class="box">
        <h1>{{ $judul }}</h1>
        <form action="/kalkulator/segitiga/proses" method="post">
            @csrf
            <p>
                <label>Alas</label>
                <input type="text" name="alas" value="{{ $alas }}">
            </p>
            <p>
                <label>Tinggi</label>
                <input type="text" name="tinggi" value="{{ $tinggi }}">
            </p>
            <p><button type="submit">HITUNG</button></p>
        </form>
        <div class="hasil">
            Luas Segitiga = <strong>{{ $hasil }}</strong>
        </div>
    </div>
</body>
</html>
