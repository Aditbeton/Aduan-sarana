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

<ul class="nav nav-tabs nav-tabs-custom">

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
           href="{{ route('admin.dashboard') }}">
            <i class="bi bi-house-door"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.laporan.*') ? 'active' : '' }}" 
           href="{{ route('admin.laporan.index') }}">
            <i class="bi bi-file-earmark-text"></i>
            <span>Laporan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}" 
           href="{{ route('admin.kategori.index') }}">
            <i class="bi bi-tags"></i>
            <span>Kategori</span>
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}" 
           href="{{ route('admin.daftar-siswa.index') }}">
            <i class="bi bi-people"></i>
            <span>Kategori</span>
        </a>
    </li>

    {{-- User --}}
    <li class="dropdown ms-auto">
        <a class="nav-link" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle"></i>
        </a>

        <ul class="dropdown-menu dropdown-menu-end shadow ms-auto">
            <li>
                <a class="dropdown-item" href="{{ route('admin.akun') }}">
                    <i class="bi bi-gear me-2"></i> Akun Saya
                </a>
            </li>

            <li><hr class="dropdown-divider"></li>

            <li>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </li>

</ul>

@endauth