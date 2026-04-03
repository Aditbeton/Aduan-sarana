<style>
.nav-tabs-custom .nav-link {
    position: relative;
    width: 55px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.nav-tabs-custom .nav-link i {
    font-size: 18px;
    color: #000;
    transition: 0.2s;
}

.nav-tabs-custom .nav-link span {
    position: absolute;
    bottom: -28px;
    font-size: 12px;
    background: #000;
    color: #fff;
    padding: 3px 8px;
    border-radius: 6px;
    opacity: 0;
    transform: translateY(6px);
    transition: 0.2s;
    white-space: nowrap;
    pointer-events: none;
}

.nav-tabs-custom .nav-link:hover span {
    opacity: 1;
    transform: translateY(0);
}

.nav-tabs-custom .nav-link:hover {
    color: #000;
    background: #fff;
    border-color: #dee2e6 #dee2e6 #fff;
}

.nav-tabs-custom:hover .nav-link.active {
    background: transparent;
    border-color: transparent;
    color: #555;
}

.nav-tabs-custom .nav-link.active:hover {
    background: #fff;
    border-color: #dee2e6 #dee2e6 #fff;
    color: #000;
}

.nav-tabs-custom .nav-link.active i {
    color: #0d6efd;
}

.nav-tabs-custom .nav-link:hover i {
    color: #0d6efd;
}

.nav-tabs-custom:hover .nav-link.active i {
    color: #000;
}

.nav-tabs-custom .nav-link.active:hover i {
    color: #0d6efd;
}
</style>

@auth('admin')

<ul class="nav nav-tabs nav-tabs-custom justify-content-center">

    <li class="nav-item mx-3">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
           href="{{ route('admin.dashboard') }}">
            <i class="bi bi-house-door"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item mx-3">
        <a class="nav-link {{ request()->routeIs('admin.laporan.*') ? 'active' : '' }}" 
           href="{{ route('admin.laporan.index') }}">
            <i class="bi bi-file-earmark-text"></i>
            <span>Laporan</span>
        </a>
    </li>

    <li class="nav-item mx-3">
        <a class="nav-link {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}" 
           href="{{ route('admin.kategori.index') }}">
            <i class="bi bi-tags"></i>
            <span>Kategori</span>
        </a>
    </li>
    
    <li class="nav-item mx-3">
        <a class="nav-link {{ request()->routeIs('admin.daftar-siswa.*') ? 'active' : '' }}" 
           href="{{ route('admin.daftar-siswa.index') }}">
            <i class="bi bi-people"></i>
            <span>Daftar Siswa</span>
        </a>
    </li>
    
    <li class="nav-item mx-3">
        <a class="nav-link {{ request()->routeIs('admin.akun') ? 'active' : '' }}" 
           href="{{ route('admin.akun') }}">
            <i class="bi bi-person-circle"></i>
            <span>Profil saya</span>
        </a>
    </li>

</ul>

@endauth