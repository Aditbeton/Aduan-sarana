@extends('layouts.admin')

@section('title', 'Daftar Siswa')

@section('content')
<div class="card mb-3">
    <div class="card-body">
        <form method="GET" action="" class="row g-2 align-items-end">

            <div class="col-md-3">
                <label class="form-label">Filter Status</label>
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua</option>
                    <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Filter Tanggal</label>
                <input type="date" name="tanggal" class="form-control"
                    value="{{ request('tanggal') }}"
                    onchange="this.form.submit()">
            </div>

            <div class="col-md-2">
                <a href="{{ url()->current() }}" class="btn btn-secondary w-100">Reset</a>
            </div>

        </form>
    </div>
</div>
<table class="table table-hover mb-0">
    <thead class="table-light">
        <tr>
            <th>No.</th>
            <th>Keterangan Laporan</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($laporan as $item)
        <tr>
            <td>{{ $loop->iteration + ($laporan->firstItem() - 1) }}.</td>

            <td>
                {{ $item->ket }}
                <p>
                    <small class="text-muted">
                        {{ $item->created_at->format('d M Y') }}
                    </small>
                </p>
                <p class="text-muted">
                    Kategori : {{ $item->kategori->nama_kategori }},
                    Lokasi : {{ $item->lokasi }},
                    Feedback : {{ $item->aspirasi?->feedback ?? '-' }}
                </p>
            </td>

            <td>
                @php
                    $status = $item->aspirasi?->status ?? 'menunggu';
                @endphp

                @if ($status == 'proses')
                    <span class="badge bg-warning text-dark">Diproses</span>
                @elseif ($status == 'selesai')
                    <span class="badge bg-success">Selesai</span>
                @else
                    <span class="badge bg-danger">Menunggu</span>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.laporan.show', $item->id) }}"
                    class="btn btn-sm btn-primary">
                    Detail
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center text-muted py-4">
                Belum ada laporan
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {{ $laporan->links() }}
</div>
@endsection