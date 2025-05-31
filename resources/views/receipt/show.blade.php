<!DOCTYPE html>
<html>
<head>
    <title>Receipt #{{ $transaction->invoice_number }}</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            max-width: 300px;
            margin: auto;
            padding: 20px;
            border: 1px dashed #000;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }
        .header img {
            max-width: 50px;
            max-height: 50px;
            margin-right: 10px;
        }
        .header h1 {
            font-size: 18px;
            margin: 0;
        }
        h2, p, table {
            text-align: center;
            margin: 0;
            padding: 0;
        }
        h2 {
            font-size: 16px;
            margin-bottom: 10px;
        }
        p {
            font-size: 14px;
            margin-bottom: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 13px;
        }
        th, td {
            padding: 4px 0;
        }
        th {
            border-bottom: 1px dashed #000;
        }
        tr:not(:last-child) td {
            border-bottom: 1px dashed #ddd;
        }
        .summary {
            margin-top: 10px;
            font-size: 14px;
        }
        .summary p {
            display: flex;
            justify-content: space-between;
            margin: 2px 0;
        }
        .thank-you {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
        }
        hr {
            border: none;
            border-top: 1px dashed #000;
            margin: 10px 0;
        }
        .button-group {
            text-align: center;
            margin-top: 20px;
        }
        .button-group a,
        .button-group button {
            display: inline-block;
            padding: 8px 12px;
            margin: 5px;
            font-size: 14px;
            text-decoration: none;
            color: #fff;
            background-color: #333;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .button-group a:hover,
        .button-group button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{asset('assets/img/cremeco.png')}}" alt="Logo Toko">
        <h1>Créme Co.</h1>
    </div>

    <h2>STRUK PEMBAYARAN</h2>
    <p>Invoice: {{ $transaction->invoice_number }}</p>
    <p>Kasir: {{ $transaction->pengguna->name }}</p>
    <p>Tanggal: {{ $transaction->transaction_date }}</p>

    <hr>

    <table>
        <thead>
            <tr>
                <th style="text-align:left;">Item</th>
                <th style="text-align:right;">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaction->items as $item)
            <tr>
                <td style="text-align:left;">
                    {{ $item->product->name }} x{{ $item->qty }}
                </td>
                <td style="text-align:right;">
                    Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <div class="summary">
        <p><span>Total</span><span>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</span></p>
        <p><span>Bayar</span><span>Rp {{ number_format($transaction->payment_amount, 0, ',', '.') }}</span></p>
        <p><span>Kembali</span><span>Rp {{ number_format($transaction->change_amount, 0, ',', '.') }}</span></p>
    </div>

    <hr>

    <div class="thank-you">
        <p>*** TERIMA KASIH ***</p>
        <p>Telah berbelanja di toko kami</p>
    </div>

    <div class="button-group">
        <a href="{{ route('kasir.index') }}">Kembali</a>
        <button onclick="window.print()">Print Struk</button>
    </div>
</body>
</html>
