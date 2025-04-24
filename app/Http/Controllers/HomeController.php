<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(Request $request) {
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
    
        // Ambil hasil akhir
        $products = $query->get();
    
        return view('home', compact('products', 'category'));
    }
    
}
