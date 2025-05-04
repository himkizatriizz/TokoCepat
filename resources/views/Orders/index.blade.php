@extends('layouts.app')

@section('content')
    <h2>Daftar Pesanan</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($orders->count())
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->product_name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>Rp{{ number_format($order->price) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada pesanan.</p>
    @endif
@endsection