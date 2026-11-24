@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($services as $s)
        <div class="col-lg-4 mb-4">
            <div class="card shadow h-100">
                <div class="card-body text-center">
                    <i class="fas {{ $s['icon'] }} fa-3x text-primary mb-3"></i>
                    <h5 class="font-weight-bold">{{ $s['nama'] }}</h5>
                    <p class="mb-0">{{ $s['isi'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
