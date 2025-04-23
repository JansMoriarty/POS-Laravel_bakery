<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        return view('products', compact('products'));
    }

    // ✅ Menampilkan form untuk tambah produk
    public function create()
    {
        return view('create_product');
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'kategori' => 'required|in:pastry,with cheese,cake',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'unit' => 'required|string|max:50',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menyimpan gambar jika ada
        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }

        // Simpan produk
        Product::create([
            'name' => $request->name,
            'kategori' => $request->kategori,
            'price' => $request->price,
            'stock' => $request->stock,
            'unit' => $request->unit,
            'gambar' => $imageName,
        ]);

        return redirect()->route('products.index');
    }

    // Update produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kategori' => 'required|in:pastry,with cheese,cake',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'unit' => 'required|string|max:50',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $product->gambar = $imageName;
        }

        $product->update([
            'name' => $request->name,
            'kategori' => $request->kategori,
            'price' => $request->price,
            'stock' => $request->stock,
            'unit' => $request->unit,
            'gambar' => $product->gambar,
        ]);

        return redirect()->route('products.index');
    }

    // Hapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index');
    }

    public function showUpdateForm($id)
    {
        $product = Product::findOrFail($id);
        return view('update_product', compact('product'));
    }
}
