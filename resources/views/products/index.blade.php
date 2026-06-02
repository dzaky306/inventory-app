@extends('layouts.main')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="mb-4 d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
    <div>
        <h1 class="mb-3">Daftar Barang Inventaris</h1>
    </div>
    @if(auth()->user()->is_admin)
        <a href="{{ route('insert') }}" class="btn btn-primary">Tambah Data</a>
    @endif
</div>

<table class="table table-striped">
<thead>
<tr>
<th>No</th>
<th>Nama Barang</th>
<th>Kategori</th>
<th>Harga</th>
<th>Stok</th>
<th>Deskripsi</th>
<th>Status</th>
<th class="text-end">Aksi</th>
</tr>
</thead>

<tbody>
@forelse($products as $p)
<tr>
<td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
<td>{{ $p->name }}</td>
<td>{{ $p->category->name }}</td>
<td>Rp {{ number_format($p->price) }}</td>
<td>{{ $p->stock }}</td>
<td>{{ $p->description ?? '-' }}</td>
<td>
    @if($p->stock > 0)
        <span class="badge bg-success">Tersedia</span>
    @else
        <span class="badge bg-danger">Habis</span>
    @endif
</td>
<td class="text-end">
    @if(auth()->user()->is_admin)
        <a href="{{ route('products.edit', $p) }}" class="btn btn-sm btn-outline-primary me-1">Edit</a>
        <form action="{{ route('products.destroy', $p) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus produk ini?')">Hapus</button>
        </form>
    @else
        -
    @endif
</td>
</tr>
@empty
<tr>
    <td colspan="8" class="text-center py-4">Belum ada produk untuk ditampilkan.</td>
</tr>
@endforelse
</tbody>
</table>

{{ $products->links() }}
@endsection