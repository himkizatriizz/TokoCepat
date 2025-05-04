@extends('layouts.app')

@section('content')
    <h2>Keranjang Belanja</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(count($cart))
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <table border="1" cellpadding="8">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>Rp{{ number_format($item['price']) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <br>
            <button type="submit">Checkout</button>
        </form>
    @else
        <p>Keranjang kosong.</p>
    @endif
@endsection