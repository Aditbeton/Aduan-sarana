<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
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
}
