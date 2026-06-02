@extends('layouts.main')

@section('content')
<div class="mb-4 d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
    <div>
        <h1 class="mb-2">Daftar Kategori</h1>
        <p class="text-muted mb-0">Kelola kategori produk inventaris Anda.</p>
    </div>
    @if(auth()->user()->is_admin)
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah Kategori</a>
    @endif
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="w-5">No</th>
                        <th>Nama Kategori</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td class="text-end">
                                @if(auth()->user()->is_admin)
                                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus kategori ini?')">Hapus</button>
                                    </form>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">Belum ada kategori. Silakan tambah kategori baru.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
