<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\DB;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->input('from') ?? now()->startOfMonth()->toDateString();
        $to = $request->input('to') ?? now()->endOfMonth()->toDateString();

        // Transaksi pakai paginate (10 per halaman)
        $transactions = Transaction::whereBetween('created_at', [$from, $to])->orderByDesc('created_at')->paginate(5);

        $totalPendapatan = $transactions->sum('total_price');
        $totalTransaksi = $transactions->total(); // total dari paginate, bukan count()

        $produkTerlaris = TransactionItem::join('products', 'products.id', '=', 'transaction_items.product_id')
            ->select('products.name', DB::raw('SUM(transaction_items.qty) as total_terjual'))
            ->whereBetween('transaction_items.created_at', [$from, $to])
            ->groupBy('products.name')
            ->orderByDesc('total_terjual')
            ->limit(7)
            ->get();

        $produkTerjual = DB::table('products')
            ->leftJoin('transaction_items', function ($join) use ($from, $to) {
                $join->on('products.id', '=', 'transaction_items.product_id')
                    ->whereBetween('transaction_items.created_at', [$from, $to]);
            })
            ->select('products.name', DB::raw('COALESCE(SUM(transaction_items.qty), 0) as total_terjual'))
            ->groupBy('products.name')
            ->get();

        $transaksiPerHari = Transaction::select(
            DB::raw('DATE(created_at) as tanggal'),
            DB::raw('COUNT(*) as total_transaksi')
        )
            ->whereBetween('created_at', [$from, $to])
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('laporan.index', compact('from', 'to', 'transactions', 'totalPendapatan', 'totalTransaksi', 'produkTerlaris', 'produkTerjual', 'transaksiPerHari'));
    }


    public function downloadPDF(Request $request)
    {
        $from = $request->input('from') ?? now()->startOfMonth()->toDateString();
        $to = $request->input('to') ?? now()->endOfMonth()->toDateString();

        $transactions = Transaction::whereBetween('created_at', [$from, $to])->get();
        $totalPendapatan = $transactions->sum('total_price');
        $totalTransaksi = $transactions->count();

        $produkTerjual = DB::table('products')
            ->leftJoin('transaction_items', function ($join) use ($from, $to) {
                $join->on('products.id', '=', 'transaction_items.product_id')
                    ->whereBetween('transaction_items.created_at', [$from, $to]);
            })
            ->select('products.name', DB::raw('COALESCE(SUM(transaction_items.qty), 0) as total_terjual'))
            ->groupBy('products.name')
            ->get();

        $pdf = PDF::loadView('laporan.pdf', compact('from', 'to', 'totalPendapatan', 'totalTransaksi', 'produkTerjual'));
        return $pdf->download('laporan-transaksi-' . $from . '-to-' . $to . '.pdf');
    }

    public function downloadExcel(Request $request)
    {
        $from = $request->input('from') ?? now()->startOfMonth()->toDateString();
        $to = $request->input('to') ?? now()->endOfMonth()->toDateString();

        return Excel::download(new LaporanExport($from, $to), 'laporan-transaksi-' . $from . '-to-' . $to . '.xlsx');
    }
}
