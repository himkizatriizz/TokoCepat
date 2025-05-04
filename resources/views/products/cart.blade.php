<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja - TokoCepat</title>
</head>
<body>
    <h1>Keranjang Belanja</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if($cart)
        <table border="1" cellpadding="10">
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
            @php $total = 0; @endphp
            @foreach($cart as $id => $details)
                @php $total += $details['price'] * $details['quantity']; @endphp
                <tr>
                    <td>{{ $details['name'] }}</td>
                    <td>Rp {{ number_format($details['price']) }}</td>
                    <td>
                        <form action="{{ route('update.cart') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
                            <button type="submit">Update</button>
                        </form>
                    </td>
                    <td>Rp {{ number_format($details['price'] * $details['quantity']) }}</td>
                    <td>
                        <form action="{{ route('remove.from.cart') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $id }}">
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <h3>Total Belanja: Rp {{ number_format($total) }}</h3>

        <a href="{{ url('/') }}">Lanjut Belanja</a> |
        <a href="{{ url('/checkout') }}">Checkout</a>

    @else
        <p>Keranjang kosong</p>
    @endif

</body>
</html>