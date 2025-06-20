@extends('layouts.app')

@section('content')
<h2>Riwayat Transaksi</h2>
<table>
    <tr>
        <th>Produk</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
        <th>Tanggal</th>
    </tr>
    @foreach($transaksis as $trx)
    <tr>
        <td>{{ $trx->produk->nama }}</td>
        <td>{{ $trx->jumlah }}</td>
        <td>Rp{{ $trx->total_harga }}</td>
        <td>{{ $trx->created_at->format('d M Y') }}</td>
    </tr>
    @endforeach
</table>
@endsection
