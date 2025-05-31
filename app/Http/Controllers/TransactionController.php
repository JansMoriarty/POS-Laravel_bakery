<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->category;

        $products = Product::when($category, function ($query) use ($category) {
            return $query->where('kategori', $category);
        })->get();

        return view('transactions.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.qty' => 'required|integer|min:1',
            'payment_amount' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {
            $totalPrice = 0;
            $productsToUpdate = [];

            foreach ($request->items as $item) {
                $product = Product::findOrFail($item['product_id']);

                if ($product->stock < $item['qty']) {
                    throw new \Exception('Stok tidak mencukupi untuk produk ' . $product->name);
                }

                $totalPrice += $product->price * $item['qty'];
                $productsToUpdate[] = [$product, $item['qty']];
            }

            $changeAmount = $request->payment_amount - $totalPrice;
            if ($changeAmount < 0) {
                return response()->json(['error' => 'Uang tidak cukup.'], 422);
            }

            $transaction = Transaction::create([
                'invoice_number' => 'INV-' . time(),
                'pengguna_id' => 1,
                'total_price' => $totalPrice,
                'payment_amount' => $request->payment_amount,
                'change_amount' => $changeAmount,
                'transaction_date' => now(),
            ]);

            foreach ($productsToUpdate as [$product, $qty]) {
                TransactionItem::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $product->id,
                    'qty' => $qty,
                    'price' => $product->price,
                    'subtotal' => $product->price * $qty,
                ]);

                $product->decrement('stock', $qty);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'redirect' => route('kasir.index'),
                'message' => 'Transaksi berhasil disimpan!',
                'data' => $transaction
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function showReceipt($id)
    {
        $transaction = Transaction::with(['items.product', 'pengguna'])->findOrFail($id);

        return view('receipt.show', compact('transaction'));
    }

    // ✅ Tambahan Method Riwayat
    public function riwayat()
    {
        $transactions = Transaction::with('items.product')
            ->orderBy('created_at', 'desc')
            ->paginate(10); // Ubah jadi ->get() jika tidak ingin pakai pagination

        return view('transactions.riwayat', compact('transactions'));
    }
}
