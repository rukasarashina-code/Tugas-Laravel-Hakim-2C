@extends('layout')

@section('content')
    <form method="post" action="/admin">
        @include('admin._form')
    </form>
@endsection
