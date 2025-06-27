<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua produk tanpa membatasi user_id
        $query = Product::query();

        // Filter kategori jika ada
        if ($request->has('kategori') && $request->kategori !== 'semua') {
            $query->where('kategori', $request->kategori);
        }

        // Bisa ditambahkan fitur pencarian juga
        if ($request->has('search')) {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        $products = $query->get();

        return view('seller.products.index', compact('products'));
    }

    public function create()
    {
        return view('seller.products.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nama_produk' => 'required',
            'kategori' => 'required|in:mentah,setengah_jadi,jadi,kerajinan',
            'harga' => 'required|numeric|min:100',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable',
            'foto' => 'nullable|image|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('produk', 'public');
        }

        Product::create([
            'user_id' => Auth::id(),
            'nama_produk' => $request->nama_produk,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'foto' => $path,
        ]);
        

        return redirect()->route('products.index')->with('message', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        return view('seller.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kategori' => 'required|in:mentah,setengah_jadi,jadi,kerajinan',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['nama_produk', 'kategori', 'harga', 'stok', 'deskripsi']);

        // jika ada file baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($product->foto && Storage::disk('public')->exists($product->foto)) {
                Storage::disk('public')->delete($product->foto);
            }

            // Simpan foto baru
            $path = $request->file('foto')->store('produk', 'public');
            $data['foto'] = $path;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('message', 'Produk diperbarui!');
    }

    public function destroy(Product $product)
    {
        if ($product->foto && Storage::disk('public')->exists($product->foto)) {
        Storage::disk('public')->delete($product->foto);
        }

        $product->delete();

        return redirect()->route('products.index')->with('message', 'Produk dihapus!');
    }
}
