<div class="card mb-3">
    <div class="card-body">
        <table class="table table-borderless">
            <tr>
                <th width="200">Nama Siswa</th>
                <td>{{ $laporan->siswa->nama }}</td>
            </tr>
            <tr>
                <th width="200">NIS</th>
                <td>{{ $laporan->siswa->nis }}</td>
            </tr>
            <tr>
                <th width="200">Kelas</th>
                <td>{{ $laporan->siswa->kelas }}</td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>{{ $laporan->kategori->nama_kategori }}</td>
            </tr>
            <tr>
                <th>Laporan</th>
                <td>{{ $laporan->ket }}</td>
            </tr>
            <tr>
                <th>Lokasi</th>
                <td>{{ $laporan->lokasi }}</td>
            </tr>
            <tr>
                <th>Status Saat Ini</th>
                <td>
                    @if ($laporan->aspirasi?->status === 'selesai')
                        <span class="badge bg-success">Selesai</span>
                    @elseif ($laporan->aspirasi?->status === 'proses')
                        <span class="badge bg-warning">Proses</span>
                    @else
                        <span class="badge bg-secondary">Belum Diproses</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Feedback Kepuasan</th>
                <td>
                    <span class="badge bg-info">
                        {{ $laporan->feedback }}
                    </span>
                </td>
            </tr>
        </table>
    </div>
</div>

{{-- Bukti Laporan --}}
<div class="card mb-3">
    <div class="card-header">
        <h6 class="mb-0">Bukti Laporan</h6>
    </div>
    <div class="card-body">
        @if ($laporan->bukti)
            <a href="{{ asset('storage/' . $laporan->bukti) }}" target="_blank" class="text-decoration-none">
                <img src="{{ asset('storage/' . $laporan->bukti) }}" alt="Bukti Laporan" class="img-fluid"
                    style="max-width: 100%; max-height: 400px;">
            </a>
        @else
            <span class="text-muted">Tidak ada bukti laporan</span>
        @endif
    </div>
</div>

{{-- Bukti Penanganan --}}
<div class="card mb-3">
    <div class="card-header">
        <h6 class="mb-0">Bukti Penanganan</h6>
    </div>
    <div class="card-body">
        @if ($laporan->bukti_penanganan)
            <a href="{{ asset('storage/' . $laporan->bukti_penanganan) }}" target="_blank" class="text-decoration-none">
                <img src="{{ asset('storage/' . $laporan->bukti_penanganan) }}" alt="Bukti Penanganan" class="img-fluid"
                    style="max-width: 100%; max-height: 400px;">
            </a>
        @else
            <span class="text-muted">Belum ada bukti penanganan</span>
        @endif
    </div>
</div>