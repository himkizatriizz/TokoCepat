<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class produkController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $produk = produk::latest()
            ->filter(request(['search']))
            ->paginate(12)
            ->withQueryString();

        return view('produk.index', compact('produk'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        return view('produk.create');
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_featured' => 'nullable|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $validated['image'] = $request->file('image')->store('produk', 'public');
        produk::create($validated);

        return redirect()->route('produk.index')
               ->with('success', 'produk berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit(produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    // Update produk
    public function update(Request $request, produk $produk)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_featured' => 'boolean',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($produk->image);
            $validated['image'] = $request->file('image')->store('produk', 'public');
        }

        $produk->update($validated);

        return redirect()->route('produk.index')
               ->with('success', 'Produk berhasil diperbarui!');
    }

    // Hapus produk
    public function destroy(produk $produk)
    {
        Storage::disk('public')->delete($produk->image);
        $produk->delete();

        return redirect()->route('produk.index')
               ->with('success', 'Produk berhasil dihapus!');
    }

    public function scopeFilter($query, array $filters)
{
    if ($search = $filters['search'] ?? false) {
        $query->where('name', 'like', '%' . $search . '%');
    }
}

}