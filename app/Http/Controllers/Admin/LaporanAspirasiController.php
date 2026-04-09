<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Aspirasi;
use App\Models\LaporanPengaduan;

class LaporanAspirasiController extends Controller
{
    public function index(Request $request)
    {
        $query = LaporanPengaduan::with(['kategori', 'aspirasi', 'siswa'])
            ->latest();

        // Filter berdasarkan status
        if ($request->filled('status')) {
            if ($request->status == 'belum') {
                $query->where(function ($q) {
                    $q->whereDoesntHave('aspirasi')
                        ->orWhereHas('aspirasi', function ($sub) {
                            $sub->where('status', 'menunggu');
                        });
                });
            } else {
                $query->whereHas('aspirasi', function ($q) use ($request) {
                    $q->where('status', $request->status);
                });
            }
        }

        $laporan = $query->paginate(10)->withQueryString();

        $kepuasan = [
            1 => 'Tidak Puas',
            2 => 'Kurang Puas',
            3 => 'Cukup Puas',
            4 => 'Puas',
            5 => 'Sangat Puas',
        ];

        // Transformasi data untuk tampilan tabel
        $laporan->getCollection()->transform(function ($item) use ($kepuasan) {
            $item->status = $item->aspirasi?->status;

            $nilai = $item->aspirasi?->feedback ?? null;
            $item->feedback = $nilai
                ? $kepuasan[$nilai] ?? '-'
                : 'Belum ada feedback';

            return $item;
        });

        return view('admin.laporan.index', compact('laporan'));
    }

    public function show(LaporanPengaduan $laporan)
    {
        $laporan->load(['kategori', 'aspirasi', 'siswa']);

        $kepuasan = [
            1 => 'Tidak Puas',
            2 => 'Kurang Puas',
            3 => 'Cukup Puas',
            4 => 'Puas',
            5 => 'Sangat Puas',
        ];

        if ($laporan->aspirasi?->feedback) {
            $laporan->feedback = $kepuasan[$laporan->aspirasi->feedback] ?? '-';
        } else {
            $laporan->feedback = 'Belum ada feedback';
        }

        return view('admin.laporan.show', compact('laporan'));
    }

    public function update(Request $request, LaporanPengaduan $laporan)
    {
        $request->validate([
            'status' => 'required|in:proses,selesai',
            'bukti_penanganan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        // Handle file upload bukti penanganan
        $buktiPenangananPath = $laporan->bukti_penanganan;
        if ($request->hasFile('bukti_penanganan')) {
            // Hapus file lama jika ada
            if ($buktiPenangananPath && Storage::disk('public')->exists($buktiPenangananPath)) {
                Storage::disk('public')->delete($buktiPenangananPath);
            }
            $buktiPenangananPath = $request->file('bukti_penanganan')->store('bukti-penanganan', 'public');
        }

        // Membuat atau memperbarui data di tabel aspirasi
        Aspirasi::updateOrCreate(
            [
                'laporan_id' => $laporan->id,
            ],
            [
                'admin_id' => Auth::guard('admin')->id(),
                'status' => $request->status,
            ]
        );

        // Update bukti_penanganan di tabel laporan_pengaduans
        $laporan->update([
            'bukti_penanganan' => $buktiPenangananPath,
        ]);

        return redirect()
            ->route('admin.laporan.show', $laporan->id)
            ->with('success', 'Status aspirasi dan bukti penanganan berhasil diperbarui.');
    }
}
