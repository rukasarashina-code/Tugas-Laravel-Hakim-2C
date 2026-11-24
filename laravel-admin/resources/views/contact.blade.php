@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Hubungi Kami</h6>
        </div>
        <div class="card-body">
            <p>Email: info@laraveladmin.test &nbsp;|&nbsp; Telp: 0812-0000-0000</p>

            {{-- Form contoh, belum diproses ke server --}}
            <form onsubmit="return false;">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Nama Anda">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="email@contoh.com">
                </div>
                <div class="form-group">
                    <label>Pesan</label>
                    <textarea class="form-control" rows="4" placeholder="Tulis pesan..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
@endsection
