@extends('layouts.main')

@section('content')
    <div class="py-5 text-center">
        <h1 class="display-5 fw-bold">Inventory App</h1>
        <p class="lead text-muted">Selamat datang pada aplikasi inventaris sederhana Laravel.</p>
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg px-4">Kelola Produk</a>
            <a href="{{ route('categories.index') }}" class="btn btn-success btn-lg px-4">Kelola Kategori</a>
        </div>
    </div>
@endsection
