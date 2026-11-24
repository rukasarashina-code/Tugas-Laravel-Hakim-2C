@extends('layout')

@section('content')
    <form method="post" action="/admin/{{ $admin->id_admin }}">
        @method('put')
        @include('admin._form')
    </form>
@endsection
