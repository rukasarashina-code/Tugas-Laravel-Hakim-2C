@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Admin</h6>
        </div>
        <div class="card-body">
            <form method="post" action="/admin">
                @include('admin._form')
            </form>
        </div>
    </div>
@endsection
