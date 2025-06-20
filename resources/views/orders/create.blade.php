@extends('layouts.app')

@section('content')
@php /** @var \App\Models\Produk|null $produk */ @endphp
<div class="container">
    @if($produk)
        <h2>Order Produk: {{ $produk->name }}</h2>

        <form action="{{ route('orders.store', $produk->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="customer_name" class="form-label">Nama Pemesan</label>
                <input type="text" name="customer_name" id="customer_name" class="form-control" required value="{{ old('customer_name') }}">
            </div>

            <div class="mb-3">
                <label for="customer_email" class="form-label">Email Pemesan</label>
                <input type="email" name="customer_email" id="customer_email" class="form-control" required value="{{ old('customer_email') }}">
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Jumlah</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" required value="{{ old('quantity', 1) }}">
            </div>

            <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
        </form>
    @else
        <div class="alert alert-danger mt-4">Produk tidak ditemukan.</div>
    @endif
</div>
@endsection
