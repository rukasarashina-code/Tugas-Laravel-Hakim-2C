@extends('layout')

@section('content')
    <p><a class="btn" href="/student/create">+ Tambah Student</a></p>

    <table>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Gender</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        @forelse ($students as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->nim }}</td>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->alamat }}</td>
            <td>{{ $row->gender }}</td>
            <td>{{ $row->jurusan }}</td>
            <td>
                <a class="btn" href="/student/{{ $row->id }}/edit">Edit</a>
                <form class="inline" method="post" action="/student/{{ $row->id }}" onsubmit="return confirm('Hapus data ini?')">
                    @method('delete')
                    @csrf
                    <button class="btn danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="7" align="center">Belum ada data</td></tr>
        @endforelse
    </table>
@endsection
