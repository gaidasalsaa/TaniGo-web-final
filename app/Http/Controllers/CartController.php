<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product')->where('user_id', Auth::id())->get();
        $total = $carts->sum(fn($item) => $item->product->price * $item->quantity);

        return view('keranjang', compact('carts', 'total'));
    }

    public function add($productId)
    {
        $product = Product::findOrFail($productId); // pastikan produk ada

        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => 1, // default qty awal
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }
    public function update(Request $request, Cart $cart)
    {
        $cart->update(['quantity' => $request->quantity]);
        return back();
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back();
    }
    public function checkout(Request $request)
    {
        // Ambil hanya cart yang dicentang (kalau kamu kirim ID terpilih dari form)
        $selected = $request->input('selected_carts', []);
        $carts = Cart::with('product')->whereIn('id', $selected)->get();
        $total = $carts->sum(function ($cart) {
            return $cart->product->harga * $cart->quantity;
        });

        return view('checkout', compact('carts', 'total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
            'jasa_antar' => 'required|in:JNE,J&T,SiCepat',
            'metode_pembayaran' => 'required|in:Transfer Bank,COD,QRIS',
        ]);

        // Simulasikan simpan pesanan

        return redirect()->route('dashboard')->with('success', 'Pesanan berhasil diproses!');
    }
    // public function show($id)
    // {
    //     $cart = Cart::with('product')->findOrFail($id);
    //     return view('checkout.show', compact('cart'));
    // }

}
