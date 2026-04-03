@extends('layouts.main')

@section('body')
    @include('layouts.navbar.siswa')

    <div class="container py-5">
        <div class="p-5 mb-4 bg-white rounded-4 shadow-sm text-center border">
            <h1 class="display-5 fw-bold text-primary"> {{ config('app.name') }} </h1>
            <p class="fs-5 text-muted">
                <strong>Aplikasi Pengaduan Sarana Sekolah</strong>
                adalah platform digital yang digunakan oleh siswa untuk 
                melaporkan permasalahan pada sarana sekolah secara mudah dan terstruktur.
            </p>

            @guest('siswa')
                <div class="d-flex justify-content-center gap-2 mt-4">
                    <a href="{{ route('siswa.login') }}" class="btn btn-primary btn-lg px-4">
                        Masuk Siswa
                    </a>
                    <a href="{{ route('siswa.register') }}" class="btn btn-outline-secondary btn-lg px-4">
                        Daftar
                    </a>
                </div>
            @endguest
        </div>
    </div>
@endsection
