@extends('layouts.main')

@section('content')
    <div class="py-5 text-center">
        <h1 class="display-5 fw-bold">Inventory App</h1>
        <p class="lead text-muted">Selamat datang pada aplikasi inventaris sederhana Laravel.</p>

        @guest
            <p class="text-muted">Silakan masuk atau daftar untuk mulai mengelola produk dan kategori.</p>
            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-success btn-lg px-4">Daftar</a>
            </div>
        @else
            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg px-4">Kelola Produk</a>
                <a href="{{ route('categories.index') }}" class="btn btn-success btn-lg px-4">Kelola Kategori</a>
            </div>
        @endguest
    </div>
@endsection
