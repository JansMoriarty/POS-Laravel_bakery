<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .text-xxs { font-size: 0.75rem; }
        .font-weight-bolder { font-weight: 700; }
        .opacity-7 { opacity: .7; }
        .badge-sm { font-size: 0.7rem; padding: 5px 8px; }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6>Riwayat Transaksi</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Invoice</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Harga</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pembayaran</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kembalian</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transactions as $index => $transaction)
                                        <tr>
                                            <td class="text-sm">{{ $transactions->firstItem() + $index }}</td>
                                            <td class="text-sm">{{ $transaction->invoice_number }}</td>
                                            <td class="text-sm">{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y H:i') }}</td>
                                            <td class="text-sm">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                                            <td class="text-sm">Rp {{ number_format($transaction->payment_amount, 0, ',', '.') }}</td>
                                            <td class="text-sm">Rp {{ number_format($transaction->change_amount, 0, ',', '.') }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('receipt.show', $transaction->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="bi bi-receipt me-1"></i> Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-sm">Belum ada transaksi.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3 px-3">
                            {{ $transactions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
