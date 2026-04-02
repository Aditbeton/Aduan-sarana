@extends('layouts.siswa')

@section('title', 'Laporan Pengaduan')

@section('content')
<div class="card mt-3">
    <div class="card-header">
        <h5 class="card-title mb-0">
            Laporan Pengaduan
        </h5>
    </div>


    <div class="card-body">
        <div class="row">
            <div class="col-md-8">

                {{-- Kategori --}}
                <div class="mb-4">
                    <div class="text-muted small">
                        Kategori
                    </div>
                    <div class="fw-semibold">
                        {{ $laporan->kategori->nama_kategori ?? '-' }}
                    </div>
                </div>

                {{-- Lokasi --}}
                <div class="mb-4">
                    <div class="text-muted small">
                        Lokasi Kejadian
                    </div>
                    <div class="fw-semibold">
                        {{ $laporan->lokasi }}
                    </div>
                </div>

                {{-- Keterangan --}}
                <div class="mb-4">
                    <div class="text-muted small">
                        Keterangan
                    </div>
                    <div>
                        {{ $laporan->ket }}
                    </div>
                </div>

                {{-- Tanggapan Admin --}}
                @include('siswa.laporan.tanggapan')

                {{-- Feedback --}}
                @if ($laporan->aspirasi?->status === 'selesai')
                @include('siswa.laporan.feedback')
                @endif

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <a href="{{ route('siswa.dashboard') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>

                    <form action="{{ route('siswa.laporan.destroy', $laporan->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger text-danger">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection