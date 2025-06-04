<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        $search = $request->query('search');

        // Mulai query builder
        $query = Product::query();

        // Filter kategori jika ada
        if ($category) {
            $query->where('kategori', $category);
        }

        // Filter pencarian jika ada
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Ambil produk
        $products = $query->get();

        // Tambahan: statistik dashboard
        $today = now()->toDateString();

        $profitHariIni = Transaction::whereDate('transaction_date', $today)->sum('total_price');
        $jumlahTransaksi = Transaction::whereDate('transaction_date', $today)->count();
        $stokHampirHabis = Product::where('stock', '<=', 5)->count();
        $produkHampirHabis = Product::where('stock', '<=', 5)->get();


        return view('home', compact(
            'products',
            'category',
            'profitHariIni',
            'jumlahTransaksi',
            'stokHampirHabis',
            'produkHampirHabis'
        ));
    }
}
