<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>{{ $judul ?? 'Apps Student' }} - Apps Student</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app-student.css') }}">
</head>
<body>
    @include('template/nav')

    <div class="wrap">
        <h1>{{ $judul ?? '' }}</h1>

        @if (session('sukses'))
            <p class="ok">{{ session('sukses') }}</p>
        @endif
        @if (session('error'))
            <p class="err">{{ session('error') }}</p>
        @endif
        @include('template/errors')

        @yield('content')
    </div>
</body>
</html>
