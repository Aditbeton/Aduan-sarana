@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')
    <h4 class="mb-3 mt-3">Kategori</h4>

    <div class="card mb-3">
        <div class="card-body">
            <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary mb-3">
                <i class="bi bi-plus-circle"></i> Tambah Kategori
            </a>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
        </div>

        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Kategori</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategori as $item)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.kategori.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>

                                <form action="{{ route('admin.kategori.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus kategori ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Data kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer pb-0">
            {{ $kategori->links() }}
        </div>
    </div>
@endsection