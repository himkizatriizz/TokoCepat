<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
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
    public function store(Request $request, Produk $produk)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $produk->stock,
        ]);

        $total = $produk->price * $request->quantity;

        Order::create([
            'user_id' => Auth::id(),
            'product_id' => $produk->id,
            'quantity' => $request->quantity,
            'total_price' => $total,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
        ]);

        // Kurangi stok produk
        $produk->decrement('stock', $request->quantity);

        return redirect()->route('orders.index')->with('success', 'Order berhasil dilakukan!');
    }

    public function create(Produk $produk)
    {
        return view('orders.create', compact('produk'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'quantity' => 'required|integer|min:1',
        ]);

        $order->update([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order berhasil diperbarui!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order berhasil dihapus!');
    }
}



