@extends('layouts.admin')

@section('content')
<div class="row g-3 mb-4 mt-3">
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="text-muted small">
                    Total Siswa
                </div>
                <h3><i class="bi bi-people-fill text-primary"></i>
                    {{ $totalSiswa ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="text-muted small">
                    Total Laporan
                </div>
                <h3><i class="bi bi-file-earmark-text-fill text-secondary"></i>
                    {{ $totalLaporan ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="text-muted small">
                    Laporan Belum Diproses
                </div>
                <h3><i class="bi-hourglass-split text-danger"></i>
                    {{ $laporanMenunggu ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="text-muted small">
                    Laporan Diproses
                </div>
                <h3><i class="bi-arrow-repeat text-warning"></i>
                    {{ $laporanProses ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="text-muted small">
                    Laporan Selesai
                </div>
                <h3><i class="bi-patch-check-fill text-success"></i>
                    {{ $laporanSelesai ?? 0 }}</h3>
            </div>
        </div>
    </div>

</div>

@include('admin.list-laporan')
@endsection