@extends('layouts.main')

@section('content')
<div class="mb-4">
    <h1 class="mb-3">Daftar Barang Inventaris</h1>
    <a href="{{ route('insert') }}" class="btn btn-primary">Tambah Data</a>
</div>

<table class="table table-striped">
<thead>
<tr>
<th>Nama Barang</th>
<th>Kategori</th>
<th>Harga</th>
<th>Stok</th>
<th>Deskripsi</th>
<th>Status</th>
</tr>
</thead>

<tbody>
@foreach($products as $p)
<tr>
<td>{{ $p->name }}</td>
<td>{{ $p->category->name }}</td>
<td>Rp {{ number_format($p->price) }}</td>
<td>{{ $p->stock }}</td>
<td>{{ $p->description ?? '-' }}</td>
<td>
    @if($p->status === 'tersedia')
        <span class="badge bg-success">Tersedia</span>
    @else
        <span class="badge bg-danger">Habis</span>
    @endif
</td>
</tr>
@endforeach
</tbody>
</table>

{{ $products->links() }}
@endsection