<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tabel Produk dan Pesanan - TokoCepat</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 30px;
    }
    th, td {
      border: 1px solid #333;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    caption {
      font-weight: bold;
      margin-bottom: 10px;
      font-size: 1.2em;
    }
  </style>
</head>
<body>

  <table>
    <caption>Tabel 1 - Products</caption>
    <thead>
      <tr>
        <th>Nama Field</th>
        <th>Tipe Data</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>BIGINT</td><td>Primary key otomatis, unik untuk setiap produk</td></tr>
      <tr><td>name</td><td>VARCHAR (string)</td><td>Nama produk (wajib diisi)</td></tr>
      <tr><td>description</td><td>TEXT</td><td>Deskripsi produk (boleh kosong/null)</td></tr>
      <tr><td>price</td><td>DECIMAL(10,2)</td><td>Harga produk (contoh: 100000.00), presisi tinggi untuk nilai uang</td></tr>
      <tr><td>stock</td><td>INTEGER</td><td>Jumlah stok produk yang tersedia</td></tr>
      <tr><td>image</td><td>VARCHAR (string)</td><td>Nama file gambar atau path gambar produk (boleh kosong/null)</td></tr>
      <tr><td>created_at</td><td>TIMESTAMP</td><td>Waktu saat produk dibuat (otomatis diisi oleh Laravel)</td></tr>
      <tr><td>updated_at</td><td>TIMESTAMP</td><td>Waktu saat produk terakhir diperbarui (otomatis diisi oleh Laravel)</td></tr>
    </tbody>
  </table>

  <table>
    <caption>Tabel 2 - Orders</caption>
    <thead>
      <tr>
        <th>Nama Field</th>
        <th>Tipe Data</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>BIGINT (auto increment)</td><td>Primary key unik untuk setiap pesanan, nilainya bertambah otomatis</td></tr>
      <tr><td>product_name</td><td>VARCHAR (string)</td><td>Nama produk yang dipesan</td></tr>
      <tr><td>quantity</td><td>INTEGER</td><td>Jumlah produk yang dipesan</td></tr>
      <tr><td>price</td><td>INTEGER</td><td>Harga satuan produk (misalnya 10000 untuk Rp10.000)</td></tr>
      <tr><td>created_at</td><td>TIMESTAMP</td><td>Waktu saat pesanan dibuat (diisi otomatis oleh Laravel)</td></tr>
      <tr><td>updated_at</td><td>TIMESTAMP</td><td>Waktu saat pesanan terakhir diperbarui (diisi otomatis oleh Laravel)</td></tr>
    </tbody>
  </table>

</body>
</html>
