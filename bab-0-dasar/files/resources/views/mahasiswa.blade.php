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
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $row)
                <tr>
                    <td>{{ $row['nama'] }}</td>
                    <td>{{ $row['alamat'] }}</td>
                    <td>{{ $row['gender'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
