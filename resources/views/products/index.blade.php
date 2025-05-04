@extends('layouts.app')

@section('title', 'Produk - TokoCepat')

@section('content')
    <h1>Daftar Produk TokoCepat</h1>

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tambah Produk Baru</a>

    @foreach($products as $product)
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="card-title">{{ $product->name }}</h2>
                <p class="card-text">Rp {{ number_format($product->price) }}</p>
                <p class="card-text">Stok: {{ $product->stock }}</p>

                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Lihat Detail</a>

                {{-- Tombol Tambah ke Keranjang --}}
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-success">Tambah ke Keranjang</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
