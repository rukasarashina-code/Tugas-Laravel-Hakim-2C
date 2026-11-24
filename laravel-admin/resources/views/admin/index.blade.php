@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Admin</h6>
            <a href="/admin/create" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Admin
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Dibuat</th>
                            <th width="160">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($admins as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->id_admin }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>
                                <a href="/admin/{{ $row->id_admin }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <form method="post" action="/admin/{{ $row->id_admin }}" class="d-inline" onsubmit="return confirm('Hapus admin ini?')">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
