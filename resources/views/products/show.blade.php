<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Produk - TokoCepat</title>
</head>
<body>
    <h1>{{ $product->name }}</h1>
    <p>Rp {{ number_format($product->price) }}</p>
    <p>Stok: {{ $product->stock }}</p>
    <p>{{ $product->description }}</p>

    <a href="{{ route('products.index') }}">Kembali</a>
</body>
</html>