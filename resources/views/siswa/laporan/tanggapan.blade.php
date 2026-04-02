<div class="mb-4">
    <div class="text-muted small">Tanggapan</div>
    @if ($laporan->aspirasi?->status === 'selesai')
        <span class="badge bg-success">
            <i class="bi bi-check-circle"></i>
            {{ ucwords($laporan->aspirasi?->status) }}
        </span>
    @elseif ($laporan->aspirasi?->status === 'proses')
        <span class="badge bg-warning">
            <i class="bi bi-hourglass-split"></i>
            {{ ucwords($laporan->aspirasi?->status) }}
        </span>
    @else
        <span class="badge bg-danger">
            <i class="bi bi-clock"></i>
            Menunggu
        </span>
@endif

</div>
