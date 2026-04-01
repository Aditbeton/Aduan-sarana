@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
    <h4 class="mb-3 mt-3">Edit Kategori</h4>
    <div class="card">
        <form class="card-body" 
            action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST">
            <div class="row">
                <div class="col-md-6">
                    @csrf
                    @method('PUT')

                    <x-input name="nama_kategori" 
                        :value="$kategori->nama_kategori" placeholder="Nama Kategori" />

                    <button class="btn btn-primary">Update</button>
                    
                    <a href="{{ route('admin.kategori.index') }}" 
                        class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
@endsection
