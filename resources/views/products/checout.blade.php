<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout - TokoCepat</title>
</head>
<body>
    <h1>Checkout</h1>

    <form action="{{ route('process.checkout') }}" method="POST">
        @csrf
        Nama: <input type="text" name="customer_name" required><br><br>
        Alamat: <textarea name="customer_address" required></textarea><br><br>

        <h2>Ringkasan Belanja</h2>
        <table border="1" cellpadding="10">
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
            @php $grandTotal = 0; @endphp
            @foreach($cart as $id => $details)
                @php $grandTotal += $details['price'] * $details['quantity']; @endphp
                <tr>
                    <td>{{ $details['name'] }}</td>
                    <td>Rp {{ number_format($details['price']) }}</td>
                    <td>{{ $details['quantity'] }}</td>
                    <td>Rp {{ number_format($details['price'] * $details['quantity']) }}</td>
                </tr>
            @endforeach
        </table>

        <h2>Total Bayar: Rp {{ number_format($grandTotal) }}</h2>

        <button type="submit">Konfirmasi Pembayaran</button>
    </form>

    <a href="{{ route('cart') }}">Kembali ke Keranjang</a>
</body>
</html>