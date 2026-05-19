@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="card-header bg-primary text-white p-4">
                    <h2 class="fw-bold mb-1">Edit Kategori</h2>
                    <p class="mb-0 text-light">Ubah nama kategori sesuai kebutuhan.</p>
                </div>
                <div class="card-body p-5">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Nama Kategori</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control form-control-lg"
                                value="{{ old('name', $category->name) }}"
                                placeholder="Masukkan nama kategori"
                                required
                            >
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-lg px-4">Kembali</a>
                            <button type="submit" class="btn btn-primary btn-lg px-4">Perbarui Kategori</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
