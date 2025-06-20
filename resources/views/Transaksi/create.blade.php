@extends('layouts.app')

@section('content')
<h2>Form Transaksi</h2>
<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf
    <label>Produk:</label>
    <select name="produk_id">
        @foreach($produks as $produk)
            <option value="{{ $produk->id }}">{{ $produk->nama }} - Rp{{ $produk->harga }}</option>
        @endforeach
    </select><br><br>

    <label>Jumlah:</label>
    <input type="number" name="jumlah" required><br><br>

    <button type="submit">Pesan</button>
</form>
@endsection
