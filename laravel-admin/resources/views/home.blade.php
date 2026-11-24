@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Product</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">3 Item</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Service</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">3 Layanan</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Contact</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Hubungi Kami</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">About</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Tentang Kami</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Selamat Datang</h6>
        </div>
        <div class="card-body">
            <p class="mb-0">Ini adalah laman Home. Layout halaman dibagi menjadi HEADER, SIDEBAR, CONTENT
            dan FOOTER memakai sistem templating Blade (<code>@@include</code>, <code>@@extends</code>
            dan <code>@@yield</code>).</p>
        </div>
    </div>
@endsection
