@extends('dashboard')

@section('content')
    <h1>{{ $judul }}</h1>

    @include('template/errors')

    <form method="post" action="/employe/{{ $employe->id }}">
        @method('put')
        @csrf
        <table border="0" align="center">
            <tr>
                <td>ID</td>
                <td>{{ $employe->id }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="{{ old('nama', $employe->nama) }}"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" rows="2">{{ old('alamat', $employe->alamat) }}</textarea></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <select name="gender">
                        <option value="L" {{ old('gender', $employe->gender) === 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('gender', $employe->gender) === 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Gaji</td>
                <td><input type="text" name="gaji" value="{{ old('gaji', $employe->gaji) }}"></td>
            </tr>
            <tr>
                <td><button type="submit">Update</button></td>
                <td><a href="/employe">Batal</a></td>
            </tr>
        </table>
    </form>
@endsection
