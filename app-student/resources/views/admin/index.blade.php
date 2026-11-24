@extends('layout')

@section('content')
    <p><a class="btn" href="/admin/create">+ Tambah Admin</a></p>

    <table>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
        @forelse ($admins as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->id_admin }}</td>
            <td>{{ $row->username }}</td>
            <td>
                <a class="btn" href="/admin/{{ $row->id_admin }}/edit">Edit</a>
                <form class="inline" method="post" action="/admin/{{ $row->id_admin }}" onsubmit="return confirm('Hapus admin ini?')">
                    @method('delete')
                    @csrf
                    <button class="btn danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="4" align="center">Belum ada data</td></tr>
        @endforelse
    </table>
@endsection
