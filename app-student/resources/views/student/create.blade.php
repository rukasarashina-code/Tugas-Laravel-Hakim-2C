@extends('layout')

@section('content')
    <form method="post" action="/student">
        @include('student._form')
    </form>
@endsection
