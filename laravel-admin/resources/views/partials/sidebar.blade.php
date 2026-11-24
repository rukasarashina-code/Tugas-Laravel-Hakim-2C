@php
    $menus = [
        ['url' => '/home',    'pattern' => 'home',    'icon' => 'fa-tachometer-alt', 'label' => 'Home'],
        ['url' => '/product', 'pattern' => 'product', 'icon' => 'fa-box',            'label' => 'Product'],
        ['url' => '/service', 'pattern' => 'service', 'icon' => 'fa-concierge-bell', 'label' => 'Service'],
        ['url' => '/contact', 'pattern' => 'contact', 'icon' => 'fa-envelope',       'label' => 'Contact'],
        ['url' => '/about',   'pattern' => 'about',   'icon' => 'fa-info-circle',    'label' => 'About'],
        ['url' => '/admin',   'pattern' => 'admin*',  'icon' => 'fa-users-cog',      'label' => 'Data Admin'],
    ];
@endphp

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Laravel Admin</div>
    </a>

    <hr class="sidebar-divider my-0">

    <div class="sidebar-heading mt-3">Menu</div>

    @foreach ($menus as $m)
        <li class="nav-item {{ request()->is($m['pattern']) ? 'active' : '' }}">
            <a class="nav-link" href="{{ $m['url'] }}">
                <i class="fas fa-fw {{ $m['icon'] }}"></i>
                <span>{{ $m['label'] }}</span>
            </a>
        </li>
    @endforeach

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
