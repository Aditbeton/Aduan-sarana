@guest('siswa')
<li class="nav-item">
    <a class="nav-link" href="{{ route('siswa.login') }}">
        Login siswa
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.login') }}">
        Login Admin
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('siswa.register') }}">
        Daftar?
    </a>
</li>
@endguest