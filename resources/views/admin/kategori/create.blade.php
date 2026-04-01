@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
    <h4 class="mb-3 mt-3">Tambah Kategori</h4>
    <div class="card">
        <form action="{{ route('admin.kategori.store') }}" method="POST" class="card-body">
            <div class="row">
                <div class="col-md-6">
                    @csrf
                    <x-input name="nama_kategori" placeholder="Nama Kategori" />
                    
                    <button class="btn btn-primary">Simpan</button>
                    
                    <a href="{{ route('admin.kategori.index') }}" 
                        class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
@endsection
