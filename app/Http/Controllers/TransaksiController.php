<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function create()
{
    $produks = Produk::all();
    return view('transaksi.create', compact('produk'));
}

public function store(Request $request)
{
    $produk = Produk::findOrFail($request->produk_id);
    $total = $produk->harga * $request->jumlah;

    Transaksi::create([
        'user_id' => auth()->id(),
        'produk_id' => $request->produk_id,
        'jumlah' => $request->jumlah,
        'total_harga' => $total,
    ]);

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil!');
}

public function index()
{
    $transaksis = Transaksi::with('produk')->where('user_id', auth()->id())->get();
    return view('transaksi.index', compact('transaksis'));
}

}
