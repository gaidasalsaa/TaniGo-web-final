<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function show(Request $request)
    {
        $cartIds = explode(',', $request->cart_ids); // Ambil ID cart dari input hidden

        $carts = Cart::with('product')->whereIn('id', $cartIds)->get();

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

        // Simpan ke database jika perlu
        $alamat = $request->input('alamat');
        $jasa_antar = $request->input('jasa_antar');
        $metode_pembayaran = $request->input('metode_pembayaran');

        // Redirect ke halaman konfirmasi dengan data
        return view('checkoutConfirmation', compact('alamat', 'jasa_antar', 'metode_pembayaran'));
    }

}

