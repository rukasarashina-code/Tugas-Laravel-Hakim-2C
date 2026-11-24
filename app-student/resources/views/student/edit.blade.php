@extends('layout')

@section('content')
    <form method="post" action="/student/{{ $student->id }}">
        @method('put')
        @include('student._form')
    </form>
@endsection
