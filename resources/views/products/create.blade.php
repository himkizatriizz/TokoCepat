<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk - TokoCepat</title>
</head>
<body>
    <h1>Tambah Produk Baru</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        Nama: <input type="text" name="name"><br>
        Harga: <input type="text" name="price"><br>
        Stok: <input type="number" name="stock"><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html> 