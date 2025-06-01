<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Menampilkan daftar order pengguna yang sedang login
    public function index()
{
    $orders = \App\Models\Order::with('product')->latest()->paginate(10);
    return view('orders.index', compact('orders'));
}


    // Menyimpan order
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->stock,
        ]);

        $total = $product->price * $request->quantity;

        Order::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'total_price' => $total,
        ]);

        // Kurangi stok produk
        $product->decrement('stock', $request->quantity);

        return redirect()->route('orders.index')->with('success', 'Order berhasil dilakukan!');
    }

    public function create(Product $product)
{
    return view('orders.create', compact('product'));
}

}



