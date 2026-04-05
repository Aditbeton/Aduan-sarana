@extends('layouts.admin')

@section('title', 'Daftar Siswa')

@section('content')
    <h4 class="mb-3 mt-3">Daftar Siswa</h4>
    <div class="card mb-3">
        <div class="card-body">
          <form method="GET" id="searchForm">
    <div class="input-group">
        <input type="search" id="searchInput" name="search" 
               class="form-control" 
               placeholder="Cari..." 
               value="{{ request('search') }}">
        <span class="input-group-text">
            <i class="bi bi-search"></i>
        </span>
    </div>
</form>
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
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siswa as $item)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $item->nis }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kelas }}</td>
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
            {{ $siswa->links() }}
        </div>
    </div>
    <script>
    let timeout = null;

    document.getElementById('searchInput').addEventListener('keyup', function () {
        clearTimeout(timeout);

        timeout = setTimeout(() => {
            document.getElementById('searchForm').submit();
        }, 500); // delay 500ms biar nggak spam request
    });
    
    window.addEventListener('load', function () {
        const input = document.getElementById('searchInput');
        input.focus();

        // opsional: biar cursor di paling kanan
        let val = input.value;
        input.value = '';
        input.value = val;
    });
</script>
@endsection