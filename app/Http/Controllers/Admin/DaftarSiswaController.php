<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\LaporanPengaduan;
use Illuminate\Http\Request;

class DaftarSiswaController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $siswa = Siswa::when($search, function ($query, $search) {
        return $query->where('nama', 'like', "{$search}%")
                     ->orWhere('nis', 'like', "{$search}%")
                     ->orWhere('kelas', 'like', "{$search}%");
    })->paginate(10)->withQueryString();

    return view('admin.daftar-siswa.index', compact('siswa'));
}

public function showHistory(Request $request, $id)
{
    $siswa = Siswa::findOrFail($id);

    $status = $request->status;
    $tanggal = $request->tanggal;

    $laporan = LaporanPengaduan::with(['kategori', 'aspirasi'])
        ->where('siswa_id', $id)

        ->when($status, function ($query, $status) {
            if ($status == 'menunggu') {
                $query->whereDoesntHave('aspirasi');
            } else {
                $query->whereHas('aspirasi', function ($q) use ($status) {
                    $q->where('status', $status);
                });
            }
        })

        ->when($tanggal, function ($query, $tanggal) {
            $query->whereDate('created_at', $tanggal);
        })

        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view('admin.daftar-siswa.show-history', compact('siswa', 'laporan'));
}
}
