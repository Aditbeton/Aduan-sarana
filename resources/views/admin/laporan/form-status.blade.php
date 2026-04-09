<div class="card">
    <div class="card-header">
        Update Status Aspirasi
    </div>
    <div class="card-body">
        <form action="{{ route('admin.laporan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="proses" {{ $laporan->aspirasi?->status === 'proses' ? 'selected' : '' }}>
                        Proses
                    </option>
                    <option value="selesai" {{ $laporan->aspirasi?->status === 'selesai' ? 'selected' : '' }}>
                        Selesai
                    </option>
                </select>
                @error('status')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="bukti_penanganan" class="form-label">Bukti Penanganan</label>
                <input type="file" name="bukti_penanganan" id="bukti_penanganan"
                    class="form-control @error('bukti_penanganan') is-invalid @enderror" accept="image/*">
                @error('bukti_penanganan')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
                <small class="text-muted">Format: JPG, PNG, GIF. Maksimal 5MB</small>

                @if ($laporan->bukti_penanganan)
                    <div class="mt-2">
                        <small class="text-muted d-block mb-2">Bukti penanganan saat ini:</small>
                        <a href="{{ asset('storage/' . $laporan->bukti_penanganan) }}" target="_blank"
                            class="text-decoration-none">
                            <img src="{{ asset('storage/' . $laporan->bukti_penanganan) }}" alt="Bukti Penanganan"
                                class="img-fluid" style="max-width: 200px;">
                        </a>
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>

<a href="{{ route('admin.laporan.index') }}" class="btn btn-secondary w-100 mt-3">
    Kembali
</a>