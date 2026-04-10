@extends('layouts.siswa')

@section('title', 'Buat Laporan Pengaduan')

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h5 class="card-title">
                Buat Laporan Pengaduan
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('siswa.laporan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Kategori --}}
                        <x-select label="Kategori" name="kategori_id" :options="$kategori" label-field="nama_kategori" />

                        {{-- Lokasi --}}
                        <x-input label="Lokasi Kejadian" name="lokasi" placeholder="Contoh: Ruang Kelas X RPL A" />

                        {{-- Keterangan --}}
                        <x-textarea label="Keterangan" name="ket" placeholder="Masukkan keterangan..." rows="5" />

                        {{-- Bukti Laporan --}}
                        <div class="mb-3">
                            <label for="bukti" class="form-label">Bukti Laporan</label>
                            <input type="file" name="bukti" id="bukti"
                                class="form-control @error('bukti') is-invalid @enderror" accept="image/*">
                            @error('bukti')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="text-muted">Format: JPG, PNG, GIF. Maksimal 5MB</small>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary">
                                <i class="bi bi-send"></i>
                                Kirim Laporan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection