<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\DB;

class LaporanExport implements FromView
{
    protected $from;
    protected $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function view(): View
    {
        // Ambil data yang sama seperti di controller
        $transactions = Transaction::whereBetween('created_at', [$this->from, $this->to])->get();
        $totalPendapatan = $transactions->sum('total_price');
        $totalTransaksi = $transactions->count();

        $produkTerjual = DB::table('products')
            ->leftJoin('transaction_items', function ($join) {
                $join->on('products.id', '=', 'transaction_items.product_id')
                    ->whereBetween('transaction_items.created_at', [$this->from, $this->to]);
            })
            ->select('products.name', DB::raw('COALESCE(SUM(transaction_items.qty), 0) as total_terjual'))
            ->groupBy('products.name')
            ->get();

        return view('laporan.excel', [
            'from' => $this->from,
            'to' => $this->to,
            'totalPendapatan' => $totalPendapatan,
            'totalTransaksi' => $totalTransaksi,
            'produkTerjual' => $produkTerjual,
        ]);
    }
}
