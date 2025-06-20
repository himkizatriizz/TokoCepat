@extends('layouts.app')

@section('title', 'Edit Produk - TokoCepat')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0">
                        <i class="fas fa-edit me-2"></i>Edit Produk
                    </h4>
                </div>
                <div class="card-body p-4">
                    @php /** @var \App\Models\Produk|null $produk */ @endphp
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ old('name', $produk ? $produk->name : '') }}" required>
                        </div>
                        @if(!$produk)
                            <div class="alert alert-danger">Produk tidak ditemukan.</div>
                        @endif
                        <div class="mb-4">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $produk->description) }}</textarea>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="price" class="form-label">Harga <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" class="form-control" id="price" name="price" min="0" value="{{ old('price', $produk->price) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="stock" class="form-label">Stok <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="stock" name="stock" min="0" value="{{ old('stock', $produk->stock) }}" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <input type="hidden" name="is_featured" value="0">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $produk->is_featured) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">Produk Unggulan</label>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="form-label">Gambar Produk</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            <div class="form-text">Format: JPEG/PNG, Maksimal 2MB</div>
                            @if($produk->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $produk->image) }}" alt="Gambar Produk" width="120">
                                    <span class="text-muted ms-2">Gambar saat ini</span>
                                </div>
                            @endif
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary me-md-2">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Update Produk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 