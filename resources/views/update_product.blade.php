<!DOCTYPE html>
<html>

<head>
    <title>Edit Produk</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Poppins, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card-container {
            display: flex;
            max-width: 1000px;
            width: 100%;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
        }

        .left-panel {
            background-color: #F97417;
            width: 35%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 30px;
            color: white;
        }

        .left-panel img {
            width: 200px;
            margin-bottom: 20px;
        }

        .left-panel h2 {
            margin-bottom: 10px;
        }

        .left-panel p {
            text-align: center;
            font-size: 14px;
            line-height: 1.4;
        }

        .right-panel {
            width: 65%;
            padding: 40px;
        }

        .form-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .form-group {
            flex: 1 1 45%;
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            flex: 1 1 100%;
        }

        label {
            font-size: 14px;
            margin-bottom: 6px;
        }

        input,
        select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 14px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 20px;
        }

        .btn-cancel {
            background: #444;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-save {
            background-color: #F97417;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
        }

        .product-image {
            margin-top: 12px;
            border-radius: 10px;
            width: 100px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="card-container">
        <!-- Panel Kiri -->
        <div class="left-panel">
            <img src="{{ asset('assets/img/illustrations/cake-strawberry.png') }}" alt="Product Icon">
            <h2>Edit Produk</h2>
            <p>Ubah detail produk yang ingin kamu perbarui agar tetap akurat dan menarik.</p>
        </div>

        <!-- Panel Kanan -->
        <div class="right-panel">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="form-group">
                        <label>Nama Produk:</label>
                        <input type="text" name="name" value="{{ $product->name }}" required>
                    </div>

                    <div class="form-group">
                        <label>Kategori:</label>
                        <select name="kategori" required>
                            <option value="pastry" {{ $product->kategori == 'pastry' ? 'selected' : '' }}>Pastry</option>
                            <option value="with cheese" {{ $product->kategori == 'with cheese' ? 'selected' : '' }}>With Cheese</option>
                            <option value="cake" {{ $product->kategori == 'cake' ? 'selected' : '' }}>Cake</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Harga:</label>
                        <input type="number" name="price" step="0.01" value="{{ $product->price }}" required>
                    </div>

                    <div class="form-group">
                        <label>Stok:</label>
                        <input type="number" name="stock" value="{{ $product->stock }}" required>
                    </div>

                    <div class="form-group">
                        <label>Satuan:</label>
                        <input type="text" name="unit" value="{{ $product->unit }}" required>
                    </div>

                    <div class="form-group full-width">
                        <label>Ganti Gambar (jika ingin):</label>
                        <input type="file" name="gambar">

                        @if($product->gambar)
                        <img src="{{ asset('images/'.$product->gambar) }}" alt="Gambar Produk" class="product-image">
                        @endif
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('products.index') }}" class="btn-cancel">BATAL</a>
                    <button type="submit" class="btn-save">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
