@extends('layouts.main')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">

                
                <div class="card-header bg-primary text-white p-4">
                    <h2 class="fw-bold mb-1">Tambah Produk baru</h2>
                    <p class="mb-0 text-light">
                        Silakan isi data produk dengan lengkap
                    </p>
                </div>

                
                <div class="card-body p-5">

                    <form action="{{ route('insert.store') }}" method="POST">
                        @csrf

                        
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">
                                Nama Produk
                            </label>

                            <input 
                                type="text" 
                                name="name" 
                                id="name"
                                class="form-control form-control-lg"
                                placeholder="Masukkan nama produk"
                                required
                            >
                        </div>

                        
                        <div class="mb-4">
                            <label for="category_id" class="form-label fw-semibold">
                                Kategori
                            </label>

                            <select 
                                name="category_id" 
                                id="category_id"
                                class="form-select form-select-lg"
                                required
                            >
                                <option value="">-- Pilih Kategori --</option>

                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        
                        <div class="row">

                            
                            <div class="col-md-6 mb-4">
                                <label for="price" class="form-label fw-semibold">
                                    Harga
                                </label>

                                <input 
                                    type="number" 
                                    name="price" 
                                    id="price"
                                    class="form-control form-control-lg"
                                    placeholder="Masukkan harga"
                                    required
                                >
                            </div>

                            
                            <div class="col-md-6 mb-4">
                                <label for="stock" class="form-label fw-semibold">
                                    Stok
                                </label>

                                <input 
                                    type="number" 
                                    name="stock" 
                                    id="stock"
                                    class="form-control form-control-lg"
                                    placeholder="Masukkan stok"
                                    required
                                >
                            </div>

                        </div>

                        
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">
                                Deskripsi
                            </label>

                            <textarea 
                                name="description" 
                                id="description"
                                rows="5"
                                class="form-control"
                                placeholder="Masukkan deskripsi produk..."
                            ></textarea>
                        </div>

                        
                        <div class="d-flex justify-content-end gap-3 mt-4">

                            <a href="{{ route('products.index') }}" class="btn btn-secondary btn-lg px-4">
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-primary btn-lg px-4">
                                Simpan Produk
                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection