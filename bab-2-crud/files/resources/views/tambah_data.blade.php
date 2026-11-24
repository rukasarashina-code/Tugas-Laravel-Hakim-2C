@extends('dashboard')

@section('content')
    <h1>{{ $judul }}</h1>

    @include('template/errors')

    <form method="post" action="/employe">
        @csrf
        <table border="0" align="center">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="{{ old('nama') }}"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" rows="2">{{ old('alamat') }}</textarea></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <select name="gender">
                        <option value="L" {{ old('gender') === 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('gender') === 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Gaji</td>
                <td><input type="text" name="gaji" value="{{ old('gaji') }}"></td>
            </tr>
            <tr>
                <td><button type="submit">SIMPAN</button></td>
                <td><a href="/employe">Batal</a></td>
            </tr>
        </table>
    </form>
@endsection
