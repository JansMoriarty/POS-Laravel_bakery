<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
</head>
<body>
    <h1>Tambah Produk Baru</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nama Produk:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Kategori:</label><br>
        <select name="kategori" required>
            <option value="pastry">Pastry</option>
            <option value="with cheese">With Cheese</option>
            <option value="cake">Cake</option>
        </select><br><br>

        <label>Harga:</label><br>
        <input type="number" name="price" step="0.01" required><br><br>

        <label>Stok:</label><br>
        <input type="number" name="stock" required><br><br>

        <label>Satuan:</label><br>
        <input type="text" name="unit" required><br><br>

        <label>Gambar (opsional):</label><br>
        <input type="file" name="gambar"><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
