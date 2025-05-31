<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 6px 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Laporan Penjualan<br><small>{{ $from }} - {{ $to }}</small></h2>

    <p><strong>Total Pendapatan:</strong> Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
    <p><strong>Total Transaksi:</strong> {{ $totalTransaksi }}</p>

    <h4>Produk Terjual</h4>
    <table>
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Total Terjual</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produkTerjual as $produk)
                <tr>
                    <td>{{ $produk->name }}</td>
                    <td>{{ $produk->total_terjual }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
