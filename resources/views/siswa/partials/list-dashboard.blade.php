<table class="table table-hover mb-0">
    <thead class="table-light">
        <tr>
            <th>#</th>
            <th>Keterangan Laporan</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($laporan as $item)
        <tr>
            <td>{{ ($loop->iteration + ($laporan->firstItem() - 1)) }}</td>
            <td>
                {{ $item->ket }}
                <p>
                    <small class="text-muted">
                        {{ $item->created_at->format('d M Y') }}
                    </small>
                </p>
                <p class="text-muted">
                    Kategori : {{ $item->kategori->nama_kategori ?? '-' }},
                    Lokasi : {{ $item->lokasi }},
                    Feedback : {{ $item->feedback }}
                </p>
            </td>
            <td>
                @if ($item->status == 'proses')
                <span class="badge bg-warning text-dark">            <i class="bi bi-hourglass-split"></i>Diproses</span>
                @elseif ($item->status == 'selesai')
                <span class="badge bg-success">            <i class="bi bi-check-circle"></i> Selesai</span>
                @else
                <span class="badge bg-danger">            <i class="bi bi-clock-fill"></i> Menunggu</span>
                @endif
            </td>
            <td>
                <a href="{{ route('siswa.laporan.show', $item->id) }}"
                    class="btn btn-primary">
                    <i class="bi bi-eye"></i>
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center text-muted py-4">
                Belum ada laporan
            </td>
        </tr>
        @endforelse
    </tbody>
</table>