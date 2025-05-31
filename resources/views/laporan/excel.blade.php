<table>
    <thead>
        <tr>
            <th colspan="2">Laporan Produk Terjual</th>
        </tr>
        <tr>
            <th>Periode</th>
            <td>{{ $from }} s/d {{ $to }}</td>
        </tr>
        <tr>
            <th>Total Pendapatan</th>
            <td>Rp. {{ number_format($totalPendapatan, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Total Transaksi</th>
            <td>{{ $totalTransaksi }}</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Produk</th>
            <th>Jumlah Terjual</th>
        </tr>
        @foreach ($produkTerjual as $produk)
        <tr>
            <td>{{ $produk->name }}</td>
            <td>{{ $produk->total_terjual }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
