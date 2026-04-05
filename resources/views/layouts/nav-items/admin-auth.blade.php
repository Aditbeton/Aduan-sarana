<style>
.navbar.nav {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1.7rem; /* default = HP */
    padding: 0 15px;
}

/* PC / Desktop */
@media (min-width: 992px) {
    .navbar.nav {
        gap: 4rem;
    }
}

/* ITEM */
.navbar .nav-item {
    list-style: none;
}

/* LINK */
.navbar .nav-link {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* ICON */
.navbar .nav-link i {
    font-size: 26px; /* sedikit lebih besar biar balance */
    color: #000;
    transition: 0.2s;
}

/* ACTIVE */
.navbar .nav-link.active i {
    color: #0d6efd;
}

/* HOVER TEXT */
.navbar .nav-link span {
    position: absolute;
    bottom: -30px;
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

/* HOVER */
.navbar .nav-link:hover span {
    opacity: 1;
    transform: translateY(0);
}

.navbar .nav-link:hover i {
    color: #0d6efd;
}
</style>

@auth('admin')

<ul class="navbar nav">

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
           href="{{ route('admin.dashboard') }}">
            <i class="bi bi-house-door"></i>
            <span>Dashboard</span>
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.daftar-siswa.*') ? 'active' : '' }}" 
           href="{{ route('admin.daftar-siswa.index') }}">
            <i class="bi bi-people"></i>
            <span>Daftar Siswa</span>
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
        <a class="nav-link {{ request()->routeIs('admin.akun') ? 'active' : '' }}" 
           href="{{ route('admin.akun') }}">
            <i class="bi bi-person-circle"></i>
            <span>Profil saya</span>
        </a>
    </li>

</ul>

@endauth