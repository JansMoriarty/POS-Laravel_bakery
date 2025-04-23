<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nama Produk:</label><br>
        <input type="text" name="name" value="{{ $product->name }}" required><br><br>

        <label>Kategori:</label><br>
        <select name="kategori" required>
            <option value="pastry" {{ $product->kategori == 'pastry' ? 'selected' : '' }}>Pastry</option>
            <option value="with cheese" {{ $product->kategori == 'with cheese' ? 'selected' : '' }}>With Cheese</option>
            <option value="cake" {{ $product->kategori == 'cake' ? 'selected' : '' }}>Cake</option>
        </select><br><br>

        <label>Harga:</label><br>
        <input type="number" name="price" step="0.01" value="{{ $product->price }}" required><br><br>

        <label>Stok:</label><br>
        <input type="number" name="stock" value="{{ $product->stock }}" required><br><br>

        <label>Satuan:</label><br>
        <input type="text" name="unit" value="{{ $product->unit }}" required><br><br>

        <label>Ganti Gambar (jika ingin):</label><br>
        <input type="file" name="gambar"><br><br>

        @if($product->gambar)
            <img src="{{ asset('images/'.$product->gambar) }}" alt="Gambar Produk" width="100"><br><br>
        @endif

        <button type="submit">Update</button>
    </form>
</body>
</html>
