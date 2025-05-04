<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // Tampilkan semua pesanan
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    // Proses checkout (simpan pesanan)
    public function processCheckout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang kosong.');
        }

        foreach ($cart as $item) {
            Order::create([
                'product_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        session()->forget('cart');

        return redirect()->route('orders.index')->with('success', 'Checkout berhasil!');
    }
}
