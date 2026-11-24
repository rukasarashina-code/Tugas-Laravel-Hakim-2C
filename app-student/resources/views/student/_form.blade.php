@csrf
@php $g = old('gender', $student->gender ?? ''); @endphp
<table class="form">
    <tr>
        <td>NIM</td>
        <td><input type="text" name="nim" value="{{ old('nim', $student->nim ?? '') }}"></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td><input type="text" name="nama" value="{{ old('nama', $student->nama ?? '') }}"></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><textarea name="alamat" rows="2">{{ old('alamat', $student->alamat ?? '') }}</textarea></td>
    </tr>
    <tr>
        <td>Gender</td>
        <td>
            <select name="gender">
                <option value="L" {{ $g === 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $g === 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Jurusan</td>
        <td><input type="text" name="jurusan" value="{{ old('jurusan', $student->jurusan ?? '') }}"></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button class="btn" type="submit">SIMPAN</button>
            <a href="/student">Batal</a>
        </td>
    </tr>
</table>
