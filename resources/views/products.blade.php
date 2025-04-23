<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <h1>Daftar Produk</h1>

    <a href="{{ route('products.create') }}">Tambah Produk</a><br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->kategori }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->unit }}</td>
                    <td>
                        @if($product->gambar)
                            <img src="{{ asset('images/' . $product->gambar) }}" width="50">
                        @else
                            Tidak ada
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.update.form', $product->id) }}">Edit</a>

                        <!-- Form untuk hapus produk dengan ikon -->
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus produk ini?')" style="border:none; background:none;">
                                <i class="fas fa-trash-alt" style="color:red; font-size:20px;"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
