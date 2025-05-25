<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'shipping_address' => 'required|string|max:255',
        'phone_number' => 'required|string|max:20',
        'payment_method' => 'required|string'
    ]);

    $user = Auth::user();
    $cartItems = $user->carts()->with('product')->get();

    if($cartItems->isEmpty()) {
        return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong');
    }

    // Format product details
    $productDetails = $cartItems->map(function($item) {
        return [
            'product_id' => $item->product_id,
            'name' => $item->product->name,
            'price' => $item->product->price,
            'quantity' => $item->quantity,
            'subtotal' => $item->product->price * $item->quantity
        ];
    });

    // Hitung total harga
    $total = $productDetails->sum('subtotal');

    // Buat order
    $order = Order::create([
        'user_id' => $user->id,
        'product_details' => $productDetails,
        'total_price' => $total,
        'shipping_address' => $request->shipping_address,
        'phone_number' => $request->phone_number,
        'payment_method' => $request->payment_method
    ]);

    // Kosongkan keranjang
    $user->carts()->delete();

    return redirect()->route('orders.show', $order->id)
           ->with('success', 'Order berhasil dibuat!');
}
}
